<?php
	class Comments extends CI_Controller{
		public function create($post_id){
			$yazi_url = $this->input->post('yazi_url');
			$data['post'] = $this->post_model->get_posts($yazi_url);
			$this->form_validation->set_rules('yorum_isim', 'İsmi', 'required');
			$this->form_validation->set_rules('yorum_email', 'Email', 'required');
			$this->form_validation->set_rules('yorum_yorum', 'Yorum', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('posts/view', $data);
			} else {
				$this->comment_model->create_comment($post_id);
				$this->session->set_flashdata('mesaj', 'Yorumunuz Onaylandıktan Sonra Görünecek');
				redirect('posts/'.$yazi_url);
			}
		}
	}