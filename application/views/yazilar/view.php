<?php $this->view('templates/header'); ?>
	<div class="w3-container w3-margin-bottom">
		<img src="<?php echo site_url(); ?>assets/images/kategoriler/<?php echo $post['kategori_resim']; ?>" style="width:100%" >
		<div class="w3-container w3-white">
			<p><b><?php echo $post['yazi_baslik']; ?></b></p>
			<p class="w3-opacity"><?php echo $post['kategori_baslik']; ?> | <?php echo date("d.m.Y",strtotime($post['yazi_created_at'])); ?></p>
			<p><?php echo $post['yazi_icerik']; ?></p><hr>
			<p>
				<?php 
					$dizi = explode (",",$post["yazi_etiketler"]);
					for($i=0;$i<count($dizi);$i++){
						echo "<span class='w3-tag'>$dizi[$i]</span> ";
					}
				?>
			</p>
		</div>
	</div>
	<hr>
	<?php if($comments): ?>
		<div class="w3-container w3-margin-bottom">
			<?php foreach ($comments as $comment): ?>
				<div class="w3-container w3-white">
					<h5><?php echo $comment['yorum_yorum']; ?> [by <strong><?php echo $comment['yorum_isim']; ?></strong>]</h5>
				</div>
				<br><br>
			<?php endforeach; ?>
		</div>
	<?php else : ?>
		Yorum Yok
	<?php endif; ?><hr>
	<?php echo validation_errors(); ?> 
		<div class="w3-container w3-margin-bottom">
			<?php echo form_open('comments/create/'.$post['yazi_id']); ?>
				<div class="form-group">
					<input type="text" name="yorum_isim" class="w3-input" placeholder="İsminiz" required>
				</div>
				<div class="form-group">
					<input type="text" name="yorum_email" class="w3-input" placeholder="Email" required>
				</div>
				<div class="form-group">
					<textarea name="yorum_yorum" class="w3-input" placeholder="Yorumunuz" style="resize:none;" rows="5" required></textarea>
				</div>
				<input type="hidden" name="yazi_url" value="<?php echo $post['yazi_url']; ?>">
				<button class="w3-btn w3-block w3-green" type="submit">Ekle</button> 
			<?php echo form_close(); ?>
		</div>


<?php $this->view('templates/footer'); ?>


