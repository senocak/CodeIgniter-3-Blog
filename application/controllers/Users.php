<?php
	class Users extends CI_Controller{
		public function login(){
			$data=array();
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Şifre', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('users/login', $data);
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
					redirect('users/profil');
				} else {
					$this->session->set_flashdata('login_failed', 'Giriş Başarısız');
					redirect('users/login');
				}
			}
		}
		public function profil(){
			$data=array();
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}else{
				$this->load->view('users/login', $data);
			}
		}
		public function logout(){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->set_flashdata('user_loggedout', 'Çıkış yapıldı');
			redirect('users/login');
		}
	}