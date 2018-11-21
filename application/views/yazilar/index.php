<?php $this->view('templates/header'); ?>
	<div class="w3-row-padding">
		<?php foreach($posts as $post) : ?>
			<div class="w3-third w3-container">
				<div class="w3-display-container w3-hover-gray scale" >
					<a href="<?php echo site_url('/yazi/'.$post['yazi_url']); ?>">
					<img src="<?php echo site_url(); ?>assets/images/kategoriler/<?php echo $post['kategori_resim']; ?>" style="width:100%" class="w3-hover-opacity">
					</a>
					<div class="w3-display-bottomleft w3-container w3-white"><b><?php echo $post['kategori_baslik']; ?></b></div>
					<div class="w3-display-bottomright w3-container w3-tag"><?php echo $this->yazilar_model->get_yorumlar_toplam($post["yazi_id"]); ?></div>
				</div>
				<div class="w3-container w3-white">
					<?php if($post["yazi_onecikan"]=="1"){ ?>
						<p style="float:right"><i class="fa fa-thumbtack"></i></a>
					<?php } ?>
					<p><b><?php echo $post['yazi_baslik']; ?></b></p>
					<p style="text-align: justify;"><?php echo word_limiter(strip_tags($post["yazi_icerik"]),10);?><br>
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
	<div class="w3-container">
		<?php echo $this->pagination->create_links(); ?>
	</div>
<?php $this->view('templates/footer'); ?>