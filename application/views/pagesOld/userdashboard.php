                <nav class="w-100">
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">History</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0 w-100" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container mtb-20 mt-30">
                            <div class="row profile-content product-featured">

                                <?php foreach($historyProduct as $row) { ?>
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
                                            
                                            <div class="lovewishlist">
                                                <ul>
                                                    <li class="icon-heart"><a class="wishlist" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
                                                    <li class="icon-search"><a class="quickview iframe-link " data-fancybox-type="iframe" href="<?php echo site_url('product/' . $row->url_slug); ?>">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                    <!-- <li>tes</li> -->
                                                </ul>
                                            </div>
                                        </figure>
                                    </a>
                                    <a href="<?php echo site_url('product/' . $row->url_slug); ?>">
                                    <h2><?php echo $row->post_title; ?></h2>
                                    </a>
                                    <p><?php //echo $row->kategori; ?></p>
                                    <?php if ($catalogMode == 0){ ?>
                                    <h3>Rp. <?php echo number_format($row->price, 0, '.', '.'); ?></h3>
                                    <?php $class_value = 1;// ceil($statusmode[0]['mode']); ?>
                                    <a href="<?php echo site_url('product/' . $row->url_slug);?>" class="<?php if ($class_value >= 1) { echo ''; }else{ echo 'hide'; } ?>"><button class="<?php if ($class_value >= 1) { echo 'btn btn-beli'; }else{ echo 'btn btn-beli hide'; } ?>">Beli</button></a>
                                    <!-- <a href="<?php echo base_url()."home/detailproducts/".$row->prodid; ?>"><button class="btn btn-beli">Beli Lagi</button></a> -->
                                    <?php } ?>
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                     
                        <div class="container mtb-20 mt-30">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row profile-content">
                                        <div class="col-md-2">Mobile</div>
                                        <div class="col-md-10">: <?php echo $userInfo->phone_number;?></div>
                                    </div>
                                    <div class="row profile-content">
                                        <div class="col-md-2">Address</div>
                                        <div class="col-md-10">: <?php echo $userInfo->address . " " . $userInfo->city ." " . $userInfo->province;?></div>
                                    </div>
                                    <div class="row profile-content">
                                        <div class="col-md-2">Email</div>
                                        <div class="col-md-10">: <?php echo $userInfo->email;?></div>
                                    </div>
                                </div>
                                <div class="col-md-4 pt-20 text-center">
                                    <!-- <p><a href="#">Berhenti berlangganan Newsletter kami</a></p> -->
                                    <!-- <button class="btn btn-beli"><a href="#">Ganti Password</a></button> -->
                                </div>
                            </div>
                        </div>
                        <div class="row mtb-20">
                            <div class="col-md-6">
                                <div class="card cblack">
                                    <div class="card-header">Transaction</div>
                                    <!-- <?php?> -->
                                    <div class="card-body">
                                        <div class="card-content text-left">
                                            <p class="no-margin">Tagihan</p>  
                                            <strong><span><?php echo $countTagihan->total;?></span></strong>
                                        </div>
                                        <div class="card-content text-left">
                                            <p class="no-margin">Pembelian</p>
                                            <strong><span><?php echo $countTransaksi->total; ?></span></strong>
                                        </div>
                                        <div class="card-content text-left">
                                            <p class="no-margin">Diskusi Retur</p>
                                            <strong><span>0</span></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card cblack">
                                    <div class="card-header">Favorit</div>
                                    <div class="card-body text-left">
                                        <p class="no-margin">Barang favorit</p>
                                        <strong><span><?php  echo $countWishList->total; ?></span></strong>
                                    </div>
                                </div>
                                <div class="mt-20">
                                    <a href="<?php echo site_url("homesecurity/complain");?>" role="button" class="btn btn-red">Complain & Refund</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>