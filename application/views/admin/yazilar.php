<?php $this->view('templates/header'); ?>
	<h1><?php echo $title; ?></h1>
	<br>
	<table class="table table-sm">
		<thead><tr><th scope="col">#</th><th scope="col">Başlık</th><th scope="col">Kategori</th><th scope="col">İçerik</th><th scope="col">İşlemler</th></tr></thead>
		<tbody>
			<?php 
			$i=0;
				foreach($yazilar as $yazi){
					$i++;
					echo "<tr><th>$i</th><td>".$yazi['title']."</td><td>".$yazi['name']."</td><td>".word_limiter($yazi['body'], 60)."</td><td></td></tr>";
				}
			?>
		</tbody>
	</table> 
<?php $this->view('templates/footer'); ?>