<?php $this->view('admin/header'); ?>
	<style type="text/css">.sortable { cursor: move; }</style>
	<a href="<?php echo site_url('/admin/yazilar_ekle'); ?>" class="w3-button w3-block w3-dark-grey">Ekle</a>
	<table class="w3-table-all  w3-card-4">
		<thead><tr><th scope="col">#</th><th scope="col">Başlık</th><th scope="col">Tarih</th><th scope="col">Kategori</th><th scope="col">Etiketler</th><th scope="col">İşlemler</th></tr></thead>
		<tbody id="sortable">
			<?php 
			$i=0;
				foreach($yazilar as $yazi){
					$i++;
					$etiketler="";
					$dizi = explode (",",$yazi["yazi_etiketler"]);
					for($etiketler_i=0;$etiketler_i<count($dizi);$etiketler_i++){
						$etiketler=$etiketler."<span class='w3-tag'>$dizi[$etiketler_i]</span> ";
					}
					echo "<tr id='".$yazi['yazi_id']."'>
							<th class='sortable'>$i</th>
							<td>".$yazi['yazi_baslik']."</td>
							<td>".date("d.m.Y",strtotime($yazi['yazi_created_at']))."</td>
							<td>".$yazi['kategori_baslik']."</td>
							<td>$etiketler</td>
							<td>
								<a href='".site_url('/admin/yazilar_duzenle/'.$yazi['yazi_id'])."' class='btn btn-primary'>Düzenle</a>
								<a href='".site_url('/admin/yazilar_sil/'.$yazi['yazi_id'])."' class='btn btn-danger'>Sil</a>
							</td>
						</tr>";
				}
			?>
		</tbody>
	</table> 
	<script type="text/javascript"> 
		$(function() {
			$( "#sortable" ).sortable({
				revert: true,
				handle: ".sortable",
				stop: function (event, ui) {
					var data = $(this).sortable('serialize');  
					$.ajax({
						type: "POST",
						dataType: "json",
						data:	{
									'sirala': $( "#sortable" ).sortable('toArray'),
								},
						url: '<?php echo site_url('/admin/yazilar_sirala'); ?>'
					});	
					
					location.reload();
				}
			});
			$( "#sortable" ).disableSelection();	                      		
		});	                      	
	</script>
<?php $this->view('admin/footer'); ?>