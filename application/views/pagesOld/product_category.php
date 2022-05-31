    <div class="image-head">
        <div class="container">
        <?php echo $cateName ?>
        </div>
    </div>
    <div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?php echo site_url('home')?>">Home</a></li>
				<li><a href="<?php echo site_url('product')?>">Products</a></li>
                <li><a href="<?php echo site_url('product/category')?>">Category</a></li>
				<li class="active"><?php echo $cateName ?></li>
			</ul>
		</div>
	</div>
    <div class="section">
        <div class="container">
    		<div class="row">            
    			<div class="col-md-12">
                    <div class="user-menu">
                        <span class="header-menu">Filter </span>
                        <div class="filter-child">
                            <div class="filter-head">Price</div>
                            <?php
                            $attr = array('method' => "get");
                            echo form_open('',$attr);
                            ?>
                            <div class="input-group mb-10">
                              <span class="input-group-addon" id="basic-addon1">Rp</span>
                              <input type="text" class="form-control" placeholder="Minimum Price" name="lprice" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-10">
                              <span class="input-group-addon" id="basic-addon1">Rp</span>
                              <input type="text" class="form-control" placeholder="Maximum Price" name="Mprice" aria-describedby="basic-addon1">
                            </div>
                            <div class="filter-form-action">
                            <input type="reset" value="reset" />
                            <button type="submit">Terapkan</button>
                            </div>
                            
                            <hr/>
                            <div class="filter-head">Rating</div>

                            <label class="opt-rating">
                                <input type="radio" name="rating" value="5"/>
                                <div class="product-rating">
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    							</div>
                            </label>
                            <label class="opt-rating">
                                <input type="radio" name="rating" value="4"/>
                                <div class="product-rating">
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star-o empty"></i>
    							</div>
                            </label>
                            <label class="opt-rating">
                                <input type="radio" name="rating" value="3"/>
                                <div class="product-rating">
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star-o empty"></i>
    								<i class="fa fa-star-o empty"></i>
    							</div>
                            </label>
                            <label class="opt-rating">
                                <input type="radio" name="rating" value="2"/>
                                <div class="product-rating">
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star-o empty"></i>
    								<i class="fa fa-star-o empty"></i>
    								<i class="fa fa-star-o empty"></i>
    							</div>
                            </label>
                            <label class="opt-rating">
                                <input type="radio" name="rating" value="1"/>
                                <div class="product-rating">
    								<i class="fa fa-star"></i>
    								<i class="fa fa-star-o empty"></i>
    								<i class="fa fa-star-o empty"></i>
    								<i class="fa fa-star-o empty"></i>
    								<i class="fa fa-star-o empty"></i>
    							</div>
                            </label>
                            <div class="filter-form-action">
                            <input type="reset" value="reset" />
                            <button type="submit">Terapkan</button>
                            </div>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                    
                    
                    <div class="user-content">
                        <div class="page-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="filter-nav">
                                        <ul class="list-inline">
                                            <li ><a href="?sortType=popular" data-sort="">Popular</a></li>
                                            <li><a href="?sortType=totalsale">Berdasarkan Penjualan</a></li>
                                            <li><a href="?sortType=latest">Data Terbaru</a></li>
                                            <li><a href="?sortType=discount">Diskon</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php if ($products){?>
                            <!-- Product Single -->
                			<div class="row whislist">
                				
                				<?php foreach($products as $l){?>
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
                            <?php }else{?> 
                            <br />
                            <div class="jumbotron">
                                <h1>Oops!</h1>
                                <p>Product yang anda cari tidak ada.</p>
                                
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>        
        </div>
    </div>