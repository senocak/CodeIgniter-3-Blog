<?php
	class Admin extends CI_Controller{
		private $data=array();
		public function login(){ 
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Şifre', 'required');
			if($this->form_validation->run() === FALSE){
				if(!$this->session->userdata('logged_in')){
					$this->data['kategoriler'] = $this->yazilar_model->get_categories();
					$this->load->view('admin/login', $this->data);
				}else{
					redirect('admin/yazilar');
				}
			} else {
				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));
				$user = $this->admin_model->login($email, $password);
				if($user){
					$user_data = array(
						'user_id' => $user->id,
						'email' => $user->email,
						'name' => $user->name,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('mesaj', 'Başarılı ile giriş yapıldı');
					redirect('admin/yazilar');
				} else {
					$this->session->set_flashdata('mesaj', 'Giriş Başarısız');
					redirect('admin/login');
				}
			}
		} 
		public function profil(){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$this->form_validation->set_rules('email', 'Kullanıcı Email', 'required');
			$this->form_validation->set_rules('name', 'Kullanıcı İsmi', 'required');
			if($this->form_validation->run() === TRUE){
				$sifre=$this->input->post('sifre');
				$sifre2=$this->input->post('sifre2');
				if($sifre!=$sifre2){
					$this->session->set_flashdata('mesaj', 'Şifreler Eşleşmiyor'); 
				}else{
					$this->admin_model->profil($this->session->userdata('email'));
					$this->session->set_flashdata('mesaj', 'Profil Güncellendi. Bir Sonraki Girişinizde Değişiklikleri Göreceksiniz');
				}
			}
			$this->data['kategoriler'] = $this->yazilar_model->get_categories();
			$this->load->view('admin/profil', $this->data);
		}
		public function yazilar(){
			$this->data['title']="Yazılar";
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}else{
				$this->data['yazilar'] = $this->admin_model->get_yazilar();
				$this->data['kategoriler'] = $this->yazilar_model->get_categories();
				$this->load->view('admin/yazilar', $this->data);
			}		
		}
		public function yazilar_ekle(){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$this->data['kategoriler'] = $this->admin_model->get_kategoriler();
			$this->form_validation->set_rules('yazi_baslik', 'Başlık', 'required');
			$this->form_validation->set_rules('yazi_icerik', 'İçerik', 'required');
			if($this->form_validation->run() === FALSE){
				$this->data['kategoriler'] = $this->yazilar_model->get_categories();
				$this->load->view('admin/yazilar_ekle', $this->data);
			} else {
				$this->admin_model->yazilar_ekle();
				$this->session->set_flashdata('mesaj', 'Yazı Oluşturuldu');
				redirect('admin/yazilar');
			}
		}
		public function yazilar_sil($id){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$this->admin_model->yazilar_sil($id);
			$this->session->set_flashdata('mesaj', 'Yazı Silindi');
			redirect('admin/yazilar');
		}
		public function yazilar_duzenle($id){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$slug = $this->db->get_where('yazilar', array('yazi_id' => $id))->row()->yazi_url;
			$this->data['post'] = $this->admin_model->get_yazilar($slug);
			$this->data['categories'] = $this->admin_model->get_kategoriler();
			if(empty($this->data['post'])){
				show_404();
			}
			$this->data['kategoriler'] = $this->yazilar_model->get_categories();
			$this->load->view('admin/yazilar_duzenle', $this->data);
		}
		public function yazilar_guncelle_post(){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$this->admin_model->yazilar_duzenle();
			$this->session->set_flashdata('mesaj', 'Yazı Güncellendi');
			redirect('admin/yazilar');
		}
		public function yazilar_onecikar($id){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$yazilar = $this->db->get_where('yazilar', array('yazi_id' => $id))->row();
			if($yazilar->yazi_onecikan=="1"){
				$this->admin_model->yazilar_onecikar($id,"0");
				$this->session->set_flashdata('mesaj', 'Yazı Öne Çıkarma Kapatıldı');
			}else{
				$this->admin_model->yazilar_onecikar($id,"1");
				$this->session->set_flashdata('mesaj', 'Yazı Öne Çıkarıldı');
			}
			redirect('admin/yazilar');
		}
		public function kategoriler(){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$this->data['kategoriler'] = $this->admin_model->get_kategoriler();
			$this->form_validation->set_rules('kategori_baslik', 'Kategori Başlık', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('admin/kategoriler', $this->data);
			}else{
				$config['upload_path'] = './assets/images/kategoriler';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '4048';
				$config['max_width'] = '4000';
				$config['max_height'] = '4000';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload()){
					$this->data["error"] = $this->upload->display_errors();
					$post_image = 'no-image.png';
				}else{
					$this->data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$this->admin_model->kategori_ekle($post_image);
				$this->session->set_flashdata('mesaj', 'Kategori Oluşturuldu');
				redirect('admin/kategoriler');
			}
		}
		public function kategoriler_duzenle($id){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$this->data['kategoriler'] = $this->admin_model->get_kategoriler();
			$this->data['kategori'] = $this->admin_model->get_kategoriler($id);
			$this->form_validation->set_rules('kategori_baslik', 'Kategori İsmi', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('admin/kategoriler_duzenle', $this->data);
			}else{
				if($_FILES['userfile']["name"]!=""){
					$config['upload_path'] = './assets/images/kategoriler';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '4048';
					$config['max_width'] = '4000';
					$config['max_height'] = '4000';
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload()){
						$this->data["error"] = $this->upload->display_errors();
						$post_image = 'no-image.png';
					}else{
						$this->data = array('upload_data' => $this->upload->data());
						$post_image = $_FILES['userfile']['name'];
					}
					$this->admin_model->kategoriler_duzenle($post_image);
					$this->session->set_flashdata('mesaj', 'Kategori Güncellendi');
					redirect('admin/kategoriler');
				}else{
					$this->admin_model->kategoriler_duzenle($post_image);
					$this->session->set_flashdata('mesaj', 'Kategori Güncellendi');
					redirect('admin/kategoriler');
				}
			}
		}
		public function kategoriler_sil($id){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$this->admin_model->kategoriler_sil($id);
			$this->session->set_flashdata('mesaj', 'Kategori Silindi');
			redirect('admin/kategoriler');
		}
		public function yorumlar(){
			$this->data['title']="Yorumlar";
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}else{
				$this->data['yorumlar'] = $this->admin_model->get_yorumlar();
				$this->data['kategoriler'] = $this->yazilar_model->get_categories();
				$this->load->view('admin/yorumlar', $this->data);
			}		
		} 
		public function yorumlar_aktif($yorum_id){
			$yorum_aktif=$this->admin_model->get_yorumlar($yorum_id)["yorum_aktif"];
			if($yorum_aktif==1){
				$this->admin_model->get_yorumlar_aktif($yorum_id,"0");
				$this->session->set_flashdata('mesaj', 'Yorum Gizlendi');
			}else{
				$this->admin_model->get_yorumlar_aktif($yorum_id,"1");
				$this->session->set_flashdata('mesaj', 'Yorum Gösterildi');
			}
			redirect('admin/yorumlar');
		}
		public function yorumlar_sil($yorum_id){
			$this->admin_model->yorumlar_sil($yorum_id);
			$this->session->set_flashdata('mesaj', 'Yorum Silindi');
			redirect('admin/yorumlar');
		}
		public function cikis(){
			$this->session->sess_destroy();
			$this->session->set_flashdata('mesaj', 'Çıkış yapıldı');
			redirect('admin/login');
		}
		public function yazilar_sirala(){
			$this->admin_model->yazilar_sirala();
		}
		public function kategoriler_sirala(){
			$this->admin_model->kategoriler_sirala();
		}
	}