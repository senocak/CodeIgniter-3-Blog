<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<title>Anıl Şenocak | Blog</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/prism.css" rel="stylesheet" >
        <script src="<?php echo base_url(); ?>assets/js/prism.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <style>
            .etiket{
                display: inline-block !important;
                min-width: 10px !important;
                padding: 3px 7px !important;
                font-weight: 700 !important;
                line-height: 1 !important;
                vertical-align: baseline !important;
                white-space: nowrap !important;
                text-align: center !important;
                border-radius: 10px !important;
                font-size: 12px !important;
                background-color: #ffc107 !important;
                color: black !important;
            }
        </style>
    </head>
    <body>
        <div class="container" style="width: 100%;">
            <div class="col-sm-3" style="margin-top: 0px;">
                <div class="fixed-condition">
                    <a href="<?php echo base_url(); ?>"><img class="profile-avatar" src="<?php echo base_url(); ?>assets/images/logo.png" width="75px" /></a>
                    <h1 class="author-name">Anıl Şenocak</h1>
                    <div class="profile-about" style="font-size:15px;">I'm Full Stack Programmer. <br>I've made quite a few web apps, especially on Laravel.</div>
                    <div class="social">
                        <ul>
                            <li><a href="http://linkedib.com/in/anilsenocak27" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <li><a href="http://github.com/senocak" target="_blank"><i class="fa fa-github"></i></a>
                            <li><a href="/resume.pdf" target="_blank" title="Resume PDF"><i class="fa fa-file-pdf-o" style="color:red"></i></a>
                        </ul>
                    </div>
                    <hr />
                    <ul class="sidebar-nav"  style="font-size:15px;">
                        <li><a href="<?php echo base_url(); ?>">Anasayfa</a>
                        <?php foreach($kategoriler as $kategori) : ?>
                            <li><a href="<?php echo base_url(); ?>kategori/<?php echo $kategori["kategori_url"]?>"><?php echo $kategori["kategori_baslik"]?></a> 
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9 col-offset-1 main -layout"> 