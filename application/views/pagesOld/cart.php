    <main role="main" class="user-hero" id="forcart">
        <div class="container mt-20">
            <div class="row bg-white profile-pd-20 mb-20">
                <div class="container bg-white">
                    <h1 class="title-product">
                        Order Place
                    </h1>
                    <hr class="dashed">
                    <?php
                    $grand_total = 0; $i = 1;?>
                    <?php if(empty($carts)): echo 'Your cart is empty';else:?>
                    <table class="mt-20 table-responsive" cellpadding="6" cellspacing="1" style="width:100%" border="0">
                        <tr class="title-orderplace mb-20">
                            <td class="hide">Serial</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Qty</td>
                            <td>Amount</td>
                            <td class="text-center"></td>
                        </tr>
                        <?php 
                        echo form_open('cart/update_cart');
                        foreach($carts as $c){ 
                        ?>
                        <?php echo form_hidden('id[]', $c->id); ?>
                        <tr class="orderplacecontent">
                            <td class="text-center hide">
                                <?php echo $i++; ?>
                            </td>
                            <td class="width40td">
                                <?php echo $c->product_name; ?>
                            </td>
                            <td class="width30td">
                                <?php
                                $price =  number_format($c->price);
                                if (  $c->diskon_price > 1 ){
                                    $price = "<strike>".number_format($c->price)."</strike> Rp. " . number_format($c->price - $c->diskon_price);
                                }
                                ?>
                                Rp. <?php echo $price; ?>
                            </td>
                            <td class="width10td">
                                <input type="number" name="qty[]" value="<?php echo number_format($c->qty); ?>" style="text-align: center;width: 70px;" />
                            </td>
                                <?php
                                $subTotal = ($c->price - $c->diskon_price) * $c->qty;
                                ?>
                                <?php $grand_total = $grand_total + $subTotal; ?>
                            <td class="width20td">
                                Rp. <?php echo number_format($subTotal) ?>
                            </td>
                            <td class="width20td text-center">
                                <?php echo anchor('cart/remove/'.$c->id,'<span class="btn btn-default btn-delete"><i class="fas fa-trash-alt"></i></span>'); ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr class="mt-20">
                            <td class="mt-20" colspan="2">
                                <strong>Total : </strong>
                                <span class="totalorderplace">Rp. <?php echo number_format($grand_total); ?></span>
                            </td>
                            <td class="mt-20 pd-15"  colspan="4" align="right">
                                <input type="button" class="btn-transparent mb-10" value="Clear Cart" onclick="clear_cart()">
                                <input type="submit" class="btn btn-blue mb-10" value="Update Cart">
                                
                                <a href="<?php echo site_url('cart/shipment') ?>" class="btn btn-green mb-10">Place Order</a>
                            </td>
                        </tr>
                    </table>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </main>
