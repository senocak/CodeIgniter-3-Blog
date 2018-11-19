<?php $this->view('templates/header'); ?>
	<br><a href="<?php echo site_url('/admin/yazilar_ekle'); ?>" class="btn btn-primary btn-block btn-lg">Ekle</a>
	<table class="table table-sm">
		<thead><tr><th scope="col">#</th><th scope="col">Başlık</th><th scope="col">Kategori</th><th scope="col">İçerik</th><th scope="col">İşlemler</th></tr></thead>
		<tbody>
			<?php 
			$i=0;
				foreach($yazilar as $yazi){
					$i++;
					echo "<tr>
							<th>$i</th>
							<td>".$yazi['yazi_baslik']."</td>
							<td>".$yazi['kategori_baslik']."</td>
							<td>".word_limiter($yazi['yazi_icerik'], 10)."</td>
							<td>
								<a href='".site_url('/admin/yazilar_duzenle/'.$yazi['yazi_id'])."' class='btn btn-primary'>Düzenle</a>
								<a href='".site_url('/admin/yazilar_sil/'.$yazi['yazi_id'])."' class='btn btn-danger'>Sil</a>
							</td>
						</tr>";
				}
			?>
		</tbody>
	</table> 
<?php $this->view('templates/footer'); ?>