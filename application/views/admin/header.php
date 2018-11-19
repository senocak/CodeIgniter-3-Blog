<!DOCTYPE html>
<html>
	<head>
		<title>Anıl Şenocak</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<script src="//cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prism.css">  
		<script src="<?php echo base_url(); ?>assets/js/prism.js"></script> 
		
	</head>
	<style>body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}</style>
	<body class="w3-light-grey">
		<div class="w3-content" style="max-width:1400px">
            <div class="w3-top">
                <div class="w3-bar w3-black w3-card">
                    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                    <a href="#" class="w3-bar-item w3-button w3-padding-large">Anasayfa</a>
                    
                    <div class="w3-dropdown-hover w3-hide-small">
                        <button class="w3-padding-large w3-button">Yazılar <i class="fa fa-caret-down"></i></button>     
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="<?php echo site_url('/admin/yazilar'); ?>" class="w3-bar-item w3-button">Yazılar</a>
                            <a href="<?php echo site_url('/admin/yazilar_ekle'); ?>" class="w3-bar-item w3-button">Yazı Ekle</a>
                        </div>
                    </div>
                    <div class="w3-dropdown-hover w3-hide-small">
                        <button class="w3-padding-large w3-button">Kategoriler <i class="fa fa-caret-down"></i></button>     
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="<?php echo site_url('/admin/kategoriler'); ?>" class="w3-bar-item w3-button">Kategoriler</a>
                            <a href="<?php echo site_url('/admin/kategoriler_ekle'); ?>" class="w3-bar-item w3-button">Kategori Ekle</a>
                        </div>
                    </div>
                    <a href="<?php echo site_url('/admin/yorumlar'); ?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Yorumlar</a>
                    
                    <div class="w3-dropdown-hover w3-hide-small  w3-right">
                        <button class="w3-padding-large w3-button"><?php echo $this->session->userdata('name'); ?> <i class="fa fa-caret-down"></i></button>     
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="<?php echo site_url('/admin/profil'); ?>" class="w3-bar-item w3-button">Profil</a>
                            <a href="<?php echo site_url('/admin/cikis'); ?>" class="w3-bar-item w3-button">Çıkış Yap</a>
                        </div>
                    </div>

                    <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
                </div>
            </div>
	        <br><br>
            <?php 
                if($this->session->flashdata('mesaj')){
                    echo '<div class="w3-panel w3-red">
                            <h3>Dikkat!</h3>
                            <p>'.$this->session->flashdata('mesaj').'</p>
                        </div>';
                }
            ?>