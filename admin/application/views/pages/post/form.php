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
                                                $post_title         = $xrow->post_title;
                        						$post_description   = $xrow->post_description;                                                
                                                $post_order         = $xrow->post_order;
                                                $img                = ROOT . "/". $xrow->post_image;
                                                $categoryid         = $xrow->category_id;
                        					}
                                            
                        				}else{
                        				    $id                 = set_value('id');
                                            $post_title         = set_value('post_title');
                        					$post_description   = set_value('post_description');                                               
                                            $post_order         = set_value('post_order');
                                            $img                = '';                                           
                                            $categoryid         = set_value('category_id');
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
            										<input type="text" placeholder="<?php echo $this->lang->line('post_title') ?>" name="post_title" id="post_title" class="form-control" value="<?php echo $post_title; ?>" maxlength="255" />
            										<?php echo $u; ?> 
            									</div>
                                            </div> 
                                            <div class="col-md-4">
                                                <?php
                                                $u=form_error('category_id');
                                                ?>
                                                <div class="form-group<?php echo $u ? " error":"" ?>">
            										<label><?php echo $this->lang->line('category_name') ?> <span class="required">*</span></label>
            										<select name="category_id" id="category_id" class="form-control">
                                                        <option value="">-- Category --</option>
                                                     <?php foreach($categories as $c){ ?>   
                                                        <option value="<?php echo $c->id ?>" <?php echo $c->id == $categoryid? "selected" : "" ?> ><?php echo $c->category_name ?></option> 
                                                     <?php } ?>
                                                    </select>
            										<?php echo $u; ?>
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
            										<textarea name="post_description" id="post_description" class="form-control post_description"><?php echo $post_description; ?></textarea>
            										<?php echo $u; ?>  
            									</div>
                                            </div>    
                                            <div class="col-md-4">
                                                <div class="form-group">
           										   <label><?php echo $this->lang->line('publish') ?></label>
           										   <div class="mt-radio-inline">
                                                        <label>
                                                            <input type="radio" value="1" name="post_status" checked /> Yes 
                                                        </label>
                                                        <label>
                                                            <input type="radio" value="0" name="post_status" /> No
                                                        </label>
         											    <?php echo $u; ?>    
            										</div>
             									</div>
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
                                                                    <span class="label label-danger">Image type .jpg,.png,.jpeg, Max 4Mb</span>
                                                                </div>
                    										</div>
                    									</div>
                                                    </div>                                                
                                                </div>
                                            </div>                                         
                                        </div>
                                        
                                        <button class="btn btn-default" type="submit"><i class="icon-ok"></i> Save</button>
                                        <button class="btn" type="button" id="btn-frmcancel">Cancel</button>
										
                            			<?php
                                        echo form_close();
                                       ?>          
                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            </div>