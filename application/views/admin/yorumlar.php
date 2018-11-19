<?php $this->view('templates/header'); ?>
	<br><h1>Yorumlar</h1>
	<table class="table table-sm">
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
				$aktiflik_button="<a href='".site_url('/admin/yorumlar_aktif/'.$yorum['yorum_id'])."' class='btn btn-primary'>$aktiflik</a>";
				echo "<tr>
						<th>$i</th>
						<td>".$yorum["yorum_isim"]." (".$yorum["yorum_email"].")</td>
						<td>".word_limiter($yorum['yorum_yorum'],10)."</td>
						<td>".$yorum['yazi_baslik']."</td>
						<td>
							$aktiflik_button
							<a href='".site_url('/admin/yorumlar_sil/'.$yorum['yorum_id'])."' class='btn btn-danger'>Sil</a>
						</td>
					</tr>";
			}
			?>
		</tbody>
	</table> 
<?php $this->view('templates/footer'); ?>