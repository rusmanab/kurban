<script type="text/javascript">
$(document).ready(function(e){
    
    
        
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
        
        $("#adddValue").on("click",function(e){
            var table = $('#listValue').children('tbody');
            var rowid = $('table#listValue > tbody > tr:last').index() + 1;
            
            //var table = tbody.length ? tbody : $('#listDiscount');
            var row = '<tr id="rowid'+ rowid +'">';
                row+= '<td><input type="hidden" name="option_value_id[]" value="0" /><input type="text" name="option_value_description[]" class="form-control persenvalue" data-value="option_value_description'+ rowid +'" /></td> <td><input type="text" name="sort_order[]" id="sort_order'+ rowid +'" class="form-control" /></td>';
                row+= '<td><a class="btn btn-red removeoptval" data-url="" data-rowid="'+ rowid +'" data-id="0"><i class="fa fa-remove"></i></a></td></tr>';            
            table.append(row);
           
        });
        
       
        $("#listValue").on("click",".removeoptval",function(e){
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