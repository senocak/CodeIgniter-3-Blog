<?php $this->view('admin/header'); ?>
	<br>
	<?php echo validation_errors(); ?>
	<?php echo form_open('admin/yazilar_ekle'); ?>
		<input type="text" class="w3-input w3-border w3-margin-bottom" name="yazi_baslik" placeholder="Yazı Başlığı">
	
		<textarea id="editor1" class="ckeditor" name="yazi_icerik" placeholder="Yazı Açıklaması"></textarea>
	
		<select name="kategori_id" class="w3-input w3-border w3-margin-bottom">
			<?php foreach($kategoriler as $kategori): ?>
				<option value="<?php echo $kategori['kategori_id']; ?>"><?php echo $kategori['kategori_baslik']; ?></option>
			<?php endforeach; ?>
		</select>
		<button type="submit" class="w3-button w3-block w3-green">Ekle</button>
	<?php echo form_close(); ?>
<?php $this->view('admin/footer'); ?>