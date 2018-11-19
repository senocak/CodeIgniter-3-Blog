<?php $this->view('admin/header'); ?>	 
		<div class="w3-container">
			<h4 class="w3-center">Profil</h4>
			<hr>
			<?php echo form_open_multipart('admin/profil'); ?>
			<input type="text" class="w3-input" name="name" value="<?php echo $this->session->userdata('name'); ?>" required autofocus placeholder="<?php echo $this->session->userdata('email'); ?>">
			<input type="text" class="w3-input" name="email" value="<?php echo $this->session->userdata('email'); ?>" required autofocus placeholder="<?php echo $this->session->userdata('email'); ?>">
			<input type="password" class="w3-input" name="sifre" placeholder="***">
			<input type="password" class="w3-input" name="sifre2" placeholder="***">
				
				<button type="submit" class="w3-button w3-block w3-green">Ekle</button>
			<?php echo form_close(); ?>

			
		</div> 
<?php $this->view('admin/footer'); ?>