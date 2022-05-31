                         <?php
           
                        









                        if (!empty($userprofile)){
                            foreach($userprofile as $profile){
                                $nama           = $profile->full_name;
                                $telp           = $profile->phone_number;
                                $email          = $profile->email;
                                $alamat         = $profile->address;                                
                                $website        = $profile->website;                                
                                $about          = $profile->about;
                                
                                $provinsi_id    = $profile->provinsi_id;
                                $kota_id        = $profile->kota_id;    
                                $avatar         = ROOT . $profile->avatar; 
                                
                                if (!@getimagesize($avatar)){
                                    $avatar = base_url('assets/themes/default/pages/media/profile/profile_user.jpg');
                                }
                                
                            }
                            
                        }else{
                                $nama           = "";
                                $telp           = "";
                                $email          = "";                                
                                $alamat         = "";
                                $website        = "";                                
                                $about          = "";                                
                                $provinsi_id    = "";
                                $kota_id        = "";
                                $avatar         = base_url('assets/themes/default/pages/media/profile/profile_user.jpg');
                        }
                        
                        
                        ?>
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                           <?php
                           
                            
                                    $msg_type   = $this->session->flashdata('msg_type');
                                    $msg_content= $this->session->flashdata('msg_content');
                                    
                                    $icon = "";
                                    $alert = "";
                                    
                                    if ($msg_type){
                                        if ($msg_type=='danger'){
                                            $icon = '<i class="fa fa-exclamation"></i> '.$msg_content;
                                        }else{
                                            $icon = '<i class="fa fa-check"></i> '.$msg_content;
                                        }
                                    }    
                                    if ($msg_type){
                                        $alert = $msg_type;                                        
                                    }
                                    
                                    if ($alert){
                                        echo "<div class='alert alert-".$alert."'>".$icon."</div>";
                                    }
                                    ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PROFILE SIDEBAR -->
                                    <div class="profile-sidebar">
                                        <!-- PORTLET MAIN -->
                                        <div class="portlet light profile-sidebar-portlet ">
                                            <!-- SIDEBAR USERPIC -->
                                            <div class="">
                                                <img src="<?php echo $avatar ?>" class="img-responsive" alt=""> </div>
                                            <!-- END SIDEBAR USERPIC -->
                                            <!-- SIDEBAR USER TITLE -->
                                            <div class="profile-usertitle">
                                                <div class="profile-usertitle-name"> <?php echo $nama ?> </div>
                                                <div class="profile-usertitle-job"> <?php echo $email ?> </div>
                                            </div>
                                            <!-- END SIDEBAR USER TITLE -->
                                            
                                        </div>
                                        <!-- END PORTLET MAIN -->
                                    </div>
                                    <!-- END BEGIN PROFILE SIDEBAR -->
                                    <!-- BEGIN PROFILE CONTENT -->
                                    <div class="profile-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet light ">
                                                    <div class="portlet-title tabbable-line">
                                                        <div class="caption caption-md">
                                                            <i class="icon-globe theme-font hide"></i>
                                                            <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                        </div>
                                                        <ul class="nav nav-tabs">
                                                            <li class="active">
                                                                <a href="#tab_1_1" data-toggle="tab"><?php echo $this->lang->line('info_personal')?></a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_1_2" data-toggle="tab"><?php echo $this->lang->line('ubah_avatar')?></a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_1_3" data-toggle="tab"><?php echo $this->lang->line('ubah_password')?></a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="tab-content">
                                                            <!-- PERSONAL INFO TAB -->
                                                            <div class="tab-pane active" id="tab_1_1">
                                                                
                                                                <?php
                                                                $attributes = array('class' => 'myform', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                                        
                                                                echo form_open(site_url($urlBase.'/save'),$attributes);
                                                                ?>
                                                                    <div class="form-group">
                                                                        <label class="control-label"><?php echo $this->lang->line('full_name') ?> </label>
                                                                        <input type="text" placeholder="John" name="full_name" class="form-control" value="<?php echo $nama?>" /> </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label class="control-label"><?php echo $this->lang->line('phone_number') ?></label>
                                                                        <input type="text" placeholder="+1 646 580 DEMO (6284)" name="phone_number" class="form-control" value="<?php echo $telp?>" /> </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label class="control-label"><?php echo $this->lang->line('email') ?></label>
                                                                        <input type="text" placeholder="" class="form-control" name="email" value="<?php echo $email?>" /> </div>
                                                                   
                                                                    <div class="form-group">
                                                                        <label class="control-label"><?php echo $this->lang->line('address') ?></label>
                                                                        <textarea class="form-control" rows="3" name="address" ><?php echo $alamat ?></textarea>
                                                                    </div>
                                                                    
                                                                    <div class="margiv-top-10">
                                                                        <button class="btn green" type="submit">Save Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- END PERSONAL INFO TAB -->
                                                            <!-- CHANGE AVATAR TAB -->
                                                            <div class="tab-pane" id="tab_1_2">
                                                                
                                                                <?php
                                                                $attributes = array('class' => 'myform', 'id' => 'myform2','role'=>'form', "name"=>"myform2","enctype"=>"multipart/form-data");
                                                        
                                                                echo form_open(site_url($urlBase.'/changeavatar'),$attributes);
                                                                ?>
                                                                    <div class="form-group">
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                                <img src="<?php echo $avatar ?>" alt="" /> </div>
                                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                            <div>
                                                                                <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> <?php echo $this->lang->line('pilih_gambar')?> </span>
                                                                                    <span class="fileinput-exists"> <?php echo $this->lang->line('ubah')?> </span>
                                                                                    <input type="file" name="userfile"> </span>
                                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> <?php echo $this->lang->line('remove')?> </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="margin-top-10">
                                                                        <button class="btn green" type="submit">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- END CHANGE AVATAR TAB -->
                                                            <!-- CHANGE PASSWORD TAB -->
                                                            <div class="tab-pane" id="tab_1_3">
                                                                <?php
                                                                $attributes = array('class' => 'myform', 'id' => 'myform3','role'=>'form', "name"=>"myform3" );
                                                        
                                                                echo form_open(site_url($urlBase.'/changepassword'),$attributes);
                                                                ?>
                                                                    <div class="form-group">
                                                                        <label class="control-label"><?php echo $this->lang->line('password_sekarang')?></label>
                                                                        <input type="password" name="oldpass"  class="form-control" required /> </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label"><?php echo $this->lang->line('password_baru')?></label>
                                                                        <input type="password" name="newpass" class="form-control" required /> </div>
                                                                    <div class="form-group"> 
                                                                        <label class="control-label"><?php echo $this->lang->line('ketik_ulang_pass')?> </label>
                                                                        <input type="password" name="repass" class="form-control" required /> </div>
                                                                    <div class="margin-top-10">
                                                                        <button class="btn green" type="submit"><?php echo $this->lang->line('submit')?></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- END CHANGE PASSWORD TAB -->
                                                            
                                                            <!-- CHANGE USERNAME -->
                                                            
                                                            <!-- CHANGE PASSWORD TAB -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PROFILE CONTENT -->
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                   