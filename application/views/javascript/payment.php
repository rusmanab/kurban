<script type="text/javascript">
$(document).ready(function(e){
    
    $(".inputChoose").on("click", function(e){
        var meId = $(this).attr("mid");
        console.log(meId);
        $("#methode_bayar_id").val(meId);
    });
   
})
</script>