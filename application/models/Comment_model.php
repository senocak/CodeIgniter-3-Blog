<?php
	class Comment_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function create_comment($post_id){
			$data = array(
				'yazi_id' => $post_id,
				'yorum_isim' => $this->input->post('yorum_isim'),
				'yorum_email' => $this->input->post('yorum_email'),
				'yorum_yorum' => $this->input->post('yorum_yorum')
			);
			return $this->db->insert('yorumlar', $data);
		}
		public function get_comments($post_id){
			$query = $this->db->get_where('yorumlar', array('yazi_id' => $post_id,'yorum_aktif'=>'1'));
			return $query->result_array();
		}
	}