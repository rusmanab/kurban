                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $coupon_id     = "";
                                    $coupon_name   = "";
                                    $code          = "";
                                    $shipping      = "";
                                    $star_date     = "";
                                    $end_date      = "";
                                    $coupon_type   = ""; 
                                    $value         = "";
                                                                       
                                    $isactive      = "";
                                    $image         = "";
                                    

                                    if (isset($coupon)){
                                        $coupon_id    = $coupon->id;
                                        $coupon_name  = $coupon->coupon_name;
                                        $code         = $coupon->code;
                                        $shipping     = $coupon->shipping;
                                        
                                        $star_date    = $coupon->star_date;                                        
                                        $end_date     = $coupon->end_date;
                                        $coupon_type  = $coupon->coupon_type;
                                        $isactive     = $coupon->isactive;
                                        $value        = $coupon->value;
                                        $image        = ROOT . $coupon->image;
                                        
                                        
                                    }
                                    
                                    
                                    $attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                                        
                                     echo form_open(site_url($urlBase.'/save'),$attributes);
                                    ?>
                                    <input type="hidden" name="id" id="id" value="<?php echo $coupon_id; ?>" />
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                            
                                                <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                                            <div class="actions btn-set">
                                                    <a href="<?php echo site_url($urlBase) ?>" id="back" class="btn default">
                                                        <i class="fa fa-angle-left"></i> Back</a>
                                                    <button class="btn btn-success" type="submit">
                                                        <i class="fa fa-check"></i> Save</button>
                                                   
                                                </div>
                                        </div>
                                        <div class="portlet-body">     
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('coupon_name')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="coupon_name" placeholder="" value="<?php echo  $coupon_name ?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('code')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="code" placeholder="" value="<?php echo  $code ?>"> 
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('shipping')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio mt-radio-outline">
                                                                <input type="radio" name="shipping" class="form-control" value="1" <?php echo $shipping == 1 && !empty($shipping) ? "checked":"" ?>/> Yes
                                                                <span></span> 
                                                            </label>
                                                            <label class="mt-radio mt-radio-outline">
                                                                <input type="radio" name="shipping" class="form-control" value="0" <?php echo $shipping == 0 || empty($shipping) ? "checked":"" ?>/> No
                                                                <span></span>
                                                            </label>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('coupon_type')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        
                                                        <select name="coupon_type" class="form-control"> 
                                                            <option value="0"><?php echo $this->lang->line('select_coupon_type')?></option>
                                                            <option value="1" <?php echo $coupon_type == 1 ? "selected" :"" ?> >Discount</option>
                                                            <option value="2" <?php echo $coupon_type == 2 ? "selected" :"" ?> >Price</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('value')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="value" placeholder="" value="<?php echo  $value ?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('star_date')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" >
                                                            <input type="text" class="form-control" name="star_date" value="<?php echo $star_date ?>" maxlength="10" >
                                                            <span class="input-group-btn"> <button class="btn default" type="button"><i class="fa fa-calendar"></i></button></span>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('end_date')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" >
                                                            <input type="text" class="form-control" name="end_date" value="<?php echo $end_date ?>" maxlength="10" >
                                                            <span class="input-group-btn"> <button class="btn default" type="button"><i class="fa fa-calendar"></i></button></span>
                                                        </div> 
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('isactive')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        
                                                        <select name="isactive" class="form-control"> 
                                                            <option value="1">Enabled</option>
                                                            <option value="2">Disabled</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <?php /* ?>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('image')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="controls">
                                                            <div class="fileinput fileinput-<?php echo $image ? "exists":"new" ?>" data-provides="fileinput">
                                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> 
                                                                <?php
                                                                */
                                                                /*if ($image){
                                                                echo '<img src="'.$image .'" alt="" />';
                                                                }
                                                                /*
                                                                ?>
                                                                </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="userfile"> </span>
                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                </div>
                                                            </div>
                  										</div>
                                                    </div>
                                                </div>
                                                <?php */ ?>
                                            </div>    
                                        </div>
                                    </div>
                                    <?php
                                    echo form_close();
                                    ?>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            </div>