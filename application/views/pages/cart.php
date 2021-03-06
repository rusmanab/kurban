<script type="text/javascript"
            src="https://app.midtrans.com/snap/snap.js"
            data-client-key="Mid-client-9hY6A1D3piaFWjRj"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<style>
    .bold{
        font-weight: bold;
    }
</style>
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
                    <?php 
					$attr = ['id'=>'formCart'];
					echo form_open('cart/update_cart', $attr);?>
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
                                #<?php echo $c->product_name; ?>
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
                                <input type="hidden" name="subtotal[]" class="subtotal" value="<?php echo $c->price; ?>" />
                            </td>
                            
                                <?php
                                $subTotal = ($c->price - $c->diskon_price) * $c->qty;
                                $grand_total = $grand_total + $subTotal; 
                                ?>
                        </tr>
                        <?php } ?>
						<tr>
							<td colspan="2">
								Masukan Voucher
								<input type="text" name="kupon" id="kupon" class="form-control vouchercoupon" />
								<button id="btnKupon" class="btn btn-default" type="button"><i class="fa fa-refresh"></i></button>
                                <label id="ketDiskon"></label>
                            </td> 
                            
							<td style="text-align:right"><div class="bold">- Rp. <label id="lbl-diskon">0</label></div></td>
						</tr>
                        <tr>
							<td colspan="2"><strong>Total</strong></td>
							<td style="text-align:right"><div class="bold">Rp. <label id="grand-Total"><?php echo number_format($grand_total); ?></label></div></td>
						</tr>
                    </table>
                    <?php } ?>

 					<button class="btn btn-danger" style="float: right;">Delete</button>
 					<button class="btn btn-success" id="checkout" type="button" style="float: right;">Checkout</button>
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
