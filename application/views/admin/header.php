<!DOCTYPE html>
<html>
	<head>
		<title>Anıl Şenocak</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3.css">
        <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prism.css">  
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script> 
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
		<script src="<?php echo base_url(); ?>assets/js/prism.js"></script>
	    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
		 <style type="text/css">.sortable { cursor: move; }</style>
        <script type="text/javascript">
            function showimagepreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {$('#imgview').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
	</head>
	<style>body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}</style>
	<body class="w3-light-grey">
		<div class="w3-content" style="max-width:1400px">
            <div class="w3-top">
                <div class="w3-bar w3-black w3-card">
                    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                    <a href="<?php echo base_url(); ?>" class="w3-bar-item w3-button w3-padding-large">Anasayfa</a>
                    <div class="w3-dropdown-hover w3-hide-small">
                        <button class="w3-padding-large w3-button">Yazılar <i class="fa fa-caret-down"></i></button>     
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="<?php echo site_url('/admin/yazilar'); ?>" class="w3-bar-item w3-button">Yazılar</a>
                            <a href="<?php echo site_url('/admin/yazilar_ekle'); ?>" class="w3-bar-item w3-button">Yazı Ekle</a>
                        </div>
                    </div>
                    <a href="<?php echo site_url('/admin/kategoriler'); ?>" class="w3-bar-item w3-button w3-padding-large">Kategoriler</a>
                    <a href="<?php echo site_url('/admin/yorumlar'); ?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Yorumlar</a>
                    <div class="w3-dropdown-hover w3-hide-small  w3-right">
                        <button class="w3-padding-large w3-button"><i class="fa fa-user"></i> <?php echo $this->session->userdata('name'); ?> <i class="fa fa-caret-down"></i></button>     
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="<?php echo site_url('/admin/profil'); ?>" class="w3-bar-item w3-button">Profil</a>
                            <a href="<?php echo site_url('/admin/cikis'); ?>" class="w3-bar-item w3-button">Çıkış Yap</a>
                        </div>
                    </div>
                </div>
            </div>
	        <br><br>
            <?php 
                if($this->session->flashdata('mesaj')){
                    echo '<div class="w3-panel w3-red"><h3>Dikkat!</h3><p>'.$this->session->flashdata('mesaj').'</p></div>';
                }
            ?>