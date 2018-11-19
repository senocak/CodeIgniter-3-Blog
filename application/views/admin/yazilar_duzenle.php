<?php $this->view('templates/header'); ?>
	<br><br>
	<?php echo validation_errors(); ?>
	<?php echo form_open('admin/yazilar_guncelle_post'); ?>
		<input type="hidden" name="id" value="<?php echo $post['yazi_id']; ?>">
		<div class="form-group">
			<input type="text" class="form-control" name="yazi_baslik" placeholder="Başlık Ekle" value="<?php echo $post['yazi_baslik']; ?>">
		</div>
		<div class="form-group">
			<textarea id="editor1" class="ckeditor" name="yazi_icerik" placeholder="İçerik"><?php echo $post['yazi_icerik']; ?></textarea>
		</div>
		<div class="form-group">
			<select name="kategori_id" class="form-control">
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
		</div>
		<button type="submit" class="btn btn-default">Güncelle</button>
	<?php echo form_close(); ?>
<?php $this->view('templates/footer'); ?>