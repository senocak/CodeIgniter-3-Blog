<?php $this->view('iskelet/header'); ?>	 
<?php $this->view('iskelet/admin_navbar'); ?> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-tagsinput.css">
	<script src="https://cdn.ckeditor.com/4.12.1/full-all/ckeditor.js"></script>
    <style>.bootstrap-tagsinput{width: 100%;}</style>
	<?php echo validation_errors(); ?>
	<?php echo form_open('admin/yazilar_ekle'); ?>
		<?php echo form_input(array("name"=>"yazi_baslik","class"=>"form-control","required"=>"","autofocus"=>"","placeholder"=>"Yazı Başlığı")); ?>
		<textarea id="editor1" class="ckeditor" name="yazi_icerik" placeholder="Yazı Açıklaması"></textarea>
		<?php echo form_input(array("name"=>"yazi_etiketler","class"=>"form-control","placeholder"=>"Yazı Etiketleri","data-role"=>"tagsinput")); ?>
		<select name="kategori_id" class="form-control">
			<?php foreach($kategoriler as $kategori): ?>
				<option value="<?php echo $kategori['kategori_id']; ?>"><?php echo $kategori['kategori_baslik']; ?></option>
			<?php endforeach; ?>
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