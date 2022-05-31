    <!-- BREADCRUMB -->
    <section class="breadcrumbs">
        <div class="container">
              
                <a href="<?php echo site_url('home')?>">Home</a> > <a href="<?php echo site_url('video')?>">Videos</a> > <?php echo $data->title ?>
               
           <hr class="hr-blue1">
        </div>
     
    </section>    
    
	<!-- /BREADCRUMB -->
	
    <section>
        <div class="container">
            <div class="news-artikel ">
                
                <div class="bg-white row detail-content-desc">
                    <div class="row w100">
                        <div class="col-md-8 detail-video">
                            <div class="forvideo">
                            <?php
                            echo html_entity_decode($data->iframe);
                            ?>
                            </div>
                            <h3><?php echo $data->title ?></h3>
                            <small><?php echo $data->created_at ?></small>
                            
                        </div>
                        <div class="col-md-4">
                            <p>List Video Lainnya</p>
                            <?php
                            foreach($dataRandom as $r){
                            ?>
                            <div class="row betterplace">
                                <div class="col-md-5 list-video-sidebar">
                                   
                                    <a href="<?php echo site_url('video/'.$r->slug)?>">
                                        <figure class="randomVideo">
                                            <img src="<?php echo base_url($r->image_thumbs)?>">
                                        </figure>
                                    </a>
                                </div>
                                <div class="col-md-7 side-sidebar">
                                    <a href="<?php echo site_url('video/'.$r->slug)?>"><h3><?php echo $r->title ?></h3></a>
                                    <small><?php echo $r->created_at ?></small>
                                </div>
                                
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>