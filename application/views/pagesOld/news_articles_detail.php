<section>
    <div class="container">
  
            <div class="news-artikel news-artikel-detail ">
                <div class="bg-white row detail-content-desc">
                    <div class="row w100">
                        <div class="col-md-8">
                                
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="image-post"><img src="<?= base_url() . $data->post_image ;?>"></div>
                                </div>
                                <div class="col-md-12">
                                    <h2 class="title-detail title-detail-artikel"><?= $data->post_title; ?></h2>
                                    <p><em><?= $data->post_created_date ;?></em></p>
                                    <div class="content-detail-article"><p><?= $data->post_description ;?></p></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-4 sideright">
                            
                            <h4 class="mb-20">Most Viewed News</h4>
                            <?php 
                            foreach($bestPost as $b){
                                if ( $b->id != $data->id){    
                            ?> 
                            <div class="row">
                                <div class="col-md-4"><a href="<?php echo site_url($b->url_slug)?>"><img src="<?= base_url() . $b->post_image ;?>"></a></div>
                                <div class="col-md-8">
                                    <h4 class="title-detail"><a href="<?php echo site_url($b->url_slug)?>"><?php echo $b->post_title ;?></a></h4>
                                </div>
                                <hr/>
                            </div>
                            <?php } } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
</section>