<?php $this->view('templates/header'); ?>
	<br>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart('admin/kategoriler_duzenle/'.$kategori["kategori_id"]); ?>
		<div class="form-group">
            <input type="hidden" name="kategori_id" value="<?php echo $kategori["kategori_id"]; ?>">
		    <input type="text" class="form-control" name="kategori_baslik" placeholder="Kategori İsmi" required autofocus value="<?php echo $kategori["kategori_baslik"]; ?>">
		</div>
		<div class="form-group">
            <img src='<?php echo site_url()."assets/images/kategoriler/".$kategori['kategori_resim']; ?>' width='200px'>
			<input type="file" name="userfile" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary btn-block btn-lg">Güncelle</button>
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