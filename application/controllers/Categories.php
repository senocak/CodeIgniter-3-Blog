<?php
	class Categories extends CI_Controller{
		public function index(){
			$data['title'] = 'Kategoriler';
			$data['categories'] = $this->category_model->get_categories();
			$this->load->view('categories/index', $data);
		}
		public function create(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			$data['title'] = 'Kategori Oluştur';
			$this->form_validation->set_rules('name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('categories/create', $data);
			} else {				
				// Upload Image
				$config['upload_path'] = './assets/images/kategoriler';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '4048';
				$config['max_width'] = '4000';
				$config['max_height'] = '4000';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$this->category_model->create_category($post_image);
				$this->session->set_flashdata('category_created', 'Kategori Eklendi');
				redirect('categories');
			}
		}
		public function posts($id){
			$data['title'] = $this->category_model->get_category($id)->name;
			$data['posts'] = $this->post_model->get_posts_by_category($id);
			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}
		public function delete($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			$this->category_model->delete_category($id);
			// Set message
			$this->session->set_flashdata('category_deleted', 'Your category has been deleted');
			redirect('categories');
		}
	}