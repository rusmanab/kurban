<script type="text/javascript">
tinymce.init({
  selector      : 'textarea.mytiny',
  height        : 300,
  menubar       : true,
  plugins       : [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar       : 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css   : ''
});

$(document).ready(function(e){
    var selectLevel = <?php echo json_encode($levels) ?>;
         
    $("#category").on("click",function(e){
        var category_id = $(this).val();
        console.log(category_id);
        
       $.ajax({
            type : 'post',
            url : '<?php echo site_url('product/getsubcategory')?>',
            dataType : 'json',
            data : 'category_id=' + category_id,
            success:function(data){
                if (data.opt.length > 0 ){
                    $("#subcategory").html(data.opt);
                }
            }
       }) 
    });
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
                
                var imgb = $("#img_" + trid).val();
                var imgt = $("#imgthumbs_" + trid ).val()
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
         
        $("#listMedia").on("click",".removeMedia",function(e){
            var trid    = $(this).attr('data-trid');
            var imgid   = $(this).attr('data-id');
            var iurl    = $(this).attr('data-url');
            if (imgid > 0){
                $.ajax({
                    type : "post",
                    data:"id=" + imgid,
                    url : iurl + "/deletemedia",
                    success:function(data){
                        $("#" + trid).remove();
                        showMessage("Remove media success.","success");
                    }
                })
            }else{
                
                var imgb = $("#img_" + trid).val();
                $.ajax({
                    type : "post",
                    data:"imgb=" + imgb ,
                    url : iurl + "/deletemediafile",
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
        
        $("#adddiscount").on("click",function(e){
            var dSel = '<select name="level_id[]" id="level_id" class="form-control">';
            for (i in selectLevel) {
              
                dSel+= '<option value="'+ selectLevel[i].id +'">'+ selectLevel[i].level_name +'</option>';
            }
            dSel+= '</select>';
             
          
            var table = $('#listDiscount').children('tbody');
            var rowid = $('table#listDiscount > tbody > tr:last').index() + 1;
            
            var lId   = parseInt($("#tfoot").attr("data-value"));
            var rowid = lId + 1;
            
            //var table = tbody.length ? tbody : $('#listDiscount');
            var row = '<tr id="rowid'+ rowid +'">';
                row+= '<td><input type="hidden" name="did[]" value="0" /><input type="number" name="discount_persen[]" value="0" class="form-control persenvalue" data-value="pricediscount'+ rowid +'" data-diskon2="diskon2'+ rowid +'" id="diskon1'+ rowid +'" /></td>';
                row+= '<td><input type="number" name="discount_persen2[]" value="0" class="form-control persenvalue2" data-value="pricediscount'+ rowid +'" data-diskon1="diskon1'+ rowid +'" id="diskon2'+ rowid +'" /></td>';
                row+= '<td><input type="text" name="discount_price[]" id="pricediscount'+ rowid +'" class="form-control" /></td>';
                //row+= '<td><div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" ><input type="text" class="form-control" name="star_date[]" maxlength="10" ><span class="input-group-btn"> <button class="btn default" type="button"><i class="fa fa-calendar"></i></button></span></div></td>';
                row+= '<td>'+ dSel + '</td>';
                row+= '<td><a class="btn btn-red removediscount" data-url="" data-rowid="'+ rowid +'" data-id="0"><i class="fa fa-remove"></i></a></td></tr>';            
            table.append(row);
            $("#tfoot").attr("data-value",rowid);
            $('.date-picker').datepicker({             
                orientation: "left",
                autoclose: true
             });
        });
        
        
        $("#addOption").on("click","#addOptionValue",function(e){            
            var table = $('#listOptionProduct').children('tbody');
            var rowid = $('table#listOptionProduct > tbody > tr:last').index() + 1;
            var dataurl  = $(this).attr('data-url');
            var optionid = $("#listoption_id").val();
            //alert(optionid);
            
            $.ajax({
                type:"post",
                data:"rowid=" + rowid + "&optionid=" + optionid,
                url : dataurl,
                dataType : "json",
                success:function(data){
                    //if (data.error < 1){                        
                    //}
                    table.append(data.tablerow);
                }   
            });
            
        });
        
        $("#addOption").on("click",".minOptionValue",function(e){
            var delurl    = $(this).attr("data-url");
            var rowrowid  = $(this).attr("data-rowid");
            var dataid    = $(this).attr("data-id");
            alert(rowrowid);
            if (dataid > 0){
                $.ajax({
                    type:"post",
                    data:"id="+dataid,
                    url : delurl,
                    dataType : "json",
                    success:function(data){
                        if (!data.error){
                            $("#" + rowrowid).remove();
                            
                        }
                    }
                })
            }else{
                $("#" + rowrowid).remove();
            }
        })
        
        
        $("#listDiscount").on("keyup",".persenvalue",function(e){
            var pricevalu = $(this).attr("data-value");
            var diskon2   = $(this).attr("data-diskon2");
            var dis2      = $("#" + diskon2).val();
            var dis       = $(this).val();
            
            var proprice  = $("#proprice").val();
            if ($.isNumeric(dis) && $.isNumeric(dis2)){
                var disvalue  = $("#proprice").val() * dis / 100;
                
                var disvalue2 = (proprice - disvalue) * dis2 / 100;
                
                var allDisc   = disvalue + disvalue2;
                
                $("#" + pricevalu).val(allDisc);
            }else{
                $(this).val('');
                $("#" + pricevalu).val('');
                alert("Please input number only");
            }
            
        });
        $("#listDiscount").on("keyup",".persenvalue2",function(e){
            var pricevalu = $(this).attr("data-value");
            var diskon1   = $(this).attr("data-diskon1");
            var dis       = $("#" + diskon1).val();
            var dis2       = $(this).val();            
            var proprice  = $("#proprice").val();
            
            if ($.isNumeric(dis2) && $.isNumeric(dis)){
                var disvalue  = proprice * dis / 100;
                console.log("disvalue " + disvalue);
                var disvalue2 = (proprice - disvalue) * dis2 / 100;
                console.log("disvalue2 " + disvalue2);
                var allDisc   = disvalue + disvalue2;
                
                $("#" + pricevalu).val(allDisc);
            }else{
                $(this).val('');
                $("#" + pricevalu).val('');
                alert("Please input number only");
            }
            
        });
        
        $(".listcategory").select2({
            width: "off",
            ajax: {
                url: "<?php echo site_url('product/getCategory') ?>",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, page) {
                    // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data
                    return {
                        results: data.items
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            //templateResult: formatRepo,
            //templateSelection: formatRepoSelection
        });
        
        
        $(".selectOption").select2({
            width: "off",
            maximumSelectionLength: 1,
            ajax: {
                url: "<?php echo site_url('options/loadOption') ?>",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, page) {
                    // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data
                    return {
                        results: data.items
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            //templateResult: formatRepo,
            //templateSelection: formatRepoSelection
        });
        $(".selectOption").on("select2:select",function(e){
             var val  = $(".selectOption option:selected").val();
             var uurl = $(".selectOption").attr('data-url');
             $("#addOption").load(uurl,{ option_id: val });
             
        });
        
        $(".selectOption").on("select2:unselecting",function(e){
             var val  = $(".selectOption option:selected").attr("data-option-product");
             var uurl = $(".selectOption").attr('data-delurl');
             if ( val > 0){
                 $.ajax({
                        type:"post",
                        data:"product_option_id="+val,
                        url : uurl,
                        dataType : "json",
                        success:function(data){
                            if (!data.error){
                                $("#addOption").html('');
                            }
                        }
                 });
             }
        });
        
      
        
        $('.date-picker').datepicker({             
                orientation: "left",
                autoclose: true
             });
        $("#listDiscount").on("click",".removediscount",function(e){
            var delurl    = $(this).attr("data-url");
            var rowrowid  = $(this).attr("data-rowid");
            var dataid    = $(this).attr("data-id");
           
            if (dataid > 0){
                $.ajax({
                    type:"post",
                    data:"id="+dataid,
                    url : delurl,
                    dataType : "json",
                    success:function(data){
                        if (data.error < 1){
                            $("#row" + rowrowid).remove();
                            
                        }
                    }
                })
            }else{
                $("#rowid" + rowrowid).remove();
            }
        });
        
        <?php
    
    
        if (isset($clothes->post_id)){
           
        ?>    
        
        var dTable = $('#datatable_reviews').DataTable( {
                            "processing": true,
                            "serverSide": true,
                            "bStateSave": true, 
                            "autoWidth": false,
                            "pageLength": 10,
                            "columns": [                                  
                                    { "width": "5%",className: "text-center" },
                                    { "width": "25%"},
                                    { "width": "40%"},
                                    { "width": "10%"},
                                    { "width": "20%"},
                                  ],
                            "columnDefs": [
                                {"className": "dt-center", "targets": "0"}
                              ],<?php if (isset($columnSort)){?>
                            "order": [[ <?php echo isset($columnSort) && !empty($columnSort) ? $columnSort : 0 ?>, "desc" ]],   
                            <?php } ?>
                            
                            "ajax": "<?php echo site_url('product/getComments/'.$clothes->post_id)?>"
                         } );
        <?php
        }
        ?>
        
})

var uploader = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',
             
            browse_button : document.getElementById('tab_images_uploader_pickfiles'), // you can pass in id...
            container: document.getElementById('tab_images_uploader_container'), // ... or DOM Element itself
             
            url : $("#tab_images_uploader_pickfiles").attr('data-upload'), //"assets/plugins/plupload/examples/upload.php",
             
            filters : {
                max_file_size : '5mb',
                mime_types: [
                    {title : "Image files", extensions : "jpg,gif,png,jpeg"},
                    /*{title : "Zip files", extensions : "zip"}*/
                ]
            },
         
              
         
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
        
        var uploader2 = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',
             
            browse_button : document.getElementById('tab_media_uploader_pickfiles'), // you can pass in id...
            container: document.getElementById('tab_media_uploader_container'), // ... or DOM Element itself
             
            url : $("#tab_media_uploader_pickfiles").attr('data-upload'), //"assets/plugins/plupload/examples/upload.php",
             
            filters : {
                max_file_size : '25mb',
                mime_types: [
                    {title : "Image files", extensions : "jpg,gif,png"},                    
                    {title : "Pdf files", extensions : "pdf" },
                    {title : "Word files", extensions : "docx" },
                    {title : "Excel files", extensions : "xlsx" }
                ]
            },
            multipart_params : {
                "type" : "media",
            },
              
         
            init: {
                PostInit: function() {
                    $('#tab_media_uploader_filelist').html("");
         
                    $('#tab_media_uploader_uploadfiles').click(function() {
                        
                        uploader2.start();
                        return false;
                    });

                    $('#tab_media_uploader_filelist').on('click', '.added-files .remove', function(){
                        uploader.removeFile($(this).parent('.added-files').attr("id"));    
                        $(this).parent('.added-files').remove();                     
                    });
                },
         
                FilesAdded: function(up, files) {
                    plupload.each(files, function(file) {
                        $('#tab_media_uploader_filelist').append('<div class="alert alert-warning added-files" id="uploaded_file_' + file.id + '">' + file.name + '(' + plupload.formatSize(file.size) + ') <span class="status label label-info"></span>&nbsp;<a href="javascript:;" style="margin-top:-5px" class="remove pull-right btn btn-sm red"><i class="fa fa-times"></i> remove</a></div>');
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
                        
                        var tbody = $('#listMedia').children('tbody');
                        var table = tbody.length ? tbody : $('#listMedia');
                        
                        table.append(response.addtag);
                        
                    } else {
                        $('#uploaded_file_' + file.id + ' > .status').removeClass("label-info").addClass("label-danger").html('<i class="fa fa-warning"></i> Failed'); // set failed upload
                        App.alert({type: 'danger', message: response.err_msg, closeInSeconds: 10, icon: 'warning'});
                    }
                },
         
                Error: function(up, err) {
                    App.alert({type: 'danger', message: err.message, closeInSeconds: 10, icon: 'warning'});
                }
            }
        });
        uploader2.init();
        $(window ).load(function(e){
            $(".inputNumber").TouchSpin({
                  verticalbuttons: true
                });
        })
</script>
