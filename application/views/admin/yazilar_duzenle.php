<?php $this->view('admin/header'); ?>
	<br><br><?php echo validation_errors(); ?>
	<?php echo form_open('admin/yazilar_guncelle_post'); ?>
		<input type="hidden" name="id" value="<?php echo $post['yazi_id']; ?>">
		<input type="text" class="w3-input w3-border w3-margin-bottom" name="yazi_baslik" placeholder="Başlık Ekle" value="<?php echo $post['yazi_baslik']; ?>">
		<textarea id="editor1" class="ckeditor" name="yazi_icerik" placeholder="İçerik"><?php echo htmlspecialchars($post['yazi_icerik']); ?></textarea>	
		<br>
		<?php echo form_input(array("name"=>"yazi_etiketler","class"=>"w3-input","placeholder"=>"Yazı Etiketleri","data-role"=>"tagsinput","value"=>$post['yazi_etiketler'])); ?>
		<br><select name="kategori_id" class="w3-select w3-border w3-margin-bottom">
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
		<?php echo form_submit(array("class"=>"w3-button w3-block w3-green","value"=>"Ekle")); ?>
	<?php echo form_close(); ?>
<?php $this->view('admin/footer'); ?>