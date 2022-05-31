    <!-- BREADCRUMB -->
    <section class="breadcrumbs">
        <div class="container">
              
                <a href="<?php echo site_url('home')?>">Home</a> > Videos
               
           <hr class="hr-blue1">
        </div>
     
    </section>    
	<!-- /BREADCRUMB -->
<section>
    <div class="container">
        
  
            <div class="news-artikel">
                <div class="bg-white row detail-content-desc">
                    <div class="row w100">
                        
                        <?php 
                        $i=1;
                        foreach($data as $row){
                            if ( $i == 1){
                                $iframe = html_entity_decode($row->iframe);
                                preg_match('/src="([^"]+)"/', $iframe, $match);
                                $url = $match[1];
                        ?>
                        <div class="col-md-12 latest-video">
                            <iframe width="100%" height="400" src="<?php echo $url?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h2 class="title-detail"><a href="<?php echo site_url('video/'.$row->slug)?>"><?php echo $row->title ;?></a></h2>
                            <p><em><?= $row->created_at ;?></em></p>
                            <a href="<?php echo site_url('video/'.$row->slug)?>" role="button" class="btn cart-button-detail">View Detail</a>
                        </div>
                        <?php }else{?>
                        <div class="col-md-2 mb-40 videos hoverdark">
                            <a href="<?php echo site_url('video/'.$row->slug)?>">
                                <figure class="figures">
                                    <img src="<?= base_url() . $row->image_thumbs ;?>">
                                </figure>
                            </a>
                            <div class="mt--10">
                                <h2 class="title-detail"><a href="<?php echo site_url('video/'.$row->slug)?>"><?php echo $row->title ;?></a></h2>
                                <p><em><?= $row->created_at ;?></em></p>
                                
                                <a href="<?php echo site_url('video/'.$row->slug)?>" role="button" class="btn cart-button-detail">View Detail</a>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $i++; ?>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
            
            
        
    </div>
</section>