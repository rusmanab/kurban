<script type="text/javascript">
    $(document).ready(function(data){
        $("#listImage").on("click",".removeimage",function(e){
            var trid    = $(this).attr('data-trid');
            var imgid   = $(this).attr('data-id');
            var iurl    = $(this).attr('data-url');
            if (imgid > 0){
                $.ajax({
                    type : "post",
                    data:"id=" + imgid,
                    url : iurl + "/deleteimage",
                    success:function(data){
                        $("#" + trid).remove();
                        showMessage("Remove image success.","success");
                    }
                })
            }else{
                
                var imgt = $("#img_" + trid).val();
                var imgb = $("#imgthumbs_" + trid ).val()
                $.ajax({
                    type : "post",
                    data:"imgt=" + imgt + "&imgb=" + imgb,
                    url : iurl + "/deleteimagefile",
                    success:function(data){
                        $("#" + trid).remove();
                        showMessage("Remove image success.","success");
                    }
                })
                
            }
            return false;
        });
        
        function showMessage(message,shortCutFunction)
        {
            //var shortCutFunction = msgType;
            toastr.options = {
                            closeButton: "checked",//$('#closeButton').prop('checked'),
                            debug: "",
                            positionClass: 'toast-top-right',
                            onclick: null,
        					showDuration: 1000,
        					hideDuration: 1000,
        					timeOut: 5000,
        					extendedTimeOut: 1000,
        					showEasing: "swing",
        					hideEasing: "linear",
        					showMethod: "fadeIn",
        					hideMethod: "fadeOut",
        					
                        };
             var title = 'Alert';
             
                        
             toastr[shortCutFunction](message, title);
        }
        
    });
    var uploader = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',
             
            browse_button : document.getElementById('tab_images_uploader_pickfiles'), // you can pass in id...
            container: document.getElementById('tab_images_uploader_container'), // ... or DOM Element itself
             
            url : $("#tab_images_uploader_pickfiles").attr('data-upload'), //"assets/plugins/plupload/examples/upload.php",
             
            filters : {
                max_file_size : '10mb',
                mime_types: [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip"}
                ]
            },
         
            // Flash settings
            //flash_swf_url : 'assets/plugins/plupload/js/Moxie.swf',
     
            // Silverlight settings
            //silverlight_xap_url : 'assets/plugins/plupload/js/Moxie.xap',             
         
            init: {
                PostInit: function() {
                    $('#tab_images_uploader_filelist').html("");
         
                    $('#tab_images_uploader_uploadfiles').click(function() {
                        uploader.start();
                        return false;
                    });

                    $('#tab_images_uploader_filelist').on('click', '.added-files .remove', function(){
                        uploader.removeFile($(this).parent('.added-files').attr("id"));    
                        $(this).parent('.added-files').remove();                     
                    });
                },
         
                FilesAdded: function(up, files) {
                    plupload.each(files, function(file) {
                        $('#tab_images_uploader_filelist').append('<div class="alert alert-warning added-files" id="uploaded_file_' + file.id + '">' + file.name + '(' + plupload.formatSize(file.size) + ') <span class="status label label-info"></span>&nbsp;<a href="javascript:;" style="margin-top:-5px" class="remove pull-right btn btn-sm red"><i class="fa fa-times"></i> remove</a></div>');
                    });
                },
         
                UploadProgress: function(up, file) {
                    $('#uploaded_file_' + file.id + ' > .status').html(file.percent + '%');
                },

                FileUploaded: function(up, file, response) {
                    var response = $.parseJSON(response.response);

                    if (response.result && response.result == 'OK') {
                        var id = response.id; // uploaded file's unique name. Here you can collect uploaded file names and submit an jax request to your server side script to process the uploaded files and update the images tabke

                        $('#uploaded_file_' + file.id + ' > .status').removeClass("label-info").addClass("label-success").html('<i class="fa fa-check"></i> Done'); // set successfull upload
                        
                        var tbody = $('#listImage').children('tbody');
                        var table = tbody.length ? tbody : $('#listImage');
                        
                        table.append(response.addtag);
                        
                    } else {
                        $('#uploaded_file_' + file.id + ' > .status').removeClass("label-info").addClass("label-danger").html('<i class="fa fa-warning"></i> Failed'); // set failed upload
                        App.alert({type: 'danger', message: 'One of uploads failed. Please retry.', closeInSeconds: 10, icon: 'warning'});
                    }
                },
         
                Error: function(up, err) {
                    App.alert({type: 'danger', message: err.message, closeInSeconds: 10, icon: 'warning'});
                }
            }
        });

        uploader.init();
</script>