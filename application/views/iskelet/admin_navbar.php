<nav class="navbar navbar-inverse">
  <div class="container-fluid"> 
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo base_url(); ?>">Anasayfa</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Yazılar
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url(); ?>admin/yazilar_ekle">Yazı Ekle</a></li>
          <li><a href="<?php echo base_url(); ?>admin/yazilar">Yazılar</a></li>
        </ul>
      </li>
      <li><a href="<?php echo base_url(); ?>admin/kategoriler">Kategoriler</a></li>
      <li><a href="<?php echo base_url(); ?>admin/yorumlar">Yorumlar</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">  
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->session->userdata('name'); ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url(); ?>admin/profil">Profil</a></li>
          <li><a href="<?php echo base_url(); ?>admin/cikis">Çıkış Yap</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<?php 
  if($this->session->flashdata('mesaj')){
    echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>".$this->session->flashdata('mesaj')."</strong></div> 	"; 
  }
?>
  