<?php $this->view('iskelet/header'); ?>	 
<?php $this->view('iskelet/admin_navbar'); ?>
	<?php echo form_open_multipart('admin/profil'); ?>
		<?php echo form_input(array("name"=>"name","class"=>"form-control","required"=>"","autofocus"=>"","value"=>$this->session->userdata('name'),"placeholder"=>$this->session->userdata('name'))); ?>
		<?php echo form_input(array("name"=>"email","class"=>"form-control","required"=>"","autofocus"=>"","value"=>$this->session->userdata('email'),"placeholder"=>$this->session->userdata('email'),"disabled"=>"","readonly"=>"")); ?>
		<?php echo form_input(array("type"=>"password","name"=>"sifre","class"=>"form-control","placeholder"=>"***")); ?>
		<?php echo form_input(array("type"=>"password","name"=>"sifre2","class"=>"form-control","placeholder"=>"***")); ?>  
		<?php echo form_submit(array("class"=>"btn btn-success","value"=>"Güncelle")); ?>
	<?php echo form_close(); ?> 
<?php $this->view('admin/footer'); ?>