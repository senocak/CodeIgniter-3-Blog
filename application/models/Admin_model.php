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
		public function get_yazilar($slug = FALSE){ 
			$this->db->order_by('yazilar.yazi_id', 'DESC');
			$this->db->join('kategoriler', 'kategoriler.kategori_id = yazilar.kategori_id');
			if($slug === FALSE){
				$query = $this->db->get('yazilar');
				return $query->result_array();
			}
			$query = $this->db->get_where('yazilar', array('yazi_url' => $slug));
			return $query->row_array();
		}
		public function get_kategoriler($id = FALSE){
			if($id === FALSE){
				$this->db->order_by('kategori_baslik',"DESC");
				$query = $this->db->get('kategoriler');
				return $query->result_array();
			}
			$query = $this->db->get_where('kategoriler', array('kategori_id' => $id));
			return $query->row_array();
		}
		public function kategori_ekle($post_image){
			$data = array(
				'kategori_baslik' => $this->input->post('kategori_baslik'),
				'kategori_url' => $this->self_url($this->input->post('kategori_baslik')),
				'kategori_resim' => $post_image
			);
			return $this->db->insert('kategoriler', $data);
		}
		public function kategoriler_duzenle($image=null){
			if($image==null){	
				$data = array(
					'kategori_baslik' => $this->input->post('kategori_baslik'),
					'kategori_url' => $this->self_url($this->input->post('kategori_baslik'))
				);
			}else{
				$data = array(
					'kategori_baslik' => $this->input->post('kategori_baslik'),
					'kategori_url' => $this->self_url($this->input->post('kategori_baslik')),
					'kategori_resim' => $image
				);
			}
			$this->db->where('kategori_id', $this->input->post('kategori_id'));
			return $this->db->update('kategoriler', $data);
		}
		public function yazilar_sil($id){
			$this->db->where('yazi_id', $id);
			$this->db->delete('yazilar');
			return true;
		}
		public function kategoriler_sil($id){
			$image_file_name = $this->db->select('kategori_resim')->get_where('kategoriler', array('kategori_id' => $id))->row()->kategori_resim;
			$cwd = getcwd(); // save the current working directory
			$image_file_path = $cwd."\\assets\\images\\kategoriler\\";
			chdir($image_file_path);
			unlink($image_file_name);
			chdir($cwd); // Restore the previous working directory
			$this->db->where('kategori_id', $id);
			$this->db->delete('kategoriler');
			return true;
		}
		public function yazilar_duzenle(){
			$data = array(
				'yazi_baslik' => $this->input->post('yazi_baslik'),
				'yazi_url' => $this->self_url($this->input->post('yazi_baslik')),
				'yazi_icerik' => $this->input->post('yazi_icerik'),
				'kategori_id' => $this->input->post('kategori_id')
			);
			$this->db->where('yazi_id', $this->input->post('id'));
			return $this->db->update('yazilar', $data);
		}
		public function yazilar_ekle(){
			$data = array(
				'yazi_baslik' => $this->input->post('yazi_baslik'),
				'yazi_url' => $this->self_url($this->input->post('yazi_baslik')),
				'yazi_icerik' => $this->input->post('yazi_icerik'),
				'kategori_id' => $this->input->post('kategori_id')
			);
			return $this->db->insert('yazilar', $data);
		}
		public function get_yorumlar(){ 
			$this->db->order_by('yorum.yorum_id', 'DESC');
			$this->db->join('yazilar', 'yorum.yazi_id = yazilar.yazi_id');
			$query = $this->db->get('yorum');
			return $query->result_array();
		}
		public function self_url($title){
			$search = array(" ","ö","ü","ı","ğ","ç","ş","/","?","&","'",",","A","B","C","Ç","D","E","F","G","Ğ","H","I","İ","J","K","L","M","N","O","Ö","P","R","S","Ş","T","U","Ü","V","Y","Z","Q","X");
			$replace = array("-","o","u","i","g","c","s","-","","-","","","a","b","c","c","d","e","f","g","g","h","i","i","j","k","l","m","n","o","o","p","r","s","s","t","u","u","v","y","z","q","x");
			$new_text = str_replace($search,$replace,trim($title));
			return $new_text;
		}
	}