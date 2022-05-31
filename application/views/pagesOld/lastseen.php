    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Terakhir Dilihat</h3>
        </div>
        <div class="panel-body">
            
            <?php if ($lastProduk){?>
            <!-- Product Single -->
			<div class="row whislist">
				
				<?php foreach($lastProduk as $l){?>
				<div class="col-md-3 col-sm-6 col-xs-6">
                    
    					<div class="product product-single">
                            <a href="<?php echo site_url('product/' . $l->url_slug) ?>">
    						<div class="product-thumb">
    							<img src="<?php echo base_url($l->post_image_thumbs)?>" alt="">
    						</div>
                            </a>
    						<div class="product-body">
    							<h3 class="product-name">
                                    <a href="<?php echo site_url('product/' . $l->url_slug) ?>"><?php echo $l->post_title?></a>
                                </h3>
    							<?php
                                $price = number_format($l->price);
                                ?>
    							<h4 class="product-price">Rp. <?php echo $price?></h4>
                                <div class="product-rating">
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star-o empty"></i>
    							</div>
    						
    						</div>
    					</div>
                   
				</div>
                <?php } ?>
            </div>
            <!-- End Product Single -->
            <?php } ?>
        </div>
    </div>