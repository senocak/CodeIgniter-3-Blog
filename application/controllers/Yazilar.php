<?php
	class Yazilar extends CI_Controller{
		public function index($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'yazilar/index/';
			$config['total_rows'] = $this->db->count_all('yazilar');
			$config['per_page'] = 20;
			$config['uri_segment'] = 3;
			//For Boostrap
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['prev_link'] = '&laquo;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			//For Boostrap
			// Init Pagination
			$this->pagination->initialize($config);
			$data['posts'] = $this->yazilar_model->get_posts(FALSE, $config['per_page'], $offset);
			$data['kategoriler'] = $this->yazilar_model->get_categories();
			$data['yorumlar'] = $this->yazilar_model->get_yorumlar();
			$this->load->view('yazilar/index', $data);
		}
		public function yazi($slug = NULL){
			$data['post'] = $this->yazilar_model->get_posts($slug);
			$post_id = $data['post']['yazi_id'];
			$data['comments'] = $this->yazilar_model->get_comments($post_id);
			$data['kategoriler'] = $this->yazilar_model->get_categories();
			$data['yorumlar'] = $this->yazilar_model->get_yorumlar();
			if(empty($data['post'])){
				show_404();
			}
			$data['title'] = $data['post']['yazi_baslik'];
			$this->load->view('yazilar/view', $data);
		}
		public function kategoriler($kategori_ismi,$offset = 0){
			// Pagination Config
			$this->db->join('kategoriler', 'kategoriler.kategori_id = yazilar.kategori_id');
			$this->db->where('kategori_url',$kategori_ismi);	
			$config['base_url'] = base_url() . 'kategori/'.$kategori_ismi;
			$config['total_rows'] = $this->db->count_all_results('yazilar');
			$config['per_page'] = 9;
			$config['uri_segment'] = 3;
			//For Boostrap
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['prev_link'] = '&laquo;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			//For Boostrap 
			$this->pagination->initialize($config);
			// Init Pagination
			$data['posts'] = $this->yazilar_model->get_posts_by_category($kategori_ismi,$config['per_page'],$offset);
			$kategori_kontol=$this->yazilar_model->kategori_kontrol($kategori_ismi);
			if($kategori_kontol>0){
				$data['kategori_varmi'] = $this->yazilar_model->get_categories($kategori_ismi);
				$data['kategoriler'] = $this->yazilar_model->get_categories();
				$data['yorumlar'] = $this->yazilar_model->get_yorumlar();
				$this->load->view('yazilar/index', $data);
			}else{
				redirect("yazilar");
			}
		}
	}