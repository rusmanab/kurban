<script type="text/javascript">
$(document).ready(function(e){
    $("#btnRemoveImage").click(function(e){
        var id = $(this).attr("data-id");
        $.ajax({
            type : 'post',
            url : '<?php echo site_url('categoryproduct/deleteImage')?>',
            dataType : 'json',
            data : 'id=' + id,
            success:function(data){
                
            }
       }) 
    });
    
})
</script>