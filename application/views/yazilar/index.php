<?php $this->view('templates/header'); ?>
	<div class="w3-row-padding">
  		<?php $i=0; ?>
		<?php foreach($posts as $post) : ?>
			<div class="w3-third w3-container">
				<div class="w3-display-container w3-hover-gray scale" >
					<a href="<?php echo site_url('/yazi/'.$post['yazi_url']); ?>">
					<img src="<?php echo site_url(); ?>assets/images/kategoriler/<?php echo $post['kategori_resim']; ?>" style="width:100%" class="w3-hover-opacity">
					</a>
					<div class="w3-display-bottomleft w3-container w3-white"><b><?php echo $post['kategori_baslik']; ?></b></div>
					<div class="w3-display-bottomright w3-container w3-tag">2</div>
				</div>
				<div class="w3-container w3-white">
					<p><b><?php echo $post['yazi_baslik']; ?></b></p>
					<?php
						$kelime=100;
						$icerik=strip_tags($post["yazi_icerik"]);
						if(strlen($icerik)>=$kelime){
							if(preg_match('/(.*?)\s/i',substr($icerik,$kelime),$dizi))$icerik=substr($icerik,0,$kelime+strlen($dizi[0]))."...";
						}else{
							$icerik.="";
						}
						$i++;
					?>
					<p style="text-align: justify;"><?php echo $icerik;?><br>
					<?php 
						$dizi = explode (",",$post["yazi_etiketler"]);
						for($i=0;$i<count($dizi);$i++){
							echo "<span class='w3-tag'>$dizi[$i]</span> ";
						}
					?>
					</p>
				</div>
			</div>
		<?php endforeach; ?> 
	</div> 
	<?php echo $this->pagination->create_links(); ?>
<?php $this->view('templates/footer'); ?>