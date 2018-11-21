
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
        <style> 
            .bootstrap-tagsinput input {
                padding:8px;
                display:block;
                border:none;
                border-bottom:1px solid #ccc;
                width:100%
            }
            .bootstrap-tagsinput .tag [data-role="remove"] {
                margin-left: 8px;
                color: red;
                cursor: pointer;
            }
            .bootstrap-tagsinput .tag [data-role="remove"]:after {
                content: "x";
                padding: 0px 2px;
            }
            .bootstrap-tagsinput .tag [data-role="remove"]:hover {
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            }
            .bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
                box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            }
        </style>
        <script src='https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js'></script>