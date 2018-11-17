<html>
	<head>
		<title>ciBlog</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
		<script src="//cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	</head>
	<body>  
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">Anasayfa</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active"><a class="nav-link" href="<?php echo base_url(); ?>about">Hakkımda</a></li>
					<li class="nav-item active"><a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a></li>
					<li class="nav-item active"><a class="nav-link" href="<?php echo base_url(); ?>categories">Kategoriler</a></li>
				</ul>
				<?php if(!$this->session->userdata('logged_in')): ?>
					<ul class="navbar-nav">
						<li><a href="<?php echo base_url(); ?>admin/login">Login</a></li>
					</ul>
				<?php endif; ?>
				<?php if($this->session->userdata('logged_in')): ?> 
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $this->session->userdata('username'); ?>  asdasdasdas asd asd
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="<?php echo base_url(); ?>admin/yazilar">Yazı Yaz</a>
							<a class="dropdown-item" href="<?php echo base_url(); ?>admin/kategoriler">Kategori Oluştur</a>
							<a class="dropdown-item" href="<?php echo base_url(); ?>admin/yorumlar">Yorumlar</a>
							<a class="dropdown-item" href="<?php echo base_url(); ?>admin/cikis">Çıkış Yap</a>
						</div>
					</div>
				<?php endif; ?>

 
		  </div>
		</nav>
		<div class="container"> 
			<?php 
			if($this->session->flashdata('user_registered')){
				echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';
			}
			if($this->session->flashdata('post_created')){
				echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>';
			}
			if($this->session->flashdata('post_updated')){
				echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>';
			}
			if($this->session->flashdata('category_created')){
				echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>';
			}
			if($this->session->flashdata('post_deleted')){
				echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>';
			}
			if($this->session->flashdata('login_failed')){
				echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';
			}
			if($this->session->flashdata('user_loggedin')){
				echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>';
			}
			if($this->session->flashdata('user_loggedout')){
				echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>';
			}
			if($this->session->flashdata('category_deleted')){
				echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>';
			}