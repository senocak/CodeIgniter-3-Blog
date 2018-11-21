<?php $this->view('iskelet/header'); ?>
	<div class="w3-container w3-margin-bottom">
		<img src="<?php echo site_url(); ?>assets/images/kategoriler/<?php echo $post['kategori_resim']; ?>" style="width:100%" >
		<div class="w3-container w3-light-grey w3-card-4">
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
	<?php if($comments): ?>
		<div class="w3-container w3-margin-bottom">
			<?php foreach ($comments as $comment): ?>
				<br>
				<div class="w3-card-4">
					<header class="w3-container w3-light-grey" id="yorum_<?php echo $comment['yorum_id']; ?>"><h3><?php echo $comment['yorum_isim']; ?> <small style="font-size: 12px;"><?php echo date("d.m.Y h:ia",strtotime($comment["yorum_created_at"]));?></small></h3></header>
					<div class="w3-container">  
						<img src="<?php echo base_url(); ?>assets/images/img.png" width="80px" alt="Avatar" class="w3-left w3-circle">
						<p><?php echo $comment['yorum_yorum']; ?></p>
					</div> 
				</div>
			<?php endforeach; ?>
		</div>
	<?php else : ?>
		<div class="w3-container w3-margin-bottom ">
			<div class="w3-container w3-light-grey w3-card-4 w3-center">
				Yorum Yok
			</div>
		</div>
	<?php endif; ?><hr>
	<?php echo validation_errors(); ?> 
	<div class="w3-container w3-margin-bottom">
		<?php echo form_open('comments/create/'.$post['yazi_id']); ?>
			<?php echo form_input(array("name"=>"yorum_isim","class"=>"w3-input w3-card-4 w3-light-grey w3-card-4 w3-light-grey","required"=>"","placeholder"=>"İsminiz")); ?>
			<?php echo form_input(array("name"=>"yorum_email","class"=>"w3-input w3-card-4 w3-light-grey","required"=>"","placeholder"=>"Email")); ?>
			<?php echo form_textarea(array("name"=>"yorum_yorum","class"=>"w3-input w3-card-4 w3-light-grey","required"=>"","style"=>"resize:none;","rows"=>"5","placeholder"=>"Yorumunuz")); ?>
			<?php echo form_input(array("type"=>"hidden","name"=>"yazi_url","value"=>$post['yazi_url'],"disabled"=>"","readonly"=>"")); ?>
			<?php echo form_submit(array("class"=>"w3-button w3-block w3-green","value"=>"Ekle")); ?>
		<?php echo form_close(); ?>
	</div>
<?php $this->view('iskelet/footer'); ?>


