    <!-- BREADCRUMB -->
    <section class="breadcrumbs">
        <div class="container">
              
                <a href="<?php echo site_url('home')?>">Home</a> > <a href="<?php echo site_url('home')?>">Products</a> > <?php echo $product->post_title?>
               
           <hr class="hr-blue1">
        </div>
     
    </section>    
	<!-- /BREADCRUMB -->
   
    <main role="main" class="mains mains-2 mains-3">
            <div class="container">
                <div class="row no-padding">                    
                    <section>
                        <div class="modal fade" id="modalLoginForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                            <div class="modal-dialog modal-dialog-img" role="document">
                                <img id="myImg" src="<?php echo base_url($product->post_image);?>" alt="">
                            </div>
                        </div>
                    </section>

                    <div class="col-xs-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                        <div class="products">
                            <div class="bg-white row detail-content-desc">
                                <div class="col-md-4">
                                <div class="large-5 column">
                                    <div class="xzoom-container">

                                    <?php
                                   
                                    
                                    if(file_exists($product->post_image))
                                        $fileName = base_url($product->post_image);
                                    else
                                        $fileName = base_url("assets/themes/themesv2/img/product/no_image.png");
                                    ?>
                                    <div class="bingkai">
                                    <img class="xzoom" id="xzoom-default" src="<?php echo $fileName;?>" xoriginal="<?php echo $fileName;?>">
                                    <div id="imgXzoomTitle"></div>
                                    </div>
                                    
                                    
                                    <?php 
                                        if ($product->discount_persen > 1) {
                                            echo "<div class='floating-diskon'>-" . $product->discount_persen . "%</div>";
                                        }else{
                                            echo "";
                                        }
                                    ?>
                                        <div class="xzoom-thumbs">
                                            <?php
                                            if(file_exists( $product->post_image ))
                                                $imageThumbs = base_url($product->post_image);
                                            else
                                                $imageThumbs = base_url("assets/themes/themesv2/img/product/no_image.png");
                                            ?>
                                            <a href="<?php echo $imageThumbs;?>" style="position: relative;">
                                            
                                            <img class="xzoom-gallery" src="<?php echo $fileName?>" />
                                            
                                            </a>
                                            
                                            <?php foreach ($producsImage as $img) { ?>
                                                <?php
                                                if(file_exists( $img->image ))
                                                    $imageThumbs = base_url($img->image);
                                                else
                                                    $imageThumbs = base_url("assets/themes/themesv2/img/product/no_image.png");
                                                ?>
                                                <a href="<?php echo $imageThumbs;?>">
                                                
                                                <?php
                                               
                                                if(file_exists( $img->image ))
                                                    $fileName = base_url($img->image);
                                                else
                                                    $fileName = base_url("assets/themes/themesv2/img/product/no_image.png");
                                                ?>
                                                <?php
                                                $xtitle = "";
                                                if (!empty($img->label)){
                                                    $xtitle = 'xtitle="'.$img->label.'"';
                                                }
                                                ?>
                                                <img class="xzoom-gallery" <?php echo $xtitle?> src="<?php echo $fileName?>"  /></a>
                                            <?php } ?>
                                        </div>
                                    </div>        
                                </div>
                                <div class="large-7 column"></div>
                                </div>
                                <div class="col-md-8">
                                    <h2 class="title-detail"><?php echo $product->post_title; ?></h2>
                                    <form class="desc">
                                         <?php
                                        if(file_exists( $product->brandImage ))
                                            $imageBrand = base_url($product->brandImage);
                                        else
                                            $imageBrand = base_url("assets/themes/themesv2/img/product/no_image.png");
                                        ?>
                                        <div id="imageBrand">
                                            <img src="<?php echo $imageBrand ?>" />
                                        </div>
                                        <div class="form-group row border-bottom-desc">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Brand</label>
                                            <div class="col-sm-9">
                                            
                                            <div class="form-control-plaintext desc-content">: <?php echo $product->brand_name ?>
                                               
                                                
                                            </div>
                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row border-bottom-desc">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Category</label>
                                            <div class="col-sm-9">
                                            <?php foreach ($productCategory as $row) { ?>
                                            <div class="form-control-plaintext desc-content">: <a href="<?php echo site_url('product/category/'.$row->slug) ?>"><?php echo $row->category_name; ?></a></div>
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <?php if (!empty($product->kapasitas_timbang)){?>
                                        <div class="form-group row border-bottom-desc">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Kapasitas Timbang</label>
                                            <div class="col-sm-9"> 
                                            
                                            <div class="form-control-plaintext desc-content">: <?php echo $product->kapasitas_timbang ?></div>
                                            
                                            </div>
                                        </div>
                                         <?php } ?>
                                          <?php if (!empty($product->range_timbang)){?>
                                        <div class="form-group row border-bottom-desc">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Range Timbang</label>
                                            <div class="col-sm-9">
                                            
                                            <div class="form-control-plaintext desc-content">: <?php echo $product->range_timbang ?></div>
                                            
                                            </div>
                                        </div>
                                         <?php } ?>
                                         
                                       
                                        <?php
                                        foreach($medias as $m){
                                        ?>
                                        <div class="form-group row border-bottom-desc">
                                            <label for="staticEmail" class="col-sm-3 col-form-label"><?php echo $m->title ?></label>
                                            <div class="col-sm-9">
                                            <div class="form-control-plaintext desc-content">: <a href="<?php echo base_url($m->path_document) ?>" target="_blank">Download</a> <?php //echo $prdk[0]->composition; ?></div>
                                            </div>
                                        </div>
                                        <?php    
                                        }
                                        if ($catalogMode == 0){
                                        ?>
                                        
                                        <div class="form-group row border-bottom-desc">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Price</label>
                                            <div class="col-sm-9">
                                                <div class="form-control-plaintext desc-content">: 
                                                    <?php
                                                    $price = number_format ($product->price, 0, '.', '.');
                                                    if ( $product->discount_price > 1 ){
                                                        $hargaDiskon = $product->price - $product->discount_price;
                                                        $price = "<strike>". number_format ($product->price, 0, '.', '.')."</strike> Rp. ".number_format ($hargaDiskon, 0, '.', '.');
                                                        
                                                    }
                                                    ?>
                                                 
                                                    <span class="desc-price">Rp. <?php echo $price; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </form>
                                    <div class="margin-bottom-10">
                                        <h5 class="sharesocial">Share :</h5>
                                        <div>
                                            <i class="fa fa-share-alt" style="padding-right: 10px"></i>Bagikan : &nbsp;&nbsp;&nbsp;
                                            <a href="http://www.facebook.com/sharer.php?u=<?php echo base_url('index.php/' . uri_string())?>" target="_blank"><i class="fab fa-facebook-square" style="font-size: 1.5rem;"></i></a>
                                            <a href="https://twitter.com/share?text=&url=<?php echo base_url('index.php/' . uri_string())?>" target="_blank"><i class="fab fa-twitter-square" style="font-size: 1.5rem;"></i></a>
                                            <a href="https://api.whatsapp.com/send?text=<?= current_url();?>" data-action="share/whatsapp/share" target="_blank"><i class="fab fa-whatsapp-square" style="font-size: 1.5rem;"></i></a>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="star pointer" id="starpoint">
                                            <?php $rating_value =  ceil($product->rating); ?>
                                                
                                                <div class='rating-stars'>
                                                    <ul id='stars'>
                                                      <li class='<?php if ($rating_value >= 1) { echo 'star selected'; }else{ echo 'star'; } ?>' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='<?php if ($rating_value >= 2) { echo 'star selected'; }else{ echo 'star'; } ?>' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='<?php if ( $rating_value >= 3) { echo 'star selected'; }else{ echo 'star'; } ?>' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='<?php if ($rating_value >= 4) { echo 'star selected'; }else{ echo 'star'; } ?>' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='<?php if ($rating_value >= 5) { echo 'star selected'; }else{ echo 'star'; } ?>' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                    </ul>
                                                </div>
                                                <div class='success-box'>
                                                    <div class='clearfix'></div>
                                                    <div class='text-message'></div>
                                                    <div class='clearfix'></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="f-8">Tersedia : <span class="f-green"><?php echo $product->qty; ?></span> barang</div>
                                        <!-- <a href="<?php echo site_url("cart/add/".$row->id)?>" class="decornone">
                                            <button class="btn cart-button-detail">Beli</button>
                                        </a> -->
                                        <?php $class_value = 1;//ceil($statusmode[0]['mode']); ?>
                                        <?php if ($catalogMode == 0){ ?>
                                        <a href="<?php echo site_url("cart/add/".$product->product_id)?>" class="<?php if ($class_value >= 1) { echo ''; }else{ echo 'hide'; } ?>"><button class="<?php if ($class_value >= 1) { echo 'btn cart-button-detail'; }else{ echo 'hide'; } ?>">Beli</button></a>
                                        <?php } ?>
                                        <span style="vertical-align: -webkit-baseline-middle; margin-left: 10px; font-size: .8rem;">
                                            <form action="<?php echo site_url("myaccount/addWishlist/"); ?>" method="POST" class="disinline">
                                                <input type="hidden" value="<?php echo $product->product_id; ?>" name="prodid">
                                               
                                                <button class="btn btn-transparent-wishlist" name="submit" value="submit">Add to Wishlist</button>
                                            </form>
                                        </span>
                                    </div>
                                </div>

                                <div class="container margin-top-40 desccontent">
                                    <h1 class="title-product">
                                        Deskripsi
                                    </h1>
                                    <hr class="dashed">
                                    <div class="mt-20">
                                        <?php echo html_entity_decode($product->post_description) ; ?>
                                    </div>
                                </div>

                                <div class="container margin-top-40 desccontent" id="comment">
                                    <h1 class="title-product">
                                        Comment
                                    </h1>
                                    <hr class="dashed">
                                    <div class="mt-20">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php
                                                $return_url = "?url=" . uri_string();
                                                
                                                $attr = array(
                                                            'method' => "POST",
                                                            );
                                                echo form_open('product/submit_comment'.$return_url,$attr);
                                                ?>
                                                <input type="hidden" name="post_id" value="<?php echo $product->id ?>" />
                                                <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>" />
                                                <div class="form-group">
                                                    <textarea class="form-control h150" name="content" placeholder="Write a comment" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn cart-button-detail">Submit</button>
                                                </div>
                                                <?php echo form_close(); ?>
                                            </div>
                                            <div class="col-md-12 mt-20">
                                                <?php foreach ($comments as $row) { ?>
                                                <div class="content-comment">
                                                    <div class="row">
                                                        <div class="col-md-2 text-center">
                                                            <img src="<?php echo base_url('assets/themes/themesv2/img/avatar-lion.png')?>" class="img-avatar">
                                                        </div>
                                                        <div class="col-sm-10">
                                                           
                                                            <h2>
                                                                <?php
                                                                    $s = $row->user_id;
                                                                    if( empty($s)) {
                                                                        echo "Anonymous";
                                                                    } else {
                                                                        echo $row->full_name;
                                                                    }
                                                                ?>
                                                            </h2>
                                                            <p><?php echo $row->message?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    
    