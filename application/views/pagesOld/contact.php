<main role="main" class="mains mains-2">
        <div class="container bg-white pd-20-10">
            <div class="row no-padding">
                
                <h2 class="titlemenus">Contact Us</h2>  
                <div class="col-md-12 text-center mb-35">
                    <span class="getborder">Get in Touch</span>
                </div>
                <div class="col-md-4">
                    <div class="right-to-left">
                        <?php
                        $address = "";
                        $email   = "";
                        $mobile  = "";
                        $fax     = "";
                        if(isset($webinfo)){
                            $wInfo = unserialize($webinfo->value );
                          
                            $address = $wInfo['address'];
                            $email   = $wInfo['email'];
                            $mobile  = $wInfo['phone'];
                            $fax     = $wInfo['fax'];
                        }
                        ?>
                        
                        <div class="row mb-10">
                            <div class="col-md-11 no-padding"><?php echo $address; ?></div>
                            <div class="col-md-1 no-padding"><i class="fas fa-map-pin ml-10"></i></div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-11 no-padding">Pergudangan Pantai Dadap Blok L No. 5 <br> Jl. Raya Prancis, Dadap, Tangerang</div>
                            <div class="col-md-1 no-padding"><i class="fas fa-map-pin ml-10"></i></div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-11 no-padding"><?php echo $email; ?></div>
                            <div class="col-md-1 no-padding"><i class="fas fa-envelope-square ml-10"></i></div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-11 no-padding"><?php echo $mobile; ?></div>
                            <div class="col-md-1 no-padding"><i class="fas fa-mobile-alt ml-10"></i></div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-11 no-padding"><?php echo $fax; ?></div>
                            <div class="col-md-1 no-padding"><i class="fas fa-fax ml-10"></i></div>
                        </div>
                       
                    </div>
                    <div>
                        <form method="post" action="<?php echo site_url("do_sendcontact") ?>">
                            
                            <label class="basic-url">Leave us Message</label>
                            <div class="input-group">
                                <input type="hidden" id="" class="form-control mb-3" name="subject" placeholder="Name" value="From Contact">
                            </div>
                            <div class="input-group">
                                <input type="text" id="" class="form-control mb-3" name="name" placeholder="Name">
                            </div>
                            <div class="input-group">
                                <input type="email" id="" class="form-control mb-3" name="email" placeholder="Email">
                            </div>
                            <div class="input-group">
                                <textarea class="form-control mb-3" name="messages" placeholder="Message"></textarea>
                            </div>

                            <div class="text-center"><button class="btn btn-beli" value="submit">Submit</button></div>

                        </form>
                    </div>
                </div>
                <div class="col-md-8">   
                    <div style="width: 100%">
                        <!--Google map-->
                        <div id="map-container-google-2" class="z-depth-1-half map-container" style="width: 100%">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5774.366805410879!2d106.85614126454176!3d-6.150018196398661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f59e8c7d4c8d%3A0xd9ce442fc4c99282!2sPT.%20INDAH%20SAKTI%20(%20EXCELLENT%20SCALE)!5e0!3m2!1sid!2sid!4v1592383779143!5m2!1sid!2sid" frameborder="0"
                            style="border:0; width: 100%; height: 400px;" allowfullscreen></iframe>
                        </div>    
                        <!--Google Maps-->
                    </div>
                </div>
                
            </div>
        </div>
    </main>