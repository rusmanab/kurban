<script type="text/javascript">
    $(document).ready(function(e) {
        $("#btn-frmcancel").click(function(e){
            window.location = "<?php echo site_url($urlBase)?>";
        });     
        
        $("#myform").validate();
    });
</script> 