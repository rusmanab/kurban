                        <!-- BEGIN PAGE CONTENT INNER -->                                                    

                            <div class="row">

                                <div class="col-md-12">

                                    <!-- BEGIN Portlet PORTLET-->

                                    <div class="portlet light bordered">

                                        <div class="portlet-title">

                                            <div class="caption">

                                                <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>

                                            <div class="tools">

                                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>

                                                <a class="fullscreen" href="" data-original-title="" title=""> </a>

                                                <a class="remove" href="javascript:;" data-original-title="" title=""> </a>

                                            </div>

                                        </div>

                                        <div class="portlet-body form">

                                            

                                            <?php           

                                                $password = "";                       

                                                if (isset($user)){

                                                    foreach($user as $profile){

                                                        $userid      = $profile->id;

                                                        $full_name      = $profile->full_name;

                                                        $phone_number   = $profile->phone_number;

                                                        $email          = $profile->email;

                                                        $level_id       = $profile->level_id;

                                                        $website        = $profile->website;

                                                        $address        = $profile->address;

                                                        $about          = $profile->about;

                                                        $username       = $profile->username;

                                                        

                                                        $avatar         = ROOT . ($profile->avatar); 

                                                       

                                                        if (!@getimagesize($avatar)){

                                                            $avatar = ROOT . ('assets/themes/metronic/pages/media/profile/profile_user.jpg');

                                                        }

                                                        

                                                    }

                                                }else{

                                                        $userid         = set_value('id');     

                                                        $full_name      = set_value('full_name');

                                                        $phone_number   = set_value('phone_number');

                                                        $email          = set_value('email');

                                                        $level_id       = set_value('level_id');

                                                        $website        = set_value('website');

                                                        $address        = set_value('address');

                                                        $about          = set_value('about');

                                                        $avatar         = set_value('avatar'); //base_url('assets/themes/metronic/pages/media/profile/profile_user.jpg');

                                                }

                                                

                                                

                                                

                                            ?>

                                                

                                                <div class="form-body">

                                                    <div class="row">

                                                        <div class="col-md-3">

                                                            

                                                            <div class="controls">

                                                                <div class="fileinput fileinput-<?php echo $avatar ? "exists":"new" ?>" data-provides="fileinput">

                                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> 

                                                                        <?php

                                                                        if ($avatar){

                                                                            echo '<img src="'. $avatar .'" alt="" />';

                                                                            

                                                                        }

                                                                        ?>

                                                                    </div>

                                                                    

                                                                </div>

                                                                

                                                            </div>

                                                        </div>

                                                        <div class="col-md-9">

                                                            <ul class="nav nav-tabs">

                                                                <li class="active">

                                                                    <a href="#tab_1_1" data-toggle="tab"> <?php echo $this->lang->line('profile')?> </a> 

                                                                </li>

                                                                <li>

                                                                    <a href="#changeAvatar" data-toggle="tab"> <?php echo $this->lang->line('change_avatar')?></a>

                                                                </li>

                                                                <li>

                                                                    <a href="#changePassword" data-toggle="tab"> <?php echo $this->lang->line('change_password')?></a>

                                                                </li>

                                                                

                                                            </ul>

                                                            <div class="tab-content">

                                                                <div class="tab-pane fade active in" id="tab_1_1">

                                                                    

                                                                    <?php

                                                                    $attributes = array('class' => 'form-horizontal myform', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");

                                                        

                                                                    echo form_open(site_url($urlBase.'/profilesave'),$attributes);

                                                                    ?>

                                                                    <input type="hidden" name="id" id="id" value="<?php echo $userid ?>" />

                                                                    <input type="hidden" name="avatar" value="<?php echo $avatar ?>" />

                                                                    <?php $u=form_error('full_name'); ?>

                                                                    <div class="form-body">

                                                                        <div class="form-group <?php echo !empty($u) ? "has-error" : "" ?>">

                                                                            <label class="col-md-3 control-label"><?php echo $this->lang->line('full_name')?> <span class="required">*</span></label>

                                                                            <div class="col-md-9">

                                                                                <input type="text" placeholder="John" name="full_name" class="form-control" value="<?php echo $full_name ?>" />

                                                                                <?php echo $u; ?> 

                                                                            </div> 

                                                                        </div>

                                                                        <?php $u=form_error('phone_number'); ?>

                                                                        <div class="form-group <?php echo !empty($u) ? "has-error" : "" ?>">

                                                                            <label class="col-md-3 control-label"><?php echo $this->lang->line('phone_number')?> <span class="required">*</span></label>

                                                                            <div class="col-md-4">

                                                                                <input type="text" placeholder="+1 646 580 (6284)" name="phone_number" class="form-control" value="<?php echo $phone_number?>" />

                                                                                <?php echo $u; ?>  

                                                                            </div>

                                                                        </div>

                                                                        <?php $u=form_error('email'); ?>

                                                                        <div class="form-group <?php echo !empty($u) ? "has-error" : "" ?>">

                                                                            <label class="col-md-3 control-label"><?php echo $this->lang->line('email')?> <span class="required">*</span></label>

                                                                            <div class="col-md-9">

                                                                                <input type="text" placeholder="" class="form-control" name="email" value="<?php echo $email?>" />

                                                                                <?php echo $u; ?> 

                                                                            </div>  

                                                                        </div>

                                                                        <?php $u=form_error('level_id'); ?>

                                                                        <div class="form-group <?php echo !empty($u) ? "has-error" : "" ?>">

                                                                            <label class="col-md-3 control-label"><?php echo $this->lang->line('level')?> <span class="required">*</span></label>

                                                                            <div class="col-md-9">

                                                                                

                                                                                <select name="level_id" id="level_id" class="form-control">

                                                                                    <?php foreach($levels as $l){?> 

                                                                                    <option value="<?php echo $l->id?>" <?php echo $level_id == $l->id ? "selected" : "" ?>><?php echo $l->level_name?></option>

                                                                                    <?php } ?>

                                                                                </select>

                                                                                <?php echo $u; ?> 

                                                                            </div>  

                                                                        </div>

                                                                        <div class="form-group">

                                                                            <label class="col-md-3 control-label"><?php echo $this->lang->line('website')?></label>

                                                                            <div class="col-md-9">

                                                                                <input type="text" placeholder="" class="form-control" name="website" value="<?php echo $website?>" />

                                                                                <?php echo $u; ?> 

                                                                            </div>  

                                                                        </div>

                                                                

                                                                        <?php $u=form_error('address'); ?>

                                                                        <div class="form-group <?php echo !empty($u) ? "has-error" : "" ?>">

                                                                            <label class="col-md-3 control-label"><?php echo $this->lang->line('address')?></label> 

                                                                            <div class="col-md-9">

                                                                                <textarea class="form-control" rows="3" name="address" ><?php echo $address ?></textarea>

                                                                                <?php echo $u; ?> 

                                                                            </div> 

                                                                        </div>

                                                                        <div class="form-group">

                                                                            <label class="col-md-3 control-label"><?php echo $this->lang->line('about')?></label>

                                                                            <div class="col-md-9">

                                                                                <textarea class="form-control" rows="3" name="about"><?php echo $about ?></textarea>

                                                                            </div> 

                                                                        </div>

                                                                    </div>

                                                                    <div class="form-actions fluid">

                                                                        <div class="row">

                                                                            <div class="col-md-offset-3 col-md-9">

                                                                                <button class="btn green" type="submit"><?php echo $this->lang->line('update')?></button>

                                                                                <button class="btn default" type="button" id="btn-frmcancel"><?php echo $this->lang->line('batal')?></button>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <?php

                                                                    echo form_close();

                                                                    ?>

                                                                </div>

                                                                

                                                                

                                                                <div class="tab-pane fade" id="changeAvatar">

                                                                    <?php

                                                                    $attributes = array('class' => 'form-horizontal myform', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");

                                                        

                                                                    echo form_open(site_url($urlBase.'/profilechangeavatar'),$attributes);

                                                                    ?>

                                                                    <input type="hidden" name="userid" value="<?php echo $userid?>" />

                                                                    <div class="form-body">

                                                                        <div class="form-group">

                                                                            <label class="col-md-3 control-label"><?php echo $this->lang->line('avatar')?></label>

                                                                            <div class="col-md-9">

                                                                                 <div class="controls">

                                                                                    <div class="fileinput fileinput-<?php echo $avatar ? "exists":"new" ?>" data-provides="fileinput">

                                                                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> 

                                                                                            <?php

                                                                                            if ($avatar){

                                                                                                echo '<img src="'. $avatar .'" alt="" />';

                                                                                            }

                                                                                            ?>

                                                                                        </div>

                                                                                        <div>

                                                                                            <span class="btn default  btn-file">

                                                                                                <span class="fileinput-new"> Select image </span>

                                                                                                <span class="fileinput-exists"> Change </span>

                                                                                                <input type="file" name="userfile"> </span>

                                                                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>

                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="clearfix margin-top-10">

                                                                                        <span class="label label-danger">Image type .jpg,.png,.jpeg, Max 4Mb</span>

                                                                                    </div>

                                                                                </div>

                                                                            </div>  

                                                                        </div>

                                                                    </div>

                                                                    <div class="form-actions fluid">

                                                                        <div class="row">

                                                                            <div class="col-md-offset-3 col-md-9">

                                                                                <button class="btn green" type="submit"><?php echo $this->lang->line('update')?></button>

                                                                                <button class="btn default" type="button" id="btn-frmcancel"><?php echo $this->lang->line('batal')?></button>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <?php

                                                                    echo form_close();

                                                                    ?>

                                                                </div>

                                                                

                                                                <div class="tab-pane fade" id="changePassword">

                                                                    <?php

                                                                    $attributes = array('class' => 'form-horizontal myform', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");

                                                        

                                                                    echo form_open(site_url($urlBase.'/profilechangepassword'),$attributes);

                                                                    ?>

                                                                    <input type="hidden" name="userid2" value="<?php echo $userid?>" />

                                                                    <div class="form-body">

                                                                    

                                                                        <?php $u=form_error('password'); ?>

                                                                        <div class="form-group <?php echo !empty($u) ? "has-error" : "" ?>">

                                                                            <label class="col-md-3 control-label"><?php echo $this->lang->line('password')?> <span class="required">*</span></label>

                                                                            <div class="col-md-9">

                                                                                <input type="password" placeholder="John" name="newpassword" class="form-control" value="<?php echo $password ?>" />

                                                                                <?php echo $u; ?> 

                                                                            </div> 

                                                                        </div>

                                                                        <?php $u=form_error('retypepassword'); ?>

                                                                        <div class="form-group <?php echo !empty($u) ? "has-error" : "" ?>">

                                                                            <label class="col-md-3 control-label"><?php echo $this->lang->line('confirm_password')?> <span class="required">*</span></label>

                                                                            <div class="col-md-9">

                                                                                <input type="password" placeholder="John" name="retypepassword" class="form-control" value="<?php echo $password ?>" />

                                                                                <?php echo $u; ?> 

                                                                            </div> 

                                                                        </div>

                                                                    </div>

                                                                    <div class="form-actions fluid">

                                                                        <div class="row">

                                                                            <div class="col-md-offset-3 col-md-9">

                                                                                <button class="btn green" type="submit"><?php echo $this->lang->line('update')?></button>

                                                                                <button class="btn default" type="button" id="btn-frmcancel"><?php echo $this->lang->line('batal')?></button>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <?php

                                                                    echo form_close();

                                                                    ?>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                        </div>

                                    </div>

                                    <!-- END Portlet PORTLET-->

                                </div>

                            </div>

                        

                        <!-- END PAGE CONTENT INNER -->



        