<script type="text/javascript">
$(document).ready(function(e){
     var dTable = $('#datatable_ajax').DataTable( {
                            "processing": true,
                            "serverSide": true,
                            "bStateSave": true, 
                            "pageLength": 10,
                            "columnDefs": [
                                {"className": "dt-center", "targets": "0"}
                              ],<?php if (isset($columnSort)){?>
                            "order": [[ <?php echo isset($columnSort) && !empty($columnSort) ? $columnSort : 0 ?>, "desc" ]],   
                            <?php } ?>
                            
                            "ajax": "<?php echo site_url($urlBase.'/getTableNew/0')?>"
                         } );
        var fTable = $('#datatable_ajax_finish').DataTable( {
                            "processing": true,
                            "serverSide": true,
                            "bStateSave": true, 
                            "pageLength": 10,
                            "columnDefs": [
                                {"className": "dt-center", "targets": "0"}
                              ],<?php if (isset($columnSort)){?>
                            "order": [[ <?php echo isset($columnSort) && !empty($columnSort) ? $columnSort : 0 ?>, "desc" ]],   
                            <?php } ?>
                            
                            "ajax": "<?php echo site_url($urlBase.'/getTableNew/2')?>"
                         } );
     
    
        var pTable = $('#datatable_ajax_pro').DataTable( {
                            "processing": true,
                            "serverSide": true,
                            "bStateSave": true, 
                            "pageLength": 10,
                            "columnDefs": [
                                {"className": "dt-center", "targets": "0"}
                              ],<?php if (isset($columnSort)){?>
                            "order": [[ <?php echo isset($columnSort) && !empty($columnSort) ? $columnSort : 0 ?>, "desc" ]],   
                            <?php } ?>
                            
                            "ajax": "<?php echo site_url($urlBase.'/getTablePro')?>"
                         } );
     $("#ajax-modal, #ajax-modal2").on("click",".btn-accept",function(e){
         var mydata = $(".myform").serialize();
         var myurl = $(".myform").attr('action');
         console.log("debug");
         
         $.ajax({
            data : mydata,
            type : "post",
            url :  myurl,
            dataType : "json",
            success:function(data){
                showMessage(data.err_msg,data.error );
                dTable.ajax.reload(); 
                pTable.ajax.reload();
                fTable.ajax.reload(); 
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
    
})
var UIExtendedModals = function () {

    
    return {
        //main function to initiate the module
        init: function () {
        
            // general settings
            $.fn.modal.defaults.spinner = $.fn.modalmanager.defaults.spinner = 
              '<div class="loading-spinner" style="width: 200px; margin-left: -100px;">' +
                '<div class="progress progress-striped active">' +
                  '<div class="progress-bar" style="width: 100%;"></div>' +
                '</div>' +
              '</div>';

            $.fn.modalmanager.defaults.resize = true;

            

            //ajax demo:
            //var $modal = $('#ajax-modal, #ajax-modal2');

            
            $('table tbody').on('click','.detail', function(){
                      // create the backdrop and wait for next modal to be triggered
                      console.log("Asdasd");
                $('body').modalmanager('loading');
                
                var $modal = $('#ajax-modal');
                var el = $(this);
        
                setTimeout(function(){
                          $modal.load(el.attr('data-url'), '', function(){
                              $modal.modal();
                            });
                        }, 1000);
            });

            $('table tbody').on('click','.detailpro', function(){
                      // create the backdrop and wait for next modal to be triggered
                      console.log("Asdasd");
                $('body').modalmanager('loading');
                
                var $modal = $('#ajax-modal2');
                var el = $(this);
        
                setTimeout(function(){
                          $modal.load(el.attr('data-url'), '', function(){
                              $modal.modal();
                            });
                        }, 1000);
            });
            
            $modal.on('click', '.update', function(){
              $modal.modal('loading');
              setTimeout(function(){
                $modal
                  .modal('loading')
                  .find('.modal-body')
                    .prepend('<div class="alert alert-info fade in">' +
                      'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '</div>');
              }, 1000);
            });
        }

    };

}();

jQuery(document).ready(function() {    
   UIExtendedModals.init();
});
</script>

