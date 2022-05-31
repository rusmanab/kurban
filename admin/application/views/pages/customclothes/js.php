<script type="text/javascript">
tinymce.init({
  selector      : 'textarea.mytiny',
  height        : 300,
  menubar       : true,
  theme         : 'modern',
  plugins       : [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar       : 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css   : ''
});

$(document).ready(function(e){
    
         
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
            var table = $('#listDiscount').children('tbody');
            var rowid = $('table#listDiscount > tbody > tr:last').index() + 1;
            
            //var table = tbody.length ? tbody : $('#listDiscount');
            var row = '<tr id="rowid'+ rowid +'">';
                row+= '<td><input type="hidden" name="did[]" value="0" /><input type="text" name="discount_persen[]" class="form-control persenvalue" data-value="pricediscount'+ rowid +'" /></td> <td><input type="text" name="discount_price[]" id="pricediscount'+ rowid +'" class="form-control" /></td>';
                row+= '<td><div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" ><input type="text" class="form-control" name="star_date[]" maxlength="10" ><span class="input-group-btn"> <button class="btn default" type="button"><i class="fa fa-calendar"></i></button></span></div></td>';
                row+= '<td><div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" ><input type="text" class="form-control" name="end_date[]" maxlength="10" ><span class="input-group-btn"><button class="btn default" type="button"> <i class="fa fa-calendar"></i></button></span></div></td>';
                row+= '<td><a class="btn btn-red removediscount" data-url="" data-rowid="'+ rowid +'" data-id="0"><i class="fa fa-remove"></i></a></td></tr>';            
            table.append(row);
            $('.date-picker').datepicker({             
                orientation: "left",
                autoclose: true
             });
        });
        
        $("#listDiscount").on("keyup",".persenvalue",function(e){
            var pricevalu = $(this).attr("data-value");
            var dis       = $(this).val();
            var proprice  = $("#proprice").val();
            if ($.isNumeric(dis)){
                var disvalue  = $("#proprice").val() * dis / 100;
                $("#" + pricevalu).val(disvalue);
            }else{
                $(this).val('');
                $("#" + pricevalu).val('');
                alert("Please input number only");
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
        })
})

       

</script>