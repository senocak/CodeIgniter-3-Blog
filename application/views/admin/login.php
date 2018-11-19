<?php $this->view('templates/header'); ?>	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo form_open('admin/login'); ?>
					<div class="row">
						<div class="col-md-12 col-md-offset-12">
							<h1 class="text-center">Giriş Yap</h1>
							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Şifre" required autofocus>
							</div>
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</div>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
<?php $this->view('templates/footer'); ?>