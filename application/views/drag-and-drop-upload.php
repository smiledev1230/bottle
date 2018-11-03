<?php $this->load->view('includes/header_start');?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/upload_plugin/css/jquery.fileupload.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url();?>assets/upload_plugin/js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo base_url();?>assets/upload_plugin/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo base_url();?>assets/upload_plugin/js/canvas-to-blob.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url();?>assets/upload_plugin/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url();?>assets/upload_plugin/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url();?>assets/upload_plugin/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url();?>assets/upload_plugin/js/jquery.fileupload-image.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url();?>assets/upload_plugin/js/jquery.fileupload-validate.js"></script>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div id="file-upload-section">
                        <div class="">
                            <div class="draggable fileinput-button">
                                Click here or Drag your files to upload
                                <input id="fileupload" type="file" name="files[]" multiple>
                            </div>
                            
                            <!-- The global progress bar -->
                            <!-- <div id="progress" class="progress">
                                <div class="progress-bar progress-bar-success"></div>
                            </div> -->
                            <!-- The container for the uploaded files -->
                            <div id="files" class="files"></div>
                            <br>
                            <!-- Show success/fail message -->
                            <div class="success-message" id="message" style="display:none;">
                                
                            </div>
                            <a href="<?php echo base_url();?>upload/thumbnails" id="add-thumbnails" class="btn" style="margin-bottom:15px;display:none;" onclick="window.onbeforeunload =null;">Add Thumbnails for these files</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
/*jslint unparam: true, regexp: true */
$(document).ready(function(){
    var url = base_url+'upload/process_upload/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });


        $('#fileupload').fileupload({
            url: url,
            maxChunkSize: 10000000,
            dataType: 'json',
            autoUpload: true
        }).on('fileuploadadd', function (e, data) {
            data.context = $('<div/>').appendTo('#files');
            $.each(data.files, function (index, file) {
                var node = $('<p/>')
                        .append($('<span/>').text(file.name));
                $("#message").show().text("Uploading...");
                /* if (!index) {
                    node
                        .append('<br>')
                        .append(uploadButton.clone(true).data(data));
                } */
                node.appendTo(data.context);
            });
        }).on('fileuploadprocessalways', function (e, data) {
            var index = data.index,
                file = data.files[index],
                node = $(data.context.children()[index]);
            if (file.preview) {
                node
                    .prepend('<br>')
                    .prepend(file.preview);
            }
            if (file.error) {
                node
                    .append('<br>')
                    .append($('<span class="text-danger"/>').text(file.error));
            }
            if (index + 1 === data.files.length) {
                data.context.find('button')
                    .text('Upload')
                    .prop('disabled', !!data.files.error);
            }
        }).on('fileuploadprogressall', function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }).on('fileuploaddone', function (e, data) {
        	console.log(e);
        	console.log(data);
            $("#message").text("Success. The files have been uploaded.");
            $("#add-thumbnails").show();
            $("#back-button").hide();
            $("#files").text("");
            window.onbeforeunload = function (e) {
			    return true;
			}
           
        }).on('fileuploadfail', function (e, data) {
            console.log(e);
            console.log(data);
            $("#message").text("There was a problem uploading the file. Please try again later.");
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

function clear(){
	console.log("Testing");
	window.onbeforeunload =null;
	return true;
}
    
</script>
<?php $this->load->view('includes/footer_start');?>