<?php $this->view('iskelet/header'); ?>
	<div id="home">
		<?php echo form_open('admin/login',["class"=>"w3-container"]); ?> 
			<h1 class="text-center">Giriş Yap</h1>
			<input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
			<input type="password" name="password" class="form-control" placeholder="Şifre" required autofocus>
			<button type="submit" class="btn btn-success">Giriş Yap</button> 
		<?php echo form_close(); ?> 
	</div>
<?php $this->view('iskelet/footer'); ?>

<!-- lorem@ipsum.com -->
<!-- lorem -->