<?php
	class Sayfa extends CI_Controller{
		public function index($page = 'anasayfa'){
			if(!file_exists(APPPATH."views/sayfalar/$page.php")){
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view("sayfalar/$page", $data);
		}
	}