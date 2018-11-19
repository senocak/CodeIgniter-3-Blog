
        <!-- Change base url from ckeditor/config.php (baseUrl) -->
        <script language="javascript" type="text/javascript">
            CKEDITOR.replace('editor1',{
                filebrowserWindowWidth: '900',
                filebrowserWindowHeight: '400',
                filebrowserBrowseUrl: '<?php echo base_url(); ?>assets/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: '<?php echo base_url(); ?>assets/ckfinder/ckfinder.html?Type=Images',
                filebrowserFlashBrowseUrl: '<?php echo base_url(); ?>assets/ckfinder/ckfinder.html?Type=Flash',
                filebrowserUploadUrl: '<?php echo base_url(); ?>assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: '<?php echo base_url(); ?>assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl: '<?php echo base_url(); ?>assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            }); 
        </script>
        <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>