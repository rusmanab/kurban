<script type="text/javascript">
$(document).ready(function(e){
    <?php
        $msg_type   = $this->session->flashdata('msg_type');
        $msg_content= $this->session->flashdata('msg_content');
        
        if ($msg_type && $msg_content){
        ?>
        showMessage("<?php echo $msg_content ?>","<?php echo $msg_type ?>" );
        <?php    
        }
        ?>
    
     
     $(".assignment").on("click",".btn-submit",function(e){
        
        var mytag = $(this).attr('data-type');
        var myform = $(this).attr('data-form');
        console.log(myform);
        
        $.ajax({
            data : "mode="+ mytag + "&" + $("#" + myform ).serialize(),
            type : "post",
            url :  $("#" + myform ).attr("action"),
            dataType : "json",
            success:function(data){
                showMessage(data.err_msg,data.error );
            }
        });
        
     });
     $("#saveVerify").on("click", function(e){
            console.log("test");
            $.ajax({
                data : "mode="+ mytag + "&" + $("#" + myform ).serialize(),
                type : "post",
                url :  $("#" + myform ).attr("action"),
                dataType : "json",
                success:function(data){
                    showMessage(data.err_msg,data.error );
                }
            });
     })
     
     
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
             var title = 'Pemberitahuan';
             
                        
             toastr[shortCutFunction](message, title);
    }
    
    $("#invoice").trigger("click");
})
</script>