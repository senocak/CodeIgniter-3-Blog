<?php $this->view('templates/header'); ?>
	<br>
	<?php echo validation_errors(); ?>
	<?php echo form_open('admin/yazilar_ekle'); ?>
		<div class="form-group">
			<input type="text" class="form-control" name="yazi_baslik" placeholder="Yazı Başlığı">
		</div>
		<div class="form-group">
			<textarea id="editor1" class="ckeditor" name="yazi_icerik" placeholder="Yazı Açıklaması"></textarea>
		</div>
		<div class="form-group">
			<select name="kategori_id" class="form-control">
				<?php foreach($kategoriler as $kategori): ?>
					<option value="<?php echo $kategori['kategori_id']; ?>"><?php echo $kategori['kategori_baslik']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<button type="submit" class="btn btn-primary btn-lg btn-block">Ekle</button>
	<?php echo form_close(); ?>
<?php $this->view('templates/footer'); ?>