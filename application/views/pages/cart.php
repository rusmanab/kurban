<script type="text/javascript"
            src="https://app.midtrans.com/snap/snap.js"
            data-client-key="Mid-client-9hY6A1D3piaFWjRj"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<main class="checkouts">
	
	<section class="checkout-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="mb-3">Checkout</h1>
				</div>
				<div class="col-md-12">
                    <?php
                    $grand_total = 0; 
                    $i = 1;
                    ?>
                    <?php if(empty($carts)){
                        echo '<p>Belum ada Produk di keranjang, Silahkan pilih order Kurban yang tersedia</p>';
                    } else{?>
                    <?php echo form_open('cart/update_cart');?>
                    <table class="table">

                        <tr>
							<th style="text-align:center">QTY</th>
							<th>Nama Produk</th>
							<!-- <th style="text-align:center">Kategori</th> -->
							<th style="text-align:right">Harga</th>
						</tr>
                        <?php 
                        $i = 1;
                        
                        foreach($carts as $c){ 
                        ?>
                        <?php echo form_hidden('id[]', $c->id); ?>
                        <tr class="orderplacecontent">
                            <td id="qty"><?php echo form_input(array('name' => 'qty[]', 'value' => $c->qty, 'class' => 'form-control uksiz', 'maxlength' => '3', 'size' => '5')); ?></td>
							<td id="nama_produk">
                                <?php echo $c->product_name; ?>
                            </td>
                            <!-- <td style="text-align:center" id="kategori">#KURBANdiRendang</td> -->
                            <td style="text-align:right" id="harga">
                                <?php
                                $price =  number_format($c->price);
                                if (  $c->diskon_price > 1 ){
                                    $price = "<strike>".number_format($c->price)."</strike> Rp. " . number_format($c->price - $c->diskon_price);
                                }
                                ?>
                                Rp. <?php echo $price; ?>
                            </td>
                            
                                <?php
                                $subTotal = ($c->price - $c->diskon_price) * $c->qty;
                                $grand_total = $grand_total + $subTotal; 
                                ?>
                        </tr>
                        <?php } ?>
                        <tr>
							<td> </td>
							<td class="right"><strong>Total</strong></td>
							<td style="text-align:right"><strong>Rp. <?php echo number_format($grand_total); ?></strong></td>
						</tr>
                    </table>
                    <?php } ?>

 					<button class="btn btn-primary" style="float: right;" id="pay-button">Update Cart</button>
                    <?php echo form_close();?>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<img src="<?= base_url('assets/images/banner/');?>banner-promo.jpg" class="w-100">
		</div>
	</section>

</main>

<script type="text/javascript">

	$('#pay-button').click(function (event) {
		event.preventDefault();
		$(this).attr("disabled", "disabled");

		var qty = $(#id).val();
		var nama_produk = $(#nama_produk).val();
		var kategori = $(#kategori).val();
		var harga = $(#harga).val();

		$.ajax({
			type: POST,
			url: '<?=site_url()?>/snap/token',
			data: {
				qty = qty,
				nama_produk = nama_produk,
				kategori = kategori,
				harga = harga
			},
			cache: false,

			success: function(data) {
	        //location = data;

	        console.log('token = '+data);
	        
	        var resultType = document.getElementById('result-type');
	        var resultData = document.getElementById('result-data');

	        function changeResult(type,data){
	        	$("#result-type").val(type);
	        	$("#result-data").val(JSON.stringify(data));
	          //resultType.innerHTML = type;
	          //resultData.innerHTML = JSON.stringify(data);
		      }

		      snap.pay(data, {

		      	onSuccess: function(result){
		      		changeResult('success', result);
		      		console.log(result.status_message);
		      		console.log(result);
		      		$("#payment-form").submit();
		      	},
		      	onPending: function(result){
		      		changeResult('pending', result);
		      		console.log(result.status_message);
		      		$("#payment-form").submit();
		      	},
		      	onError: function(result){
		      		changeResult('error', result);
		      		console.log(result.status_message);
		      		$("#payment-form").submit();
		      	}
		      });
		  	}
		});
	});

</script>
    