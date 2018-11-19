<?php $this->view('admin/header'); ?>	
	</div>
	<div class="w3-center"><br> 
		<?php echo form_open('admin/login',["class"=>"w3-container"]); ?> 
			<h1 class="text-center">Giriş Yap</h1>
			<input type="email" name="email" class="w3-input w3-border w3-margin-bottom" placeholder="Email" required autofocus>
			<input type="password" name="password" class="w3-input w3-border w3-margin-bottom" placeholder="Şifre" required autofocus>
			<button type="submit" class="w3-button w3-block w3-green w3-section w3-padding">Login</button> 
		<?php echo form_close(); ?> 
<?php $this->view('admin/footer'); ?>