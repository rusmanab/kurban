    <section>
        <div class="container">
            
            <div class="arrow-tab">
                <ul class="arrow-tabs">
                    <li> 1. Address </li>
                    <li class="active"> 2. Payment </li>
                </ul>
            </div>
        </div>
    </section>
    <?php
    $total_price = $orderSum->total_price;
    $ongkir      = $orderdet2[0]->price;
    $totalPrice  = $total_price - $ongkir - $orderSum->total_diskon;
    
    $totalPriceAfterDiskon = $total_price - $orderSum->total_diskon;
    ?>
    <section class="sec-checkout">
        
        <div class="container">
            <?php
            $payrequest = $this->session->userdata('payrequest');

            if ($payrequest){
            ?>
            <div class="col-md-12">
                <div class="alert alert-danger" id="success-alert">
                    <a href="" class="close" data-dismiss="alert">×</a>
                    <?php echo $this->session->userdata('payrequest');?>                     
                </div>
            </div>
            <?php } ?>
            <!-- <form name="billing" method="post" action="<?php echo base_url().'cart/save_order' ?>" > -->
            <!-- <form id="payment-form" method="post" action="<?=site_url()?>snap/finish"> -->
           
            <div class="row">
                <div class="col-md-6">
                    <div class="checkout-address1 mb-20">
                        <h2>Shipping Address</h2>
                        <div class="in-checkout-address1">
                        <p>
                        <?php echo $orderSum->address;?> <?php echo $orderSum->province;?>
                        <br /><?php echo $orderSum->city;?>,<?php echo $orderSum->postal_code;?>
                        </p>
                        </div>
                    </div>
                    <div class="checkout-address1">
                        <h2>Choose Payment Method</h2>
                        <?php 
                        $attr = array(
                                'class' => 'form',
                                'id'    => "bank-manual"
                                );
                        echo form_open('cart/payment_confirm',$attr); 
                        ?>
                        <input type="hidden" value="<?php echo $orderSum->no_order?>" name="no_order" />
                        <input type="hidden" value="<?php echo $orderSum->id?>" name="orderId" />
                        <input type="hidden" value="2" name="methode_bayar_id" id="methode_bayar_id" />
                        <ul class="nav nav-tabs" role="tablist">
                        <?php
                        $tabContent = array();
                        $x=0;
                        foreach($listMethode as $mb){
                            $x++;
                            $active = "";
                            if ($x==1){
                                $active = "active";
                            }
                        ?>
                            <li role="presentation" class="<?php echo $active?> mpay">
                                <a href="#paytab<?php echo $x?>" aria-controls="paytab<?php echo $x?>" role="tab" data-toggle="tab"><?php echo $mb->nama_pembayaran?></a>
                            </li>
                        <?php
                            $ul = "";
                            $lPay = $mglobal->getListPay($mb->id);
                            
                            if ($lPay){
                                $ul = '<ul class="list-inline list-bank ">';
                                foreach($lPay as $p){
                                   
                                    $ul.= '<li class="list-inline-item">
                                        <input type="radio" name="payment_id" mid="'.$mb->id.'" value="'.$p->id.'" id="bank'.$p->id.'" class="input-hidden inputChoose" />
                                        <label for="bank'.$p->id.'">
                                            <img src="'.base_url($p->image).'"  />
                                        </label>
                                    </li>';
                                    
                                }
                                $ul.= '</ul>';
                            }
                            
                            $tabContent[]= '<div role="tabpanel" class="tab-pane '.$active.'" id="paytab'.$x.'">'.$ul.'</div>';
                        }
                        ?>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content pay-content">    
                            <?php
                            $cTab = count($tabContent);
                            if ($cTab>0){
                               for($t=0;$t<$cTab;$t++){
                                    echo $tabContent[$t];
                               }
                            }
                            ?>
                        </div>
                      
                        <div id="btn-bayar">
                            <input type="submit" value="Bayar Rp <?php echo number_format($totalPriceAfterDiskon) ?>" id="btn-beli" class="btn btn-danger btn-lg btn-block" />
                        </div>
                        
                        <?php echo form_close()?>    
                    </div>
                  
                </div>
                <div class="col-md-6">
                    <div class="checkout-address1">
                        <h2>Confirm Order</h2>
                        <table class="in-checkout-address2">
                            <tr>
                                <th colspan="3">Detail Shopping</th>
                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($orderdet1 as $o): ?>
                            
                            <tr>
                                <td><?php echo $o->pruduct_name; ?></td>
                                <?php
                                $price = number_format( $o->price);
                                if ( $o->diskon_price > 0 ){
                                    $diskon_price = $o->diskon_price;
                                    $price = "<strike>".number_format( $o->price)."</strike> ";
                                    $price.= number_format( $o->price - $diskon_price);
                                }
                                ?>
                                <td><?php echo $o->qty; ?> x <?php echo $price; ?></td>
                                <td class="text-right">
                                    Rp. <span id="harga_produk"><?php
                                        $a = $o->qty * ($o->price - $o->diskon_price);
                                      
                                        echo number_format($a);
                                    ?></span>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                        <table class="in-checkout-address2">
                            <tr>
                                <th colspan="2">Summary</th>
                            </tr>
                            <tr>
                                <td>Total Harga</td>
                                <td class="text-right">Rp. 
                                    <?php echo number_format($totalPrice) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Ongkir</td>
                                <td class="text-right">Rp. 
                                    <?php echo number_format($ongkir) ?> 
                                 
                                </td>
                            </tr>
                            <?php
                            /*
                            <tr>
                                <td>Ppn x 10%</td>
                                <td class="text-right">Rp. 
                                    <span id="pajak"><?php 
                                        echo number_format (
                                        $this->cart->total() * 10 / 100, 0, '.', '.'); ?></span>
                                </td>
                            </tr>
                            */
                            ?>
                        </table>
                        
                       
                        
                        <table class="in-checkout-address2">
                            <tr>
                                <th colspan="2">Total Pembelian</th>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="text-right">Rp. <?php echo number_format($totalPriceAfterDiskon) ?>
                                </td>
                            </tr>
                        </table>
                      
                    </div>
                    
                </div>
            </div>
            <!-- </form> -->
        </div>
    </section>
    