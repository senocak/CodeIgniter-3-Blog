<?php $this->view('templates/header'); ?>
	<h2><?=$title;?></h2>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart('categories/create'); ?>
		<div class="form-group">
			<input type="text" class="form-control" name="name" placeholder="Kategori İsmi">
		</div>
		<div class="form-group">
			<input type="file" name="userfile" class="form-control" required>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	<?php echo form_close(); ?>
<?php $this->view('templates/footer'); ?>