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
				return $result->row(0);
			} else {
				return false;
			}
		}
		public function get_yazilar($yazi_url = FALSE){ 
			$this->db->order_by('yazilar.yazi_sira', 'asc');
			$this->db->join('kategoriler', 'kategoriler.kategori_id = yazilar.kategori_id');
			if($yazi_url === FALSE){
				$query = $this->db->get('yazilar');
				return $query->result_array();
			}
			$query = $this->db->get_where('yazilar', array('yazi_url' => $yazi_url));
			return $query->row_array();
		}
		public function get_kategoriler($id = FALSE){
			if($id === FALSE){
				$this->db->order_by('kategori_sira',"asc");
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
				'kategori_id' => $this->input->post('kategori_id'),
				'yazi_etiketler'=>$this->input->post('yazi_etiketler')
			);
			$this->db->where('yazi_id', $this->input->post('id'));
			return $this->db->update('yazilar', $data);
		}
		public function yazilar_ekle(){
			$data = array(
				'yazi_baslik' => $this->input->post('yazi_baslik'),
				'yazi_url' => $this->self_url($this->input->post('yazi_baslik')),
				'yazi_icerik' => $this->input->post('yazi_icerik'),
				'kategori_id' => $this->input->post('kategori_id'),
				'yazi_etiketler'=>$this->input->post('yazi_etiketler')
			);
			return $this->db->insert('yazilar', $data);
		}
		public function get_yorumlar($yorum_id=FALSE){
			if($yorum_id === FALSE){
				$this->db->order_by('yorumlar.yorum_id', 'DESC');
				$this->db->join('yazilar', 'yorumlar.yazi_id = yazilar.yazi_id');
				$query = $this->db->get('yorumlar');
				return $query->result_array();
			}
			$query = $this->db->get_where('yorumlar', array('yorum_id' => $yorum_id));
			return $query->row_array();
		}
		public function get_yorumlar_aktif($yorum_id,$aktif){
			$data = array(
				'yorum_aktif' => $aktif
			);
			$this->db->where('yorum_id',$yorum_id);
			return $this->db->update('yorumlar', $data);
		}
		public function yorumlar_sil($yorum_id){
			$this->db->where('yorum_id', $yorum_id);
			$this->db->delete('yorumlar');
			return true;
		}		
		public function profil($email){
			$data = array(
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'name'=>$this->input->post('name')
			);
			$this->db->where('email',$email);
			return $this->db->update('users', $data);
		}
		public function yazilar_sirala(){			
			$veriler = $this->input->post('sirala');
			$toplam_veriler = count($this->input->post('sirala'));
			for($veri = 0; $veri < $toplam_veriler; $veri++ ){
				$data = array(
					'yazi_sira' =>"$veri"
				);
				$this->db->where('yazi_id', $veriler[$veri]);
				$this->db->update('yazilar', $data);
			}
			$this->session->set_flashdata('mesaj', 'Yazılar Sıralandı');
		}
		public function kategoriler_sirala(){			
			$veriler = $this->input->post('sirala');
			$toplam_veriler = count($this->input->post('sirala'));
			for($veri = 0; $veri < $toplam_veriler; $veri++ ){
				$data = array(
					'kategori_sira' =>"$veri"
				);
				$this->db->where('kategori_id', $veriler[$veri]);
				$this->db->update('kategoriler', $data);
			}
			$this->session->set_flashdata('mesaj', 'Kategoriler Sıralandı');
		}
		public function self_url($title){
			$search = array(" ","ö","ü","ı","ğ","ç","ş","/","?","&","'",",","A","B","C","Ç","D","E","F","G","Ğ","H","I","İ","J","K","L","M","N","O","Ö","P","R","S","Ş","T","U","Ü","V","Y","Z","Q","X");
			$replace = array("-","o","u","i","g","c","s","-","","-","","","a","b","c","c","d","e","f","g","g","h","i","i","j","k","l","m","n","o","o","p","r","s","s","t","u","u","v","y","z","q","x");
			$new_text = str_replace($search,$replace,trim($title));
			return $new_text;
		}
	}