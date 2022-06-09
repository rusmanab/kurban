<script type="text/javascript">
$(document).ready(function(e){
    $("#btnKupon").on("click", function(){
        let subtotal = document.getElementsByName('subtotal[]');
        let granTotal= 0;
        for (let i = 0; i < subtotal.length; i++) {
            
            granTotal+= parseFloat(subtotal[i].value);
        }
        console.log( granTotal );
		let voucher = $("#kupon").val();
		$.ajax({
			type: "post",
            dataType: "json",
			url: '<?=site_url('cart/checkvoucher')?>',
			data: {
				voucher: voucher,
			},
			cache: false,
			success: function(respon) {
				console.log(respon);
             
                if ( respon.error ){
                    $("#ketDiskon").text("");
                    $("#lbl-diskon").text("0");

                }else{                   

                    let numb = respon.dataVoucher.value;
                    let format = numb.toString().split('').reverse().join('');
                    let convert = format.match(/\d{1,3}/g);
                    let diskon =  convert.join(',').split('').reverse().join('');
                    $("#ketDiskon").text("("+ respon.dataVoucher.coupon_name +")");
                    $("#lbl-diskon").text(diskon); // grand-Total
                    granTotal = granTotal - parseFloat(respon.dataVoucher.value);
                }

                format = granTotal.toString().split('').reverse().join('');
                convert = format.match(/\d{1,3}/g);
                granTotal =  convert.join(',').split('').reverse().join('')
                $("#grand-Total").text(granTotal);
		  	}
		});

	});
    $("#checkout").on("click", function(){
        $("#formCart").attr('action','<?= site_url('cart/order_confirm') ?>');
        $("#formCart").submit();
	});
    
	 
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