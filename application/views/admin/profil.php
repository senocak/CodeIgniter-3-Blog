<?php $this->view('admin/header'); ?>	 
	<div class="w3-container">
		<?php echo form_open_multipart('admin/profil'); ?>
			<?php echo form_input(array("name"=>"name","class"=>"w3-input","required"=>"","autofocus"=>"","value"=>$this->session->userdata('name'),"placeholder"=>$this->session->userdata('name'))); ?>
			<?php echo form_input(array("name"=>"email","class"=>"w3-input","required"=>"","autofocus"=>"","value"=>$this->session->userdata('email'),"placeholder"=>$this->session->userdata('email'),"disabled"=>"","readonly"=>"")); ?>
			<?php echo form_input(array("type"=>"password","name"=>"sifre","class"=>"w3-input","placeholder"=>"***")); ?>
			<?php echo form_input(array("type"=>"password","name"=>"sifre2","class"=>"w3-input","placeholder"=>"***")); ?>  
			<?php echo form_submit(array("class"=>"w3-button w3-block w3-green","value"=>"Güncelle")); ?>
		<?php echo form_close(); ?> 
	</div> 
<?php $this->view('admin/footer'); ?>