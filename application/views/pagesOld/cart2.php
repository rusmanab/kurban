<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
			     <div class="col-md-8">                    
                    <ul class="list-inline line-buttom">
                        <li>
                            <label class="check">Pilih semua produk
                              <input type="checkbox" />
                              <span class="checkmark"></span>
                            </label>
                            
                        </li>
                        <li class="pull-right"><a href="" id="cart_delete">Hapus</a></li>
                    </ul>
                    
                    
                    
                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items): ?>
                    
                            <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                            <div class="item-cart">
                                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                <div>
                                    <label class="check">
                                      <input type="checkbox" value="<?php echo $items['rowid']?>" name="<?php echo $i.$items['rowid']?>" />
                                      <span class="checkmark"></span>
                                    </label>
                                </div>                        
                                <div class="product-thumb">
        							<img src="<?php echo base_url($items['image'])?>" alt="">
        						</div>
                                <div class="desc">
        							<div class="head"><?php echo $items['name']; ?></div>
                                    <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                    
                                            <p>
                                                    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
            
                                                            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
            
                                                    <?php endforeach; ?>
                                            </p>
            
                                    <?php endif; ?>
                                    <div class="price">Rp <?php echo $this->cart->format_number($items['price']); ?></div>
        						</div>
                                <div class="oper">
                                    <ul class="list-inline">
                                        <li><a href="<?php echo site_url('cart/remove/'.$items['rowid'])?>"><i class="fa fa-trash"></i></a></li>
                                        <li><button class="btn-minus"><i class="fa fa-minus"></i></button></li>
                                        <li><input type="number" value="<?php echo $items['qty']?>" /></li>
                                        <li><button class="btn-plus"><i class="fa fa-plus"></i></button></li>
                                    </ul>                     
                                </div>
                                <div class="clearfix"></div>
                            </div>                    
                    <?php $i++; ?>                    
                    <?php endforeach; ?>
                    
                    
                    <div class="line-buttom"></div>
                 </div>
                 <div class="col-md-4">
                    <div class="ringkasan-belanja">
                        <h4>Ringkasan Belanja</h4>
                        <hr />
                        <ul class="list-inline total-harga">
                            <li>Total Harga</li>
                            <li class="pull-right"><?php echo $this->cart->format_number($this->cart->total()); ?></li>
                        </ul>
                       <input type="submit" value="Beli (1)" class="btn btn-primary btn-block" />
                        
                        <div class="voucher">
                            <label>Masukan kode voucher</label>
                            <input type="text" />
                            <img src="./img/img-voucher.jpg" />
                        </div>
                    </div>
                    
                 </div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
    <?php
    if ($relatedProduk){
    ?>
    
    <div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Produk Terkait</h2>
					</div>
				</div>
				<!-- section title -->
                <?php foreach($relatedProduk as $l){?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<img src="<?php echo base_url($l->post_image_thumbs)?>" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-name"><a href="<?php echo site_url('product/' . $l->url_slug) ?>"><?php echo $l->post_title?></a></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
                            <?php
                            $price = number_format($l->price);
                            ?>
							<h4 class="product-price">Rp. <?php echo $price?></h4>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>
								<a class="acart" href="<?php echo site_url('product/' . $l->url_slug) ?>"> Lihat Produk</button></a>
							</div>
						</div>
					</div>
				</div>
                <?php } ?>
				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<img src="./img/product1.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-name"><a href="#">JCS-B LED DOUBLE DISPLAY</a></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h4 class="product-price">Rp. 3.000.000</h4>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Beli Produk</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				

				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
    <?php }?>