    

    <!-- # FEATURED PRODUCT # -->
    <section class="sec-banners">
        <!-- Best Seller -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if(file_exists($promo->image)){ ?>
                       <img src="<?php echo base_url($promo->image);?>" style="width: 100%;" class="img-responsive" alt="">
                    <?php } ?>
                   
                </div>
            </div>
            <?php
            $showMain = false;
            if (!empty($promo->desc)){
                echo html_entity_decode($promo->desc);
            }else{
                $showMain = true;
            }
            
            ?>
        </div>
        <div class="container">
            <?php
            $promoChilds = $this->mglobal->getPromoSliderChild($promo->id);
            
            foreach($promoChilds as $c){
            ?>
            <h1 class="title-product">
                <?php echo $c->category_name; ?>
            </h1>
            <hr class="dashed">
            <div class="row product-featured">
            <?php
                $products = $this->mglobal->getProdukByCategory($c->category_id);
                foreach($products as $row){ 
            ?>
            <div class="col-xl-2 col-md-3 col-xs-4 text-center margin-bottom-10 hoverdark">
                <a href="<?php echo site_url('product/' . $row->url_slug); ?>">
                    <figure>
                       
                        <?php
                        if(file_exists($row->post_image_thumbs))
                            $fileName = base_url($row->post_image_thumbs);
                        else
                            $fileName = base_url("assets/themes/themesv2/img/product/no_image.png");
                        ?>
                        <img src="<?php echo $fileName;?>" class="product-img" alt="">
                        <?php 
                        
                            if ($row->discount_persen > 1) {
                                echo "<div class='floating-diskon'>-" . $row->discount_persen . "%</div>";
                            }else{
                                echo "";
                            }
                        ?>
                        <div class="lovewishlist">
                            <ul>
                                <li class="icon-heart">
                                    <form action="<?php echo site_url('myaccount/addToWishlist') ?>" method="POST" class="mb-0">
                                        <input type="hidden" value="<?php echo $row->id;?>" name="productId">                                                
                                        <button class="btn btn-primary btn-love" name="submit" value="submit"><i class="fa fa-heart"></i></button>
                                    </li>
                                </form>
                                <li class="icon-search"><a class="quickview iframe-link " data-fancybox-type="iframe" href="<?php echo base_url("product/".$row->url_slug); ?>">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </figure>
                </a>
                <h2><a href="<?php echo site_url('product/' . $row->url_slug); ?>"><?php echo $row->post_title; ?></a></h2>
                <p><?php // echo $row->category_name; ?></p>
                <?php
                $basePrice = $row->price;
                if ($row->discount_price > 1) {
                    $basePrice = $row->price -$row->discount_price;
                }
                ?>
                <h3>Rp. <?php echo number_format($basePrice, 0, '.', '.'); ?></h3>
                <h4><strike> 
                <?php 
                    if ($row->discount_price > 1) {
                        echo "Rp. " .number_format ($row->price, 0, '.', '.');
                    }else{
            
                    }
                ?>
                </strike>
                <span class="diskon">
                    <?php 
                        if ($row->discount_persen > 1) {
                            echo "[" . $row->discount_persen . "%]";
                        }else{
            
                        }
                    ?>
                </span>
            </h4>
            <?php $class_value = "1"//ceil($statusmode[0]['mode']); ?>
            <a href="<?php echo site_url("cart/add/".$row->id)?>" class="<?php if ($class_value >= 1) { echo ''; }else{ echo 'hide'; } ?>">
            <button class="<?php if ($class_value >= 1) { echo 'btn btn-beli'; }else{ echo 'btn btn-beli hide'; } ?>">Beli</button></a>
            </div>
            <?php } ?>
            </div>
            <?php
            }
            ?>
        </div>    
        
    <!-- End Best Seller -->
    
    

</section>
<!-- # END FEATURED PRODUCT # -->
