<?php $this->view('templates/header'); ?>

	<div class="w3-container w3-margin-bottom">
		<a href="<?php echo site_url('/yazi/'.$post['yazi_url']); ?>"><img src="<?php echo site_url(); ?>assets/images/kategoriler/<?php echo $post['kategori_resim']; ?>" style="width:100%" class="w3-hover-opacity"></a>
		<div class="w3-container w3-white">
			<p><b><?php echo $post['yazi_baslik']; ?></b></p>
			<p class="w3-opacity"><?php echo $post['kategori_baslik']; ?> | <?php echo date("d.m.Y",strtotime($post['yazi_created_at'])); ?></p>
			<p><?php echo $post['yazi_icerik']; ?></p><hr>
			<p></p>
		</div>
	</div>


	<hr>
	<h3>Yorumlar</h3>
	<?php if($comments): ?>
		<?php foreach ($comments as $comment): ?>
			<div class="badge badge-secondary">
				<h5><?php echo $comment['yorum_yorum']; ?> [by <strong><?php echo $comment['yorum_isim']; ?></strong>]</h5>
			</div>
			<br><br>
		<?php endforeach; ?>
	<?php else : ?>
		Yorum Yok
	<?php endif; ?><hr>
	<h3>Yorum Ekle</h3>
	<?php echo validation_errors(); ?> 
	<?php echo form_open('comments/create/'.$post['yazi_id']); ?>
		<div class="form-group">
			<input type="text" name="yorum_isim" class="form-control" placeholder="İsminiz" required>
		</div>
		<div class="form-group">
			<input type="text" name="yorum_email" class="form-control" placeholder="Email" required>
		</div>
		<div class="form-group">
			<textarea name="yorum_yorum" class="form-control" placeholder="Yorumunuz" style="resize:none;" rows="5" required></textarea>
		</div>
		<input type="hidden" name="yazi_url" value="<?php echo $post['yazi_url']; ?>">
		<button class="btn btn-primary" type="submit">Ekle</button>
	</form>

<?php $this->view('templates/footer'); ?>
