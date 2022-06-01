                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                            
                                             <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                                            <div class="tools">
                                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                                                <a class="fullscreen" href="" data-original-title="" title=""> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body">   
                                            <?php
                            				if (isset($web) ) {
                            					foreach ($web as $xrow){
                            					    $id       = $xrow->id;
                                                    $wname    = $xrow->title;
                                                    $deskripsi= $xrow->deskripsi;
                            						$setting  = unserialize($xrow->value);                                                
                                                    $sosmed   = unserialize($xrow->sosmed);
                                                    $wiget    = unserialize($xrow->wiget);
                            					}
                                                $address =  nl2br_except_pre( isset($setting['address'])?$setting['address']:"");
                                               
                                                $email   = isset($setting['email'])?$setting['email']:"";
                                                $email_r = isset($setting['email_r'])?$setting['email_r']:"";
                                                $ym      = isset($setting['ym'])?$setting['ym']:"";
                                                $fax     = isset($setting['fax'])?$setting['fax']:"";
                                                $phone   = isset($setting['phone'])?$setting['phone']:"";
                                                
                                                $instagram = isset($sosmed['instagram'])?$sosmed['instagram']:"";
                                                $facebook= isset($sosmed['facebook'])?$sosmed['facebook']:"";
                                                $twitter = isset($sosmed['twitter'])?$sosmed['twitter']:"";
                                                $googleplus =isset($sosmed['google-plus'])?$sosmed['google-plus']:"";                                            
                                                $youtube    = isset($sosmed['youtube'])?$sosmed['youtube']:"";
                                                $skype      = isset($sosmed['skype'])?$sosmed['skype']:"";
                                                $fbcode     = isset($wiget['fbcode'])?$wiget['fbcode']:"";
                                                $twcode     = isset($wiget['twcode'])?$wiget['twcode']:"";
                            				}else{
                            				    $id         = set_value('id');
                            				    $wname      = set_value('wname');
                            				    $address    = set_value('address');
                                                $email      = set_value('email');
                                                $email_r    = set_value('email_r');
                                                $ym         = set_value('ym');
                                                $phone      = set_value('phone');
                                                $fax        = set_value('fax');
                                                $deskripsi  = set_value('deskripsi');
                                                
                                                $instagram  = set_value('instagram');
                                                $facebook   = set_value('facebook');
                                                $twitter    = set_value('twitter');
                                                $googleplus = set_value('googleplus');
                                                $youtube    = set_value('youtube');
                                                $skype      = set_value('skype');
                                                $fbcode     = set_value('fbcode');
                                                $twcode     = set_value('twcode');
                            				}
                            			     ?> 
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab_1_1" data-toggle="tab"> Website </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_2" data-toggle="tab"> Social Media </a>
                                                </li>
                                                
                                            </ul>
                                            <?php
                                                $attributes = array('class' => 'input valid-normal horizontal-form myform', 'id' => 'myform', "name"=>"myform","enctype"=>"multipart/form-data");
                                                        
                                                echo form_open(site_url($urlBase.'/save'),$attributes);
                                                
                                            ?>
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="tab_1_1">
                                                    <?php $u=form_error('wname');?>
                                                    <div class="form-group<?php echo $u ? " error":"" ?>">
    								                    <label><?php echo $this->lang->line('website_name') ?> <span class="required">*</span></label>
                        								<input type="text" placeholder="<?php echo $this->lang->line('website_name') ?>" name="wname" id="wname" class="form-control" value="<?php echo $wname; ?>" />
                        								<?php echo $u; ?>  	                    								    
                    								</div>
                                                    
                                                    <?php $u=form_error('email');?>
                                                     <div class="form-group<?php echo $u ? " error":"" ?>">
    								                    <label><?php echo $this->lang->line('email') ?> <span class="required">*</span></label>
                        								<input type="text" placeholder="<?php echo $this->lang->line('email') ?>" name="email" id="email" class="form-control" value="<?php echo $email; ?>" />
                       									<?php echo $u; ?>  
                    								</div>
                                                    <?php $u=form_error('address');?>                               
                                                    <div class="form-group<?php echo $u ? " error":"" ?>">
                    									<label><?php echo $this->lang->line('address') ?> <span class="required">*</span></label>
    								                    <textarea name="address" id="address" class="address form-control" rows="3"><?php echo $address ?></textarea>
           										        <?php echo $u; ?>   
    								                </div>
                                                    <?php $u=form_error('deskripsi');?>   
                                                    <div class="form-group<?php echo $u ? " error":"" ?>">
    								                    <label>Description <span class="required">*</span></label>
                                                        <textarea name="deskripsi" class="form-control" rows="3" ><?php echo $deskripsi; ?></textarea>
                        								<?php echo $u; ?>      								
                    								</div>
                                                    
                                                    <?php $u=form_error('email_r');?>
                                                     <div class="form-group<?php echo $u ? " error":"" ?>">
    								                    <label><?php echo $this->lang->line('email_recipient') ?> <span class="required">*</span></label>
                        								<input type="text" placeholder="<?php echo $this->lang->line('email_recipient') ?>" name="email_r" id="email_r" class="form-control" value="<?php echo $email_r; ?>" />
                        								<span class="help-block small">For recipient massege from contact page. Use koma (,), for more email</span>
                                                        <?php echo $u; ?>  
                    								</div>
                                                    <?php $u=form_error('phone');?>
                                                     <div class="form-group<?php echo $u ? " error":"" ?>">
    								                    <label><?php echo $this->lang->line('phone_number') ?> <span class="required">*</span></label>
                        								<input type="text" placeholder="081234345" name="phone" id="phone" class="form-control" value="<?php echo $phone; ?>" />
                       									<span class="help-block small">Use koma (,), for more Phone</span>
                                                        <?php echo $u; ?>  	
                    								</div>
                                                    <?php $u=form_error('fax');?>
                                                     <div class="form-group<?php echo $u ? " error":"" ?>">
    								                    <label>Fax <span class="required">*</span></label>
                        								<input type="text" placeholder="081234345" name="fax" id="fax" class="form-control" value="<?php echo $fax; ?>" />
                       									<span class="help-block small">Use koma (,), for more fax</span>
                                                        <?php echo $u; ?>  	
                    								</div>
                                                </div>
                                                <div class="tab-pane fade" id="tab_1_2">
                                                    <div class="form-group">
    								                    <label>Facebook</label>
                        								<input type="text" placeholder="Facebook" name="facebook" id="facebook" class="form-control" value="<?php echo $facebook; ?>" />
                    								</div>
                                                    <div class="form-group">
    								                    <label>Twitter</label>
                        								<input type="text" placeholder="Twitter" name="twitter" id="twitter" class="form-control" value="<?php echo $twitter; ?>" />
                        								
                    								</div> 
                                                    <div class="form-group">
    								                    <label>Google+</label>
                        								<input type="text" placeholder="Google+" name="googleplus" id="googleplus" class="form-control" value="<?php echo $googleplus; ?>" />
                    								</div>   
                                                    <div class="form-group">
    								                    <label>Youtube</label>
                        								<input type="text" placeholder="Youtube" name="youtube" id="youtube" class="form-control" value="<?php echo $youtube; ?>" />
                    								</div> 
                                                    <div class="form-group">
    								                    <label>Instagram</label>
                        								<input type="text" placeholder="Instagram" name="instagram" id="instagram" class="form-control" value="<?php echo $instagram; ?>" />
                    								</div>
                                                </div>
                                            </div>
                                            <button class="btn btn-default" type="button" id="btn-save"><i class="icon-ok"></i> Save</button>
										    <button class="btn" type="button" id="btn-frmcancel">Cancel</button>
										
                                			<?php
                                            echo form_close(); ?>          
                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            </div>