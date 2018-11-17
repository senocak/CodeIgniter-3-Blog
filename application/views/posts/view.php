<?php $this->view('templates/header'); ?>
	<h1><?php echo $post['title']; ?></h1>
	<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>
	<img src="<?php echo site_url(); ?>assets/images/kategoriler/<?php echo $post['resim']; ?>">
	<div class="post-body"><?php echo $post['body']; ?></div>
	<hr>
	<h3>Yorumlar</h3>
	<?php if($comments): ?>
		<?php foreach ($comments as $comment): ?>
			<div class="badge badge-secondary">
				<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
			</div>
			<br><br>
		<?php endforeach; ?>
	<?php else : ?>
		Yorum Yok
	<?php endif; ?><hr>
	<h3>Yorum Ekle</h3>
	<?php echo validation_errors(); ?> 
	<?php echo form_open('comments/create/'.$post['id']); ?>
		<div class="form-group">
			<input type="text" name="name" class="form-control" placeholder="İsminiz" required>
		</div>
		<div class="form-group">
			<input type="text" name="email" class="form-control" placeholder="Email" required>
		</div>
		<div class="form-group">
			<textarea name="body" class="form-control" placeholder="Yorumunuz" style="resize:none;" rows="5" required></textarea>
		</div>
		<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
		<button class="btn btn-primary" type="submit">Ekle</button>
	</form>

<?php $this->view('templates/footer'); ?>
