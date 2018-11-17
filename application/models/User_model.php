<?php
	class User_model extends CI_Model{
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
	}