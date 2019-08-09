<?php $this->view('iskelet/header'); ?>	 
<?php $this->view('iskelet/admin_navbar'); ?>  
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<style type="text/css">.sortable { cursor: move; }</style>
	<a href="<?php echo site_url('/admin/yazilar_ekle'); ?>" class="btn btn-success btn-block btn-lg ">Ekle</a>
	<table class="table table-dark">
		<thead><tr><th scope="col">#</th><th scope="col">Başlık</th><th scope="col">Tarih</th><th scope="col">Kategori</th><th scope="col">Etiketler</th><th scope="col">İşlemler</th></tr></thead>
		<tbody id="sortable">
			<?php 
			$i=0;
				foreach($yazilar as $yazi){
					$i++;
					$etiketler="";
					$dizi = explode (",",$yazi["yazi_etiketler"]);
					if ($yazi["yazi_etiketler"]) { 
						for($etiketler_i=0;$etiketler_i<count($dizi);$etiketler_i++){
							$etiketler=$etiketler."<span class='etiket'>$dizi[$etiketler_i]</span> ";
						}
					}
					$onecikan="";
					$style="";
					if($yazi["yazi_onecikan"]=="0"){
						$onecikan="<i style='color:black;' class='fa fa-plus'></i>";
						$style="primary";
					}else{
						$onecikan="<i style='color:black;' class='fa fa-minus'></i>";
						$style="warning";
					}
					echo "<tr id='".$yazi['yazi_id']."'>
							<th class='sortable'>$i</th>
							<td>".$yazi['yazi_baslik']."</td>
							<td>".date("d.m.Y",strtotime($yazi['yazi_created_at']))."</td>
							<td>".$yazi['kategori_baslik']."</td>
							<td>$etiketler</td>
							<td>
								<button class='btn btn-xs btn-success'><a class='w3-btn w3-teal' href='".site_url('/admin/yazilar_duzenle/'.$yazi['yazi_id'])."'><i style='color:black;' class='fa fa-edit'></i></a></button>
								<button class='btn btn-xs btn-danger'><a onclick=\"return confirm('Silmek İstediğinize Emin Misiniz?')\" href='".site_url('/admin/yazilar_sil/'.$yazi['yazi_id'])."'><i style='color:black;' class='fa fa-trash'></i></a></button>
								<button class='btn btn-xs btn-$style'><a href='".site_url('/admin/yazilar_onecikar/'.$yazi['yazi_id'])."'>$onecikan</a></button>
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
<?php $this->view('iskelet/footer'); ?>