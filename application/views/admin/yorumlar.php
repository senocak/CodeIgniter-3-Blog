<?php $this->view('iskelet/header'); ?>	 
<?php $this->view('iskelet/admin_navbar'); ?>  
	<table class="table table-dark">
		<thead><tr><th scope="col">#</th><th scope="col">İsim</th><th scope="col">Yorum</th><th scope="col">Yazı Başlığı</th><th scope="col">İşlemler</th></tr></thead>
		<tbody>
			<?php 
			$i=0;
			foreach($yorumlar as $yorum){
				$i++;
				$aktiflik="";
				if($yorum["yorum_aktif"]=="1"){
					$aktiflik="Gizle";
				}else{
					$aktiflik="Göster";
				} 
				echo "<tr>
						<th>$i</th>
						<td>".$yorum["yorum_isim"]." (".$yorum["yorum_email"].")</td>
						<td>".word_limiter($yorum['yorum_yorum'],10)."</td>
						<td>".$yorum['yazi_baslik']."</td>
						<td>
							<button class='btn btn-xs btn-success'><a class='w3-btn w3-teal' href='".site_url('/admin/yorumlar_aktif/'.$yorum['yorum_id'])."' style='color:black;'>$aktiflik</a></button> 
							<button class='btn btn-xs btn-danger'><a onclick=\"return confirm('Silmek İstediğinize Emin Misiniz?')\" href='".site_url('/admin/yorumlar_sil/'.$yorum['yorum_id'])."'><i style='color:black;' class='fa fa-trash'></i></a></button>
						</td>
					</tr>";
			}
			?>
		</tbody>
	</table> 
<?php $this->view('iskelet/footer'); ?>