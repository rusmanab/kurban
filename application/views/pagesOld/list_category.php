<main role="main" class="mains mains-2">
        <div class="container">
            <div class="row no-padding">
                
                <div class="col-xs-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                    <div class="for-banners">
                        <div class="bg-white row detail-content-desc">
                            <?php foreach($listCat as $cat){ ?>
                           
                            <?php
                                if(file_exists($cat->image))
                                    $fileName = base_url($cat->image);
                                else
                                    $fileName = base_url("assets/themes/themesv2/img/categories-icon-natural.png");
                                ?>
                            <div class="col-md-2 col-xs-2 icon-categories">
                                <a href="<?php echo site_url("product/category/" . $cat->slug);?>"><img src="<?php echo $fileName; ?>" class="img50" alt=""></a>
                                <p><a href="<?php echo site_url("product/category/" . $cat->slug);?>" class="menukategori"><?php echo $cat->category_name; ?></a></p>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <img src="<?php echo base_url('assets/themes/themesv2/img/categories-banner-1.png')?> ">
            </div>

            <div class="container bg-white">
                <div class="related-product row product-featured">
                    
                    <?php foreach($allproduct as $row){ ?>
                    <div class="col-xl-2 col-md-3 col-xs-4 text-center margin-bottom-10 hoverdark">
                        <a href="<?php echo site_url('product/' . $row->url_slug); ?>">
                            <figure>
                                <?php
                                if(file_exists($row->post_image_thumbs))
                                    $fileName = base_url($row->post_image_thumbs);
                                else
                                    $fileName = base_url("assets/themes/themesv2/img/product/no_image.png");
                                ?>
                                <img src="<?php echo $fileName?>" class="product-img" alt="">
                                
                                <?php 
                                
                                    if ($row->discount_persen > 1) {
                                        echo "<div class='floating-diskon'>-" . $row->discount_persen . "%</div>";
                                    }else{
                                        echo "";
                                    }
                                ?>
                                <div class="lovewishlist">
                                    <ul>
                                        <li class="icon-heart"><a class="wishlist" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
                                        <li class="icon-search"><a class="quickview iframe-link " data-fancybox-type="iframe" href="<?php echo site_url("product/".$row->url_slug);  ?>">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                        </a>
                        <a href="<?php echo site_url('product/' . $row->url_slug); ?>">
                            <h2><?php echo $row->post_title; ?></h2>
                        </a>
                        
                        <?php
                        if ($catalogMode == 0){
                            
                        $basePrice = $row->price;
                        if ($row->discount_price > 1) {
                            $basePrice = $row->price -$row->discount_price;
                        }
                        ?>
                        <h3>Rp. <?php echo number_format($basePrice, 0, '.', '.'); ?></h3>
                        <h4>
                        <strike> 
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
                        <?php $class_value =1;; ?>
                        <a href="<?php echo site_url("cart/add/".$row->id)?>" class="<?php if ($class_value >= 1) { echo ''; }else{ echo 'hide'; } ?>"><button class="<?php if ($class_value >= 1) { echo 'btn btn-beli'; }else{ echo 'btn btn-beli hide'; } ?>">Beli</button></a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>

        </div>
    </main>