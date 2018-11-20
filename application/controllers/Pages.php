<?php
	class Pages extends CI_Controller{
		public function view($page = 'anasayfa'){
			if(!file_exists(APPPATH."views/sayfalar/$page.php")){
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view("sayfalar/$page", $data);
		}
	}