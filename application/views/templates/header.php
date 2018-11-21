<!DOCTYPE html>
<html>
	<head>
		<title>Anıl Şenocak</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<!--<script src="//cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>-->
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prism.css">  
		<script src="<?php echo base_url(); ?>assets/js/prism.js"></script> 
		
	</head>
	<style>body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}</style>
	<body class="w3-light-grey">
		<div class="w3-content" style="max-width:1400px">
			<header class="w3-container w3-center w3-padding-32"> 
				<h1><b><a href='<?php echo base_url(); ?>'>Anıl Şenocak</a></b></h1>
				<p>
					<span class="w3-tag">Laravel</span>
					<span class="w3-tag">Codeigneiter</span>
				</p>
			</header>
			<div class="w3-row">
				<div class="w3-col l8 s12">
					<?php 
						if($this->session->flashdata('mesaj')){
							echo '<p class="alert alert-danger">'.$this->session->flashdata('mesaj').'</p>';
						}
					?>