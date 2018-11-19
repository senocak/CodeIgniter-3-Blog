<?php
	class Yazilar extends CI_Controller{
		public function index($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'yazilar/index/';
			$config['total_rows'] = $this->db->count_all('yazilar');
			$config['per_page'] = 9;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'w3-button w3-black w3-padding-large w3-margin-bottom');
			$config['cur_tag_open'] = '<a class="w3-button w3-black w3-disabled w3-padding-large w3-margin-bottom">';
			$config['cur_tag_close'] = '</a>';
			$config['use_page_numbers'] = TRUE;  
			// Init Pagination
			$this->pagination->initialize($config);
			$data['title']="Son Yazılar";
			$data['posts'] = $this->yazilar_model->get_posts(FALSE, $config['per_page'], $offset);
			$data['kategoriler'] = $this->yazilar_model->get_categories();
			$data['yorumlar'] = $this->yazilar_model->get_yorumlar();
			$this->load->view('yazilar/index', $data);
		}
		public function view($slug = NULL){
			$data['post'] = $this->yazilar_model->get_posts($slug);
			$post_id = $data['post']['yazi_id'];
			$data['comments'] = $this->comment_model->get_comments($post_id);
			$data['kategoriler'] = $this->yazilar_model->get_categories();
			$data['yorumlar'] = $this->yazilar_model->get_yorumlar();
			if(empty($data['post'])){
				show_404();
			}
			$data['title'] = $data['post']['yazi_baslik'];
			$this->load->view('yazilar/view', $data);
		}
	}