<?php
	class Admin extends CI_Controller{
		public function login(){
			$data=array();
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Şifre', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('admin/login', $data);
			} else {
				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));
				$user_id = $this->user_model->login($email, $password);
				if($user_id){
					$user_data = array(
						'user_id' => $user_id,
						'email' => $username,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('user_loggedin', 'Başarılı ile giriş yapıldı');
					redirect('admin/profil');
				} else {
					$this->session->set_flashdata('login_failed', 'Giriş Başarısız');
					redirect('admin/login');
				}
			}
		}
		public function profil(){
			$data=array();
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}else{
				$this->load->view('admin/login', $data);
			}
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
		public function logout(){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->set_flashdata('user_loggedout', 'Çıkış yapıldı');
			redirect('users/login');
		}
		public function post_create(){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$data['title'] = 'Yazı Oluştur';
			$data['categories'] = $this->post_model->get_categories();
			$this->form_validation->set_rules('title', 'Başlık', 'required');
			$this->form_validation->set_rules('body', 'İçerik', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('posts/create', $data);
			} else {
				// Upload Image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$this->post_model->create_post($post_image);
				$this->session->set_flashdata('post_created', 'Yazı Oluşturuldu');
				redirect('admin/posts');
			}
		}
		public function post_delete($id){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$this->post_model->delete_post($id);
			$this->session->set_flashdata('post_deleted', 'Yazı Silindi');
			redirect('admin/posts');
		}
		public function post_edit($slug){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$data['post'] = $this->post_model->get_posts($slug);
			$data['categories'] = $this->post_model->get_categories();
			if(empty($data['post'])){
				show_404();
			}
			$data['title'] = 'Yazıyı Güncelle';
			$this->load->view('admin/post_edit', $data);
		}
		public function post_update(){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$this->post_model->update_post();
			$this->session->set_flashdata('post_updated', 'Yazı Güncellendi');
			redirect('admin/posts');
		}
	}