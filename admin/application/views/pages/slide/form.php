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
                                  
                        				if (isset($post) ) {
                        				    
                        					foreach ($post as $xrow){
                                                $id                 = $xrow->id;
                                                $post_title         = $xrow->title;
                        						$post_description   = $xrow->desc;     
                                                $img                = ROOT . "/". $xrow->image;
                                                $img_mobile         = ROOT . "/". $xrow->image_mobile;
                        					}
                                            
                        				}else{
                        				    $id                 = set_value('id');
                                            $post_title         = set_value('post_title');
                        					$post_description   = set_value('post_description'); 
                                            $img                = '';  
                                            $img_mobile         = '';                   
                        				}
                        			?>
                                    <?php
                                        $attributes = array('class' => 'input valid-normal horizontal-form myform', 'id' => 'myform', "name"=>"myform","enctype"=>"multipart/form-data");
                                                
                                        echo form_open(site_url($urlBase.'/save'),$attributes);
                                        
                                    ?>
                                       
                                        <input type="hidden" name="id" id="id" value="<?php echo (!empty($id) ? $id : ''); ?>" />
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php
                                                $u=form_error('post_title');
                                                ?>
                                                <div class="form-group<?php echo $u ? " error":"" ?>">
            										<label><?php echo $this->lang->line('post_title') ?> <span class="required">*</span></label>
            										<input type="text" placeholder="<?php echo $this->lang->line('post_title') ?>" name="title" id="title" class="form-control" value="<?php echo $post_title; ?>" maxlength="255" />
            										<?php echo $u; ?> 
            									</div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group">
           										   <label><?php echo $this->lang->line('publish') ?></label>
           										   <div class="mt-radio-inline">
                                                        <label>
                                                            <input type="radio" value="1" name="status" checked /> Yes 
                                                        </label>
                                                        <label>
                                                            <input type="radio" value="0" name="status" /> No
                                                        </label>
         											    <?php echo $u; ?>    
            										</div>
             									</div>
                                            </div>                                          
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php
                                                $u=form_error('post_description'); 
                                                ?>
                                                <div class="form-group<?php echo $u ? " error":"" ?>">
            										<label><?php echo $this->lang->line('post_description') ?> <span class="required">*</span></label>
            										<textarea name="desc" id="desc" class="form-control desc"><?php echo $post_description; ?></textarea>
            										<?php echo $u; ?>  
            									</div>
                                            </div>    
                                            <div class="col-md-4">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="control-group">
                    										<label class="control-label"><?php echo $this->lang->line('post_image') ?></label>
                    										<div class="controls">
                                                                <div class="fileinput fileinput-<?php echo $img ? "exists":"new" ?>" data-provides="fileinput">
                                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> 
                                                                        <?php
                                                                        if ($img){
                                                                            echo '<img src="'.$img .'" alt="" />';
                                                                        }
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
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger">* .jpg,.png,.jpeg, Max 4Mb</span>
                                                                </div>
                    										</div>
                    									</div>
                                                        <div class="control-group margin-top-10">
                    										<label class="control-label"><?php echo $this->lang->line('post_image') ?>(Mobile version)</label>
                    										<div class="controls">
                                                                <div class="fileinput fileinput-<?php echo $img_mobile ? "exists":"new" ?>" data-provides="fileinput">
                                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> 
                                                                        <?php
                                                                        if ($img_mobile){
                                                                            echo '<img src="'.$img_mobile .'" alt="" />';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file" name="imageMobile"> </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger">* .jpg,.png,.jpeg, Max 4Mb</span>
                                                                </div>
                    										</div>
                    									</div>
                                                    </div>                                                
                                                </div>
                                                
                                            </div>                                         
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                           
           										   <label><?php echo $this->lang->line('category')?></label>
           										   <div class="mt-radio-inline">
                                                        <select name="category_id[]" class="form-control listcategory" multiple>
                                                            <?php foreach($categories as $c){?>                                                                    
                                                            <option value="<?php echo $c->category_id?>" selected="selected" data-id="<?php echo $c->id?>"><?php echo $c->category_name?></option>
                                                             <?php } ?>
                                                        </select> 
            										</div>
             									</div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
           										   <label>Link Target</label>
           										   <div class="mt-radio-inline">
                                                        <textarea name="link_target" id="link_target" class="form-control"></textarea>  
            										</div>
             									</div>
                                            </div>
                                        </div>
                                        <button class="btn blue" type="submit"><i class="icon-ok"></i> Save</button>
                                        <button class="btn" type="button" id="btn-frmcancel">Cancel</button>
										
                            			<?php
                                        echo form_close();
                                       ?>          
                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            </div>