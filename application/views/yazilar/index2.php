<?php $this->view('iskelet/header'); ?>
	<div class="w3-row-padding">
		<?php foreach($posts as $post) : ?>
			<div class="w3-third w3-container w3-margin-bottom">
				<div class="w3-display-container w3-hover-gray scale" >
					<a href="<?php echo site_url('/yazi/'.$post['yazi_url']); ?>">
						<img src="<?php echo site_url(); ?>assets/images/kategoriler/<?php echo $post['kategori_resim']; ?>" style="width:100%" class="w3-hover-opacity">
					</a>
					<div class="w3-display-bottomleft w3-container w3-light-grey"><b><?php echo $post['kategori_baslik']; ?></b></div>
					<div class="w3-display-bottomright w3-light-grey w3-tag"><?php echo $this->yazilar_model->get_yorumlar_toplam($post["yazi_id"]); ?></div>
				</div>
				<div class="w3-container w3-card-4 w3-light-grey">
					<?php if($post["yazi_onecikan"]=="1"){ ?>
						<p style="float:right"><i class="fa fa-thumbtack"></i></a>
					<?php } ?>
					<p>
						<b>
							<a href="<?php echo site_url('/yazi/'.$post['yazi_url']); ?>" style="text-decoration: none;">
								<?php echo $post['yazi_baslik']; ?>
							</a>	
						</b>
					</p>
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
	<br><br>
	<div class="w3-container">
		<?php echo $this->pagination->create_links(); ?>
	</div>
<?php $this->view('iskelet/footer'); ?>