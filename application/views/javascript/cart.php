<script type="text/javascript">
$(document).ready(function(e){
    
    $(".btn-plus").on("click", function(e){
        var rowId = $(this).attr("data-id");
        var qty = parseInt($("#qty" + rowId).val());
        
        qty+= 1;
        $("#qty" + rowId).val(qty);
        $("#totalPrice").html("")
        $.ajax({
            url: "<?php echo site_url('cart/updateQty')?>",
            type: "post",
            dataType: "json",
            data: "rowId=" + rowId + "&qty=" + qty,
            success: function(response){
              
                $("#totalPrice").html(response.new_total);
            }                
        })
        
    });
    $(".btn-minus").on("click", function(e){
        var rowId = $(this).attr("data-id");
        var qty = parseInt($("#qty" + rowId).val());
        if ( qty > 1){
            qty-= 1;
            $("#qty" + rowId).val(qty);
        }else{
            alert("Minimal jumlah adalah 1");
        }
        
        
        $.ajax({
            url: "<?php echo site_url('cart/updateQty')?>",
            type: "post",
            dataType: "json",
            data: "rowId=" + rowId + "&qty=" + qty,
            success: function(response){
                $("#totalPrice").html(response.new_total);
            }                
        })
        
    });
})
</script>