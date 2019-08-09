<?php $this->view('iskelet/header'); ?>	 
<?php $this->view('iskelet/admin_navbar'); ?> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-tagsinput.css">
	<script src="https://cdn.ckeditor.com/4.12.1/full-all/ckeditor.js"></script>
    <style>.bootstrap-tagsinput{width: 100%;}</style>
	<?php echo validation_errors(); ?>
	<?php echo form_open('admin/yazilar_guncelle_post'); ?>
		<input type="hidden" name="id" value="<?php echo $post['yazi_id']; ?>">
		<input type="text" class="form-control" name="yazi_baslik" placeholder="Başlık Ekle" value="<?php echo $post['yazi_baslik']; ?>">
		<textarea id="editor1" class="ckeditor" name="yazi_icerik" placeholder="İçerik"><?php echo htmlspecialchars($post['yazi_icerik']); ?></textarea>	
		<br>
		<?php echo form_input(array("name"=>"yazi_etiketler","class"=>"form-control","placeholder"=>"Yazı Etiketleri","data-role"=>"tagsinput","value"=>$post['yazi_etiketler'])); ?>
		<br><select name="kategori_id" class="form-control">
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
		<?php echo form_submit(array("class"=>"btn btn-success btn-block","value"=>"Ekle")); ?>
	<?php echo form_close(); ?>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-tagsinput.min.js"></script>
	<script>
        CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: "<?php echo base_url(); ?>assets/editor/fileman/index.html",
            filebrowserImageBrowseUrl: "<?php echo base_url(); ?>assets/editor/fileman/index.html",
            extraPlugins: 'codesnippet'
        });
    </script>
<?php $this->view('iskelet/footer'); ?>