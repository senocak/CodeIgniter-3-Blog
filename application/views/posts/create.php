<?php $this->view('templates/header'); ?>
	<h2><?= $title; ?></h2>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart('posts/create'); ?>
		<div class="form-group">
			<input type="text" class="form-control" name="title" placeholder="Yazı Başlığı">
		</div>
		<div class="form-group">
			<textarea id="editor1" class="ckeditor" name="body" placeholder="Yazı Açıklaması"></textarea>
		</div>
		<div class="form-group">
			<select name="category_id" class="form-control">
				<?php foreach($categories as $category): ?>
					<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<input type="file" name="userfile" size="20">
		</div>
		<button type="submit" class="btn btn-primary btn-lg btn-block">Ekle</button>
	</form>
<?php $this->view('templates/footer'); ?>