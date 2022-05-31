    <section>
        <div class="container">
            <div class="arrow-tab">
                <ul class="arrow-tabs">
                    <li class="active"> 1. Address </li>
                    <li> 2. Payment </li>
                </ul>
                </div>
        </div>
    </section>
    <?php
    $totalHarga = 0;
    $tatalQty   = 0;
    
    ?>
    <section class="sec-checkout">
        <div class="container">
            <div class="row checkout-address">
                <div class="col-md-12"><h2>Shipping Address</h2></div>
                <div class="col-md-12">
                    <p>
                        <?php echo $addres->recipient?> 
                        <br /><?php echo $addres->address?> 
                        <br /><?php echo $addres->province . " ". $addres->city?> 
                        <br /><?php echo $addres->postal_code?> 
                    </p>                    
                </div>
            </div>
            
            <?php echo form_open('cart/order_confirm') ?>
                <div class="row">
                    <input type="hidden" value="<?php echo $addres->id ?>" name="address_id" />
                    <div class="col-md-6">
                        <div class="col-md-12">Pesanan <?php echo $this->cart->total_items();?> dari <?php echo $this->cart->total_items();?></div>
    
                        <?php  if(count($carts)==0): echo 'Your cart is empty';else:?>
                        <?php echo form_open('cart/update'); ?>
    
                            <table cellpadding="6" cellspacing="1" style="width:100%" border="0">
    
                            <tr class="">
                                    <th class="text-center">QTY</th>
                                    <th>Item Description</th>
                                    <th style="width: 25%;">Item Price</th>
                            </tr>
    
                            <?php $i = 1; ?>
    
                            <?php foreach ($carts as $items): ?>
    
                                
    
                                    <tr class="orderplacecontent">
                                            <td class="text-center">
                                                <?php echo $items->qty; ?> <br>
                                            </td>
                                            <td>
                                                <?php echo form_hidden('choose[]', $items->id); ?>
                                                <p class="price-checkout-1">
                                                    <?php echo $items->product_name; ?>
                                                    
                                                </p>
                                            </td>
                                            <td>
                                                <?php
                                                $price = $items->price;
                                                if ( $items->diskon_price > 0 ){
                                                    $price = $items->price - $items->diskon_price;
                                                }
                                                ?>
                                                <p class="price-checkout-1">Rp. <?php echo number_format($price);?></p>
                                                <?php
                                                if ( $items->diskon_price > 0 ){
                                                ?>
                                                <p class="price-checkout-2">Rp. <?php echo number_format($items->price);?></p>
                                                
                                                <?php } ?>
                                                <input type="hidden" name="weight" value="<?php echo $items->weight; ?>"></p>
                                            </td>
                                    </tr>
                                    
                                    <?php
                                    $subtotal = $items->qty * $price;
                                    $totalHarga+= $subtotal;
                                    $tatalQty+= $items->qty;
                                    ?>
    
                                <?php $i++; ?>
    
                            <?php endforeach; ?>
    
                            </table>
                        <?php echo form_close(); endif;?>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="checkout-address1">
                            <h2>Kurir</h2>
                            <table class="in-checkout-address1">
                                <tr>
                                    <td style="width: 120px;">Pilih Kurir</td>
                                    <td>
                                        <div class="select-kurir">
                                            <select name="kurir" id="kurir">
                                                <option value="">-- Pilih Kurir --</option>
                                                <?php foreach($kurir as $k){ ?>
                                                <option data-kurir="<?php echo $k->label ?>" value="<?php echo $k->value ?>"><?php echo $k->label ?></option>
                                                <?php } ?>
                                            </select>
                                            <input type="hidden" value="" name="infokurir" id="infokurir" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <div id="option-kurir" class="opt-kurir"></div>
                                    </td>
                                   
                                </tr>
                            </table>
                            
                        </div>
                        <div class="checkout-address1 mt-2">
                            <h2>Detail Shopping</h2>
                            <input type="hidden" value="<?php echo $totalHarga?>" id="totHarga" />
                            <table class="in-checkout-address1">
                                <tr>
                                    <td>Total Harga</td>
                                    <td class="text-right">Rp. <label id="total" class="money">0</label></td>
                                </tr>
                                <tr>
                                    <td>Total Ongkos Kirim</td>
                                    <td class="text-right">Rp. <label id="ongkir" class="money">0</label></td>
                                </tr>
                                <tr>
                                    <td>Total Tagihan</td>
                                    <td class="text-right">Rp. <label id="total_tagihan" class="money">0</label></td>
                                </tr>
                                
                                
                            </table>
                            <div class="text-right margin-right-bottom">
                               
                                <button class="btn cart-button-detail" value="Place Order" id="pay-button">Payment Method</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    </section>
    