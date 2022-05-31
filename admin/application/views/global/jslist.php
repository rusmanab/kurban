<script type="text/javascript">
    $(document).ready(function(e) {
        <?php
        $msg_type   = $this->session->flashdata('msg_type');
        $msg_content= $this->session->flashdata('msg_content');
        
        if ($msg_type && $msg_content){
        ?>
        showMessage("<?php echo $msg_content ?>","<?php echo $msg_type ?>" );
        <?php    
        }
        ?>
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
            
        
        $("body").on('click','.btn-delete',function(){
             var dataId = $(this).attr("data-id");
             var control = $(this).attr("data-control");
            bootbox.confirm("Are you sure?", function(result) {
                       
                       if ( result ){
                           
                            var val = [];
                            var temp = [];
                    		$('.checkboxes:checked').each(function(i){
                    		  val[i] = $(this).val();
                              temp[i] = $(this).attr('data-temp');
                              
                    		});
                    		if (val.length < 1 )  {
                    			alert("Pilih minimal 1 data yang akan di hapus");
                    		}else{
                    			
                    			
                    			$.ajax({
                                    dataType : "json",
                    				type:"post",
                    				data:"temp="+ temp +"&id=" + val + '&<?php echo $this->security->get_csrf_token_name(); ?>=' + '<?php echo $this->security->get_csrf_hash(); ?>' ,
                    				url:"<?php echo site_url($urlBase).'/delete' ?>",
                    				success:function(data){
                    					//alert("Data berhasil di hapus");
                                        
                    				    dTable.ajax.reload();      
                                        
                                        showMessage(data.pesan,data.type );
                                        
                    				},
                    				error:function(data){
                    					alert("Errorr..!!");	
                    				}
                    			});
                    		 }
                    		
                       }else{
                          alert("Confirm result: "+result);
                       }
            }); 
            return false;
        });
    
        $('.btn-edit').click(function(e){
      		var val = [];
            
            $('.checkboxes:checked').each(function(i){
    		      val[i] = $(this).val();             
      		});
            
      		if (val.length > 1 || val.length < 1)  {
     			alert("PIlih satu data");
     			e.preventDefault()
      		}else{
                        
     			window.location='<?php echo site_url($urlBase.'/edit')?>/'+ val[0];
     			return true;
      		}
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
        
        
        
    });
</script>