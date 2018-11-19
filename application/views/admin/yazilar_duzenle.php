<?php $this->view('admin/header'); ?>
	<br><br>
	<?php echo validation_errors(); ?>
	<?php echo form_open('admin/yazilar_guncelle_post'); ?>
		<input type="hidden" name="id" value="<?php echo $post['yazi_id']; ?>">
		<input type="text" class="w3-input w3-border w3-margin-bottom" name="yazi_baslik" placeholder="Başlık Ekle" value="<?php echo $post['yazi_baslik']; ?>">
	
		<textarea id="editor1" class="ckeditor" name="yazi_icerik" placeholder="İçerik"><?php echo $post['yazi_icerik']; ?></textarea>
	
		<select name="kategori_id" class="w3-input w3-border w3-margin-bottom">
			<?php 
				foreach($categories as $category){
					if($category["kategori_id"]==$post["kategori_id"]){
						echo "<option value='".$category['kategori_id']."' selected>".$category['kategori_baslik']."</option>";
					}else{
						echo "<option value='".$category['kategori_id']."'>".$category['kategori_baslik']."</option>";
					}
				}
				?>
		</select>
		<button type="submit" class="w3-button w3-block w3-green">Güncelle</button>
	<?php echo form_close(); ?>
<?php $this->view('admin/footer'); ?>