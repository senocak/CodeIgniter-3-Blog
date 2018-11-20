<?php $this->view('admin/header'); ?>
	<br><br><?php echo validation_errors(); ?>
	<?php echo form_open('admin/yazilar_guncelle_post'); ?>
		<input type="hidden" name="id" value="<?php echo $post['yazi_id']; ?>">
		<input type="text" class="w3-input w3-border w3-margin-bottom" name="yazi_baslik" placeholder="Başlık Ekle" value="<?php echo $post['yazi_baslik']; ?>">
		<textarea id="editor1" class="ckeditor" name="yazi_icerik" placeholder="İçerik"><?php echo htmlspecialchars($post['yazi_icerik']); ?></textarea>	
		<br>
		<input type="text" name="yazi_etiketler" value="<?php echo $post["yazi_etiketler"] ?>" data-role="tagsinput" class="w3-select w3-border w3-margin-bottom" />
		<br><br><select name="kategori_id" class="w3-select w3-border w3-margin-bottom">
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
















   
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css'>


	
 
<script src='https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js'></script>