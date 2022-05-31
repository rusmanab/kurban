<link href="<?php echo base_url('assets/themes/admin_metronic')?>/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/themes/admin_metronic')?>/assets/plugins/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/themes/admin_metronic')?>/assets/css/pages/profile.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url('assets/themes/admin_metronic/assets/plugins/jquery-validation/dist')?>/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/themes/admin_metronic/assets/plugins/jquery-validation/dist')?>/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/themes/admin_metronic')?>/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript">
$(document).ready(function(e){
    var siturl='<?php echo site_url('profile')?>',passvalid=false;	
	

	$(".frm-profile").validate({
	    errorElement: 'span', 
        errorClass: 'help-inline', 
        focusInvalid: false,   
		rules : {
		      fname :{
                    minlength: 4,
                    required: true
                },
			  lname: {
                    minlength: 4,
                    required: true
                },
              ph: {                    
                    required: true
                },
              email: {
                    email: true,
                    required: true
                },
              website: {
                    url: true,
                    required: true
              }
		},
        highlight: function (element) { // hightlight error inputs
            $(element)
            .closest('.control-group').addClass('error'); // set error class to the control group
        },
        success: function (label) {
            label.closest('.control-group').removeClass('error');
            label.closest('.control-group').addClass('success');
            label.remove();
                                            /*label.addClass('ok');*/
        }
	});
	
	
	
    $(".frm-chpass").validate({
            errorElement: 'span', 
            errorClass: 'help-inline', 
            focusInvalid: false,   
            onkeyup: false ,
             rules:
             {
                 opass :{
                        minlength: 5,
                        required: true,
                        "remote":
                        {
                          url: siturl + "/cekpass",
                          type: "post",
                          data:
                          {
                              opass: function()
                              {
                                  return $('.frm-chpass :input[name="opass"]').val();
                              },
                              <?php echo $this->security->get_csrf_token_name(); ?> : function(){
                                 return '<?php echo $this->security->get_csrf_hash(); ?>';
                              }
                          }
                        }
                    },
			     npass: {
                        minlength: 6,
                        required: true
                    },
			     cpass: {
			         equalTo: "#npass"	
			         }
             },
             highlight: function (element) { // hightlight error inputs
                $(element)
                .closest('.control-group').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.control-group').removeClass('error');
                label.closest('.control-group').addClass('success');
                label.remove();
                                               
            },
             messages:
             {
                 opass:
                 {
                   
                    remote: jQuery.validator.format("Wrong password.")
                 }                
             },
             submitHandler: function(form)
             {
                form.submit();
             }
         });
    
    
})
</script>