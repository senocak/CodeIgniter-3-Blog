<?php
	class Admin extends CI_Controller{
		public function login(){
			$data=array();
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Şifre', 'required');
			if($this->form_validation->run() === FALSE){
				if(!$this->session->userdata('logged_in')){
					$this->load->view('admin/login', $data);
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
			$data=array();
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
			$this->load->view('admin/profil', $data);
		}
		public function yazilar(){
			$data=array('title'=>"Yazılar");
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}else{
				$data['yazilar'] = $this->admin_model->get_yazilar();
				$this->load->view('admin/yazilar', $data);
			}		
		}
		public function yazilar_ekle(){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$data['kategoriler'] = $this->admin_model->get_kategoriler();
			$this->form_validation->set_rules('yazi_baslik', 'Başlık', 'required');
			$this->form_validation->set_rules('yazi_icerik', 'İçerik', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('admin/yazilar_ekle', $data);
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
			$data['post'] = $this->admin_model->get_yazilar($slug);
			$data['categories'] = $this->admin_model->get_kategoriler();
			if(empty($data['post'])){
				show_404();
			}
			$this->load->view('admin/yazilar_duzenle', $data);
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
			$data['kategoriler'] = $this->admin_model->get_kategoriler();
			$this->form_validation->set_rules('kategori_baslik', 'Kategori Başlık', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('admin/kategoriler', $data);
			}else{
				$config['upload_path'] = './assets/images/kategoriler';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '4048';
				$config['max_width'] = '4000';
				$config['max_height'] = '4000';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'no-image.png';
				}else{
					$data = array('upload_data' => $this->upload->data());
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
			$data['kategoriler'] = $this->admin_model->get_kategoriler();
			$data['kategori'] = $this->admin_model->get_kategoriler($id);
			$this->form_validation->set_rules('kategori_baslik', 'Kategori İsmi', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('admin/kategoriler_duzenle', $data);
			}else{
				if($_FILES['userfile']["name"]!=""){
					$config['upload_path'] = './assets/images/kategoriler';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '4048';
					$config['max_width'] = '4000';
					$config['max_height'] = '4000';
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload()){
						$errors = array('error' => $this->upload->display_errors());
						$post_image = 'no-image.png';
					}else{
						$data = array('upload_data' => $this->upload->data());
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
			$data=array('title'=>"Yorumlar");
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}else{
				$data['yorumlar'] = $this->admin_model->get_yorumlar();
				$this->load->view('admin/yorumlar', $data);
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