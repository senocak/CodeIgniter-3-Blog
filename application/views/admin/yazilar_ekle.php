<?php $this->view('admin/header'); ?>
	<br>

	

                <style>
                .tag label label-info{
                    color:blue;
                }
                </style>


	<?php echo validation_errors(); ?>
	<?php echo form_open('admin/yazilar_ekle'); ?>
		<?php echo form_input(array("name"=>"yazi_baslik","class"=>"w3-input","required"=>"","autofocus"=>"","placeholder"=>"Yazı Başlığı")); ?>
		<textarea id="editor1" class="ckeditor" name="yazi_icerik" placeholder="Yazı Açıklaması"></textarea>
		<br>
		<?php echo form_input(array("name"=>"yazi_etiketler","class"=>"w3-input","placeholder"=>"Yazı Etiketleri","data-role"=>"tagsinput")); ?>
		<br><select name="kategori_id" class="w3-select w3-border w3-margin-bottom">
			<?php foreach($kategoriler as $kategori): ?>
				<option value="<?php echo $kategori['kategori_id']; ?>"><?php echo $kategori['kategori_baslik']; ?></option>
			<?php endforeach; ?>
		</select> 
		<?php echo form_submit(array("class"=>"w3-button w3-block w3-green","value"=>"Ekle")); ?>
	<?php echo form_close(); ?>

<?php $this->view('admin/footer'); ?>