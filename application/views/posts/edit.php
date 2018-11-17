<?php $this->view('templates/header'); ?>
	<h2><?=$title; ?></h2>
	<?php echo validation_errors(); ?>
	<?php echo form_open('posts/update'); ?>
		<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
		<div class="form-group">
			<input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['title']; ?>">
		</div>
		<div class="form-group">
			<textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
		</div>
		<div class="form-group">
			<select name="category_id" class="form-control">
				<?php foreach($categories as $category): ?>
					<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	<?php echo form_close(); ?>
<?php $this->view('templates/footer'); ?>