    <!-- BREADCRUMB -->
    <section class="breadcrumbs">
        <div class="container">
              
                <a href="<?php echo site_url('home')?>">Home</a> > News & Articles
               
           <hr class="hr-blue1">
        </div>
     
    </section>    
	<!-- /BREADCRUMB -->
<section>
    <div class="container">
        <div class="news-artikel ">
            <div class="bg-white row detail-content-desc">
                <div class="row w100">
                    <div class="col-md-12"><h2>News & Articles</h2></div>
                    <div class="col-md-8">
                    <?php foreach($data as $row){?>
                        <div class="row">
                            <div class="col-md-4"><a href="<?php echo site_url($row->url_slug)?>"><img src="<?= base_url() . $row->post_image ;?>"></a></div>
                            <div class="col-md-8">
                                <h2 class="title-detail"><a href="<?php echo site_url($row->url_slug)?>"><?php echo $row->post_title ;?></a></h2>
                                <p><em><?= $row->post_created_date ;?></em></p>
                                <div class="content-article"><?= $row->post_description ;?></div>
                                <a href="<?php echo site_url($row->url_slug)?>" role="button" class="btn cart-button-detail">View Detail</a>
                            </div>
                        </div>
                        <hr/>
                    <?php } ?>
                    </div>
                    <div class="col-md-4 sideright">                            
                        <h4 class="mb-20">Best News</h4>
                        <div class="row">
                            <?php foreach($bestPost as $b){ ?> 
                            <div class="col-md-4"><a href="<?php echo site_url($b->url_slug)?>"><img src="<?= base_url() . $b->post_image ;?>"></a></div>
                            <div class="col-md-8">
                                <h4 class="title-detail"><a href="<?php echo site_url($b->url_slug)?>"><?php echo $b->post_title ;?></a></h4>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>