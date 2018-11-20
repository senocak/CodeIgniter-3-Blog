<?php
	class Yazilar_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$this->db->order_by('yazilar.yazi_onecikan', 'desc');
			$this->db->order_by('yazilar.yazi_sira', 'asc');

			
			$this->db->join('kategoriler', 'kategoriler.kategori_id = yazilar.kategori_id');
			if($slug === FALSE){
				$query = $this->db->get('yazilar');
				return $query->result_array();
			}
			$query = $this->db->get_where('yazilar', array('yazi_url' => $slug));
			return $query->row_array();
		}
		public function get_categories(){
			$this->db->order_by('kategori_baslik');
			$query = $this->db->get('kategoriler');
			return $query->result_array();
		}
		public function get_yorumlar(){
			$this->db->order_by('yorum_id');
			$this->db->join('yazilar', 'yorumlar.yazi_id = yazilar.yazi_id');
			$query = $this->db->get_where('yorumlar',array("yorum_aktif"=>"1"));
			return $query->result_array();
		}		
		public function get_posts_by_category($category_id){
			$this->db->order_by('yazilar.yazi_id', 'DESC');
			$this->db->join('kategoriler', 'kategoriler.kategori_id = yazilar.kategori_id');
			$query = $this->db->get_where('yazilar', array('kategori_id' => $category_id));
			return $query->result_array();
		}
		public function get_yorumlar_toplam($id){
			$query = $this->db->query("select * from yorumlar where yazi_id=$id")->num_rows();
			return $query;
		}
	}