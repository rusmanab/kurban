<script type="text/javascript">
        $(document).ready(function(e){
            $("#btn-save").on("click",function(e){
                var frmdata = $("#myform").serialize();
                var frmurl  = $("#myform").attr("action");
                $.ajax({
                    type     : "post",
                    dataType : "json",
                    url      : frmurl,
                    data     : frmdata,
                    success:function(data){
                        showMessage(data.msg_content,data.msg_type);
                    }
                })
                
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
                     var title = 'Pemberitahuan';
                     
                                
                     toastr[shortCutFunction](message, title);
                }
        })
        </script>