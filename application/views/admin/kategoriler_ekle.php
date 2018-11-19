<?php $this->view('templates/header'); ?>
	<br>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart('admin/kategoriler_ekle'); ?>
		<div class="form-group">
			<input type="text" class="form-control" name="kategori_baslik" placeholder="Kategori İsmi">
		</div>
		<div class="form-group">
			<input type="file" name="userfile" class="form-control" required>
		</div>
		<button type="submit" class="btn btn-primary">Ekle</button>
	<?php echo form_close(); ?>
<?php $this->view('templates/footer'); ?>