<?php $this->view('templates/header'); ?> 
	<?php foreach($posts as $post) : ?>
		<div class="w3-third w3-container w3-margin-bottom">
			<a href="<?php echo site_url('/yazi/'.$post['yazi_url']); ?>"><img src="<?php echo site_url(); ?>assets/images/kategoriler/<?php echo $post['kategori_resim']; ?>" style="width:100%" class="w3-hover-opacity"></a>
			<div class="w3-container w3-white">
				<p><b><?php echo $post['yazi_baslik']; ?></b></p>
				<p class="w3-opacity"><?php echo $post['kategori_baslik']; ?> | <?php echo date("d.m.Y",strtotime($post['yazi_created_at'])); ?></p>
				<p><?php echo word_limiter($post['yazi_icerik'], 20); ?></p><hr>
				<p></p>
			</div>
		</div>
	<?php endforeach; ?> 
	<div class="pagination-links">
		<?php echo $this->pagination->create_links(); ?>
	</div>
	<hr>
<?php $this->view('templates/footer'); ?>