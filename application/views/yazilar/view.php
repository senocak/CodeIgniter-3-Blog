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
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 	 
		<link href="<?php echo base_url(); ?>assets/css/prism.css" rel="stylesheet" >
		<script src="<?php echo base_url(); ?>assets/js/prism.js"></script> 	 
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
                <div id="home">

                    <div class="col-18 col-offset-1 main -layout" style="text-align:justify">
                        <header class="post-header"><h1 class="post-title" style="font-size: 50px;"><?php echo $post['yazi_baslik']; ?></h1></header>
                        <span class="time" style="font-size: 15px;"><?php echo $post["yazi_created_at"];?></span>
                        <span class="categories " style="font-size: 15px;">
                            » <a href="<?php echo site_url(); ?>kategori/<?php echo $post['kategori_url']; ?>"><button class="btn btn-success btn-xs"><?php echo $post['kategori_baslik']; ?></button></a> 
                            » <?php echo $this->yazilar_model->get_yorumlar_toplam($post["yazi_id"]); ?> Yorum
                            <?php 
                                if ($post["yazi_etiketler"]) { 
                                    echo "» ";
                                    $dizi = explode (",",$post["yazi_etiketler"]);
                                    foreach(explode(',', $post["yazi_etiketler"]) as $etiket){
                                        echo "<span class='etiket'>$etiket</span> ";
                                    }   
                                }
                                //echo word_limiter(strip_tags($post["yazi_icerik"]),10);                               
                                ?> 
                        </span>
                        <div class="content"><div class="post"><p><?php echo $post["yazi_icerik"];?></p></div></div>
                    </div>
                </div>
                <?php echo form_open('comments/create/'.$post['yazi_id']); ?>
                    <?php echo form_input(array("name"=>"yorum_isim","class"=>"form-control","required"=>"","placeholder"=>"İsminiz")); ?>
                    <?php echo form_input(array("name"=>"yorum_email","class"=>"form-control","required"=>"","placeholder"=>"Email")); ?>
                    <?php echo form_textarea(array("name"=>"yorum_yorum","class"=>"form-control","required"=>"","style"=>"resize:none;","rows"=>"5","placeholder"=>"Yorumunuz")); ?>
                    <?php echo form_input(array("type"=>"hidden","name"=>"yazi_url","value"=>$post['yazi_url'],"disabled"=>"","readonly"=>"")); ?>
                    <?php echo form_submit(array("class"=>"btn btn-lg btn-primary btn-block","value"=>"Ekle")); ?>
                <?php echo form_close(); ?>
                <?php if($comments): ?>
                    <div class="w3-container w3-margin-bottom">
                        <?php foreach ($comments as $comment): ?>
                            <div style="display: flex;align-items: flex-start;border: 1px solid #dee2e6!important;    margin-bottom: 1rem!important;    padding: 1rem!important;">
                                <img src="<?php echo base_url(); ?>assets/images/img.png"  style="width:60px; margin-right: 1rem!important;margin-top: 1rem!important;    border-radius: 50%!important;">
                                <div style="width:100%">
                                    <h4><?php echo $comment['yorum_isim']; ?><small style="float:right"><i><?php echo date("d.m.Y h:ia",strtotime($comment["yorum_created_at"]));?></i></small></h4>
                                    <p><?php echo $comment['yorum_yorum']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    Yorum Yok
                <?php endif; ?><hr>
                <footer>Powered by &copy; <a href="https://github.com/senocak">Anıl Şenocak</a></footer>
            </div>
        </div>
    </body>
</html>
