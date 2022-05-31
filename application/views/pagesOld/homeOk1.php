    <main role="main" class="mains">
        <div class="container">
            <div class="row no-padding">
                <div class="col-xs-3 col-md-3 col-sm-12 col-xs-12 no-padding mobile-hide">
                    <div>
                        <?php
                        if ($categories){
                        ?>
    					<ul class="menus">
                            <li class="header-menus">KATEGORI</li>
                            <?php foreach($categories as $c){ ?>
                                <li onclick="location.href = '<?php echo site_url('product/category/'.$c->slug);?>';"><a href="<?php echo site_url('product/category/'.$c->slug);?>"><?php echo $c->category_name; ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
                <div class="col-xs-9 col-md-9 col-sm-12 col-xs-12 no-padding">
                    <div class="for-banners">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php $count = 0; 
                                $indicators = ''; 
                                foreach ($slider as $row): 
                                    $count++; 
                                    if ($count === 1) 
                                    { 
                                        $class = 'active'; 
                                    } 
                                    else 
                                    { 
                                        $class = ''; 
                                    }?> 
                                    <li data-target="#myCarousel" data-slide-to="<?php echo $row->id; ?>" class="<?php echo $class; ?>"></li>
                                <?php endforeach;?> 
                            </ol>
                            <div class="carousel-inner">
                                <?php $count = 0; 
                                $indicators = ''; 
                              
                                foreach ($slider as $row): 
                                    $count++; 
                                    if ($count === 1) 
                                    { 
                                        $class = 'active'; 
                                    } 
                                    else 
                                    { 
                                        $class = ''; 
                                    }?> 
                                    <div class="carousel-item <?php echo $class; ?>">
                                        <a href="<?php echo site_url('promo/'.$row->slug)?>">
                                            <img src="<?php echo base_url($row->image);?>" alt="">
                                        </a>
                                        <?php /*
                                        <div class="container">
                                            <div class="carousel-caption text-left">
                                                <p><?php echo $row->title; ?></p>
                                                <h1><?php echo $row->title; ?></h1>
                                                <p><a class="btn btn-lg btn-legendary" href="<?php echo $row->link_target; ?>" role="button">Shop Now</a></p>
                                            </div>
                                        </div>
                                        */ ?>
                                    </div>
                                <?php endforeach;?> 
                            </div>
                            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    
    <section class="sec-banners">
        <div class="container">
            <div class="col-xs-12 col-sm-12 four-block no-padding">
                <div class="modcontent clearfix">
                    <div class="policy-detail">
                        <div class="banner-policy">
                            <div class="policy policy1">
                                <span class="ico-policy"></span> 
                                <div class="service-info">
                                    <span class="title">Free Shipping &amp; Return</span> <br> <span>Free shipping on orders over Rp. 500.000</span> 
                                </div>
                            </div>
                            <div class="policy policy2">
                                <span class="ico-policy"></span>
                                <div class="service-info">
                                    <span class="title">Money Guarantee</span> <br><span>1 days money back guarantee</span>
                                </div>
                            </div>
                            <div class="policy policy3">
                                <span class="ico-policy"></span> 
                                <div class="service-info">
                                    <span class="title">Online Support</span> <br><span>We support online 08. AM to 05. PM</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row mtb-10topbottom">
                <div class="col-md-12">
                    <h1 class="title-product">Search by Brand</h1>
                    <hr class="dashed"><br>
                </div>
                <div class="col-md-3">
                    <img src="<?= base_url("assets/images/");?>brand-image-excellent.jpg" class="img100">
                </div>
                <div class="col-md-3">
                    <img src="<?= base_url("assets/images/");?>brand-image-henherr.jpg" class="img100">
                </div>
                <div class="col-md-3">
                    <img src="<?= base_url("assets/images/");?>brand-image-newton.jpg" class="img100">
                </div>
                <div class="col-md-3">
                    <img src="<?= base_url("assets/images/");?>brand-image-uscell.jpg" class="img100">
                </div>
            </div>
        </div>
        
        <div class="container">
            <?php
            foreach ($banner as $b){
            ?>
            <div class="row bg-white mb-10">
            <?php if ($b->main_display == "1"){?> 
                <div class="col-md-12">
                    <a href="<?php echo site_url('product/promo/'); ?>">
                        <img src="<?php echo base_url($b->banner)?>" class="gridimg">
                    </a>
                </div>
            <?php }else{?>
                    <?php 
                    $sub = $subBanner->getSubBanner($b->id);
                    $count = count($sub);
                    if ( $count == "1" ){
                        $arrayCol = array('12');
                    }elseif ( $count == "2" ){
                        $arrayCol = array('6','6');
                    }elseif ( $count == "3" ){
                        $arrayCol = array('3','6','3');
                    }elseif ( $count == "4" ){
                        $arrayCol = array('3','3','3','3');
                    }else{
                        $arrayCol = 2;
                    }
                    $i = 0;
                    foreach($sub as $s){
                        if (is_array($arrayCol)){
                            if (isset($arrayCol[$i])){
                                $md = $arrayCol[$i];
                            }else{
                                $md = 12;    
                            }
                            
                        }else{
                            $md = $arrayCol;
                        }
                    ?>
                    <div class="col-md-<?php echo $md?>">
                        <a href="<?php echo site_url('product/category/'.$s->slug); ?>">
                            <img src="<?php echo base_url($s->image_big)?>" class="gridimg">
                        </a>
                    </div>
                    <?php $i++; } ?>
            <?php }?>
            </div>
            <?php
            }
            ?>
           
        </div>
    </section>

    <!-- # FEATURED PRODUCT # -->
    <section class="featured-product bg-white">
        <!-- Best Seller -->
        <div class="container">
            <h1 class="title-product">
                Best Seller
            </h1>
            <hr class="dashed">
            <div class="row product-featured">
             <?php foreach($feautereProduct as $row){ ?>
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
                        <p><?php echo $row->category_name; ?></p>
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
    </div>
    <!-- End Best Seller -->
    
    <div class="container">
        <div class="row mtb-20">
            <!-- New Arrival -->
            <div class="col-md-4">
                <div class="row margin-0">
                    <div class="col-md-12 title-new">
                        <h2>New Arrival</h2>
                        <hr class="dashed">
                    </div>
                    
                    <?php foreach($latestProduk as $e){ ?>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 col-xs-4 mid-inline">
                                
                                    <a href="<?php echo site_url('product/' . $e->url_slug) ?>">
                                        <?php
                                        if(file_exists($e->post_image_thumbs))
                                            $fileName = base_url($e->post_image_thumbs);
                                        else
                                            $fileName = base_url("assets/themes/themesv2/img/product/no_image.png");
                                        ?>
                                        <img src="<?php echo $fileName;?>" class="img80" alt="">
                                        <?php
                                        /* 
                                        if ($e['diskon'] > 1) {
                                            echo "<div class='floating-diskon f-6'>-" . $e['diskon'] . "%</div>";
                                        }else{
                                            echo "";
                                        }*/
                                        ?>
                                    </a>
                                    <div class="productnew">New</div>
                                </div>
                                <div class="col-md-8 col-xs-4 mid-inline">
                                    <h2><a href="<?php echo site_url('product/' . $e->url_slug); ?>"><?php echo $e->post_title; ?></a></h2> <br>
                                    <h2>Rp. <?php echo number_format($e->price, 0, '.', '.'); ?></h2><br>
                                    <h4>
                                        <strike> 
                                            <?php 
                                            /*if ($e['diskon'] > 1) {
                                                echo "Rp. " .number_format ($e->price, 0, '.', '.');
                                            }else{

                                            }*/
                                            ?>
                                        </strike>
                                        <span class="diskon">
                                            <?php 
                                            /*
                                            if ($e['diskon'] > 1) {
                                                echo "[" . $e['diskon'] . "%]";
                                            }else{

                                            }*/
                                            ?>
                                        </span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- End New Arrival -->
            <!-- Best Seller -->
            <div class="col-md-4">
                <div class="row margin-0">
                    <div class="col-md-12 title-new">
                        <h2>Best Seller</h2>
                        <hr class="dashed">
                    </div>
                    <?php foreach($bestSellest as $e){ ?>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 col-xs-4 mid-inline">
                                    <a href="<?php echo site_url('product/' . $e->url_slug); ?>">
                                        <?php
                                        if(file_exists($e->post_image_thumbs))
                                            $fileName = base_url($e->post_image_thumbs);
                                        else
                                            $fileName = base_url("assets/themes/themesv2/img/product/no_image.png");
                                        ?>
                                        <img src="<?php echo $fileName;?>" class="img80" alt="">

                                        <?php 
                                        /*if ($e['diskon'] > 1) {
                                            echo "<div class='floating-diskon f-6'>-" . $e['diskon'] . "%</div>";
                                        }else{
                                            echo "";
                                        }*/
                                        ?>
                                    </a>
                                </div>
                                <div class="col-md-8 col-xs-4 mid-inline mt-20-spc">
                                    <h2><a href="<?php echo site_url('product/' . $e->url_slug); ?>"><?php echo $e->post_title; ?></a></h2> <br>
                                    <h2>Rp. <?php echo number_format($e->price, 0, '.', '.'); ?></h2><br>
                                    <h4>
                                        <strike> 
                                            <?php 
                                            /*if ($e['diskon'] > 1) {
                                                echo "Rp. " .number_format ($e['harga'], 0, '.', '.');
                                            }else{

                                            }*/
                                            ?>
                                        </strike>
                                        <span class="diskon">
                                            <?php 
                                            /*if ($e['diskon'] > 1) {
                                                echo "[" . $e['diskon'] . "%]";
                                            }else{

                                            }*/
                                            ?>
                                        </span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- End Best Seller -->
            <!-- Special Product -->
            <div class="col-md-4">
                <div class="row margin-0">
                    <div class="col-md-12 title-new">
                        <h2>Special Product</h2>
                        <hr class="dashed">
                    </div>
                    <?php foreach($mostviewedProduk as $e){ ?>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 col-xs-4 mid-inline">
                                    <a href="<?php echo site_url('product/' . $e->url_slug); ?>">
                                        <?php
                                        if(file_exists($e->post_image_thumbs))
                                            $fileName = base_url($e->post_image_thumbs);
                                        else
                                            $fileName = base_url("assets/themes/themesv2/img/product/no_image.png");
                                        ?>
                                        <img src="<?php echo $fileName;?>" class="img80" alt="">
                                        
                                        <?php 
                                        /*if ($e['diskon'] > 1) {
                                            echo "<div class='floating-diskon f-6'>-" . $e['diskon'] . "%</div>";
                                        }else{
                                            echo "";
                                        }*/
                                        ?>
                                    </a>
                                </div>
                                <div class="col-md-8 col-xs-4 mid-inline mt-20-spc">
                                    <h2><a href="<?php echo site_url('product/' . $e->url_slug); ?>"><?php echo $e->post_title;; ?></a></h2> <br>
                                    <h2>Rp. <?php echo number_format($e->price, 0, '.', '.'); ?></h2><br>
                                    <h4>
                                        <strike> 
                                            <?php 
                                            /*if ($e['diskon'] > 1) {
                                                echo "Rp. " .number_format ($e['harga'], 0, '.', '.');
                                            }else{

                                            }*/
                                            ?>
                                        </strike>
                                        <span class="diskon">
                                            <?php 
                                            /*if ($e['diskon'] > 1) {
                                                echo "[" . $e['diskon'] . "%]";
                                            }else{

                                            }*/
                                            ?>
                                        </span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- End Special Product -->
        </div>
    </div>

</section>
<!-- # END FEATURED PRODUCT # -->
