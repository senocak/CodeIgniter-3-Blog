<?php $this->view('templates/header'); ?>
	<h2><?= $title ?></h2>
	<style>
		img { 
			margin-top: -50px; /* Half the height */
			margin-left: -250px; /* Half the width */
		}
	</style>
	<div class="row">
		<?php foreach($posts as $post) : ?>
			<div class="col-lg-4">
				<div class="card mb-3">
					<h3 class="card-header"><?php echo $post['title']; ?></h3>
					<a href="<?php echo site_url('/posts/'.$post['slug']); ?>"><img style="width:100%;margin: 0 auto;" src="<?php echo site_url(); ?>assets/images/kategoriler/<?php echo $post['resim']; ?>"></a>
					<div class="card-body">
						<p class="card-text"><?php echo word_limiter($post['body'], 60); ?></p>
						<a href="#" class="card-link"><?php echo $post['name']; ?></a> 
					</div>
					<div class="card-footer text-muted"><small class="post-date">Posted on: <?php echo $post['created_at']; ?></small></div>
				</div> 
			</div> 
		<?php endforeach; ?> 
		<div class="pagination-links">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
<?php $this->view('templates/footer'); ?>