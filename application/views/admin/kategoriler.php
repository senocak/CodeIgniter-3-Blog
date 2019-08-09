<?php $this->view('iskelet/header'); ?>	 
<?php $this->view('iskelet/admin_navbar'); ?> 
	<style type="text/css">.sortable { cursor: move; }</style>
	<script type="text/javascript">
		function showimagepreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {$('#imgview').attr('src', e.target.result);}
				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart('admin/kategoriler'); ?>
		<?php echo form_input(array("name"=>"kategori_baslik","class"=>"form-control","required"=>"","autofocus"=>"","placeholder"=>"Kategori İsmi")); ?>
		<?php echo form_input(array("type"=>"file","name"=>"userfile","class"=>"form-control","required"=>"","autofocus"=>"","onChange"=>"showimagepreview(this)")); ?>
		<img src="<?php echo base_url(); ?>assets/images/kategoriler/no-image.png" style="width:10%" id="imgview" >
		<?php echo form_submit(array("class"=>"btn btn-success btn-block","value"=>"Ekle")); ?>
	<?php echo form_close(); ?>
	<table class="table table-dark">
		<thead><tr><th scope="col">#</th><th scope="col">Resim</th><th scope="col">Başlık</th><th scope="col">İşlemler</th></tr></thead>
		<tbody id="sortable">
			<?php 
			$i=0;
				foreach($kategoriler as $kategori){
					$i++;
					echo "<tr id='".$kategori['kategori_id']."'>
							<th class='sortable'>$i</th>
							<td><img src='".site_url()."assets/images/kategoriler/".$kategori['kategori_resim']."' width='100px'></td>
							<td>".$kategori['kategori_baslik']."</td>
							<td>
								<button class='btn btn-xs btn-success'><a class='w3-btn w3-teal' href='".site_url('/admin/kategoriler_duzenle/'.$kategori['kategori_id'])."'><i style='color:black;' class='fa fa-edit'></i></a></button> 
								<button class='btn btn-xs btn-danger'><a onclick=\"return confirm('Silmek İstediğinize Emin Misiniz?')\" href='".site_url('/admin/kategoriler_sil/'.$kategori['kategori_id'])."'><i style='color:black;' class='fa fa-trash'></i></a></button>
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
						url: '<?php echo site_url('/admin/kategoriler_sirala'); ?>'
					});	
					
					location.reload();
				}
			});
			$( "#sortable" ).disableSelection();	                      		
		});	                      	
	</script>
<?php $this->view('iskelet/footer'); ?>