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
                            
                            "ajax": "<?php echo site_url($urlBase.'/get_table')?>"
                         } );
    
    
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
            var $modal = $('#ajax-modal');

            var $modal = $('#ajax-modal');
            $('#datatable_ajax tbody').on('click','.orderdetail', function(){
                      // create the backdrop and wait for next modal to be triggered
                $('body').modalmanager('loading');
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

