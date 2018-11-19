<?php $this->view('admin/header'); ?>
	<br>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart('admin/kategoriler'); ?>
		<input type="text" class="w3-input" name="kategori_baslik" placeholder="Kategori İsmi" required autofocus>
		<input type="file" name="userfile" class="w3-input" required autofocus>
		<button type="submit" class="w3-button w3-block w3-green">Ekle</button>
	<?php echo form_close(); ?>
	<table class="w3-table-all">
		<thead><tr><th scope="col">#</th><th scope="col">Resim</th><th scope="col">Başlık</th><th scope="col">İşlemler</th></tr></thead>
		<tbody>
			<?php 
			$i=0;
				foreach($kategoriler as $kategori){
					$i++;
					echo "<tr>
							<th>$i</th>
							<td><img src='".site_url()."assets/images/kategoriler/".$kategori['kategori_resim']."' width='100px'></td>
							<td>".$kategori['kategori_baslik']."</td>
							<td>
								<a href='".site_url('/admin/kategoriler_duzenle/'.$kategori['kategori_id'])."' class='btn btn-primary'>Düzenle</a>
								<a href='".site_url('/admin/kategoriler_sil/'.$kategori['kategori_id'])."' class='btn btn-danger'>Sil</a>
							</td>
						</tr>";
				}
			?>
		</tbody>
	</table> 
<?php $this->view('admin/footer'); ?>