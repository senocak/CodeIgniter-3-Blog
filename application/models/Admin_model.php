<?php
	class Admin_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function login($email, $password){
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$result = $this->db->get('users');
			if($result->num_rows() == 1){
				return $result->row(0)->id;
			} else {
				return false;
			}
		}
		public function get_yazilar(){ 
			$this->db->join('categories', 'categories.id = posts.category_id');
			$query = $this->db->get('posts');
			return $query->result_array();
		}
	}