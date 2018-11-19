<?php $this->view('templates/header'); ?>
	<br>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart('admin/kategoriler'); ?>
		<div class="form-group">
			<input type="text" class="form-control" name="kategori_baslik" placeholder="Kategori İsmi" required autofocus>
		</div>
		<div class="form-group">
			<input type="file" name="userfile" class="form-control" required autofocus>
		</div>
		<button type="submit" class="btn btn-primary btn-block btn-lg">Ekle</button>
	<?php echo form_close(); ?>
	<table class="table table-sm">
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
<?php $this->view('templates/footer'); ?>