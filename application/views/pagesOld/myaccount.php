<ul class="nav nav-tabs nav-justified">
  
  <li role="presentation" class="active">
    <a href="#profile" id="profile-tab" role="tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Peringkat Saya</a>
  </li>
  <li role="presentation" >
    <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Perbaharui Profile</a>
  </li>
</ul>
<div class="tab-content">
    
    <div class="tab-pane fade active in" role="tabpanel" id="profile" aria-labelledby="profile-tab">
        <div class="level">
            <div class="img-profile">
                <img src="<?php echo base_url("assets/themes/themesv1") ?>/img/profile_default.png" />
            </div>
            <div class="user-info">
                <span>Hallo, <label><?php echo $this->session->userdata('f_username') ?></label></span>
                <div>Level Kamu <label>Bronze</label></div>
                <p>Peraturan Cara untuk meningkatkan level kamu <a href="">selengkapnya</a>
                </p> 
            </div>
            
        </div>
        <div class="level-info">
                
                <hr />
                Level Keanggotaan
                <div class="chart-score">
                    <div class="cart-bar">
                        <i style="width:25%;"><span></span></i>
                    </div>
                    <div class="face shadow face-user  ">
                        <div class="info">
                            <div class="t">Member Baru</div>
                        </div>
                    </div>
                    <div class="face shadow face-bronze  big">
                        <div class="info">
                            <div class="t">Bronze</div>
                        </div>
                    </div>
                    <div class="face shadow face-silver  ">
                        <div class="info">
                            <div class="t">Silver</div>
                        </div>
                    </div>
                    <div class="face shadow face-gold  ">
                        <div class="info">
                            <div class="t">Gold</div>
                        </div>
                    </div>
                    <div class="face shadow face-diamond  ">
                        <div class="info">
                            <div class="t">Diamond</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="tab-pane fade" role="tabpanel" id="home" aria-labelledby="home-tab">
        <p>Home</p>
    </div>
</div>