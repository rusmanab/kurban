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
                                        <div class="portlet-body form">     
                                            <?php
                                  
                        				if (isset($post) ) {
                        				    
                        					foreach ($post as $xrow){
                                                $id                 = $xrow->id;
                                                $post_title         = $xrow->title;
                        						$post_description   = $xrow->desc; 
                                                $img                = ROOT . "/". $xrow->banner;
                                                $img_mobile         = ROOT . "/". $xrow->banner_mobile;
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
                                        $attributes = array('class' => 'input valid-normal form-horizontal myform', 'id' => 'myform', "name"=>"myform","enctype"=>"multipart/form-data");
                                                
                                        echo form_open(site_url($urlBase.'/save'),$attributes);
                                        
                                    ?>
                                       
                                        <input type="hidden" name="id" id="id" value="<?php echo (!empty($id) ? $id : ''); ?>" />
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label"><?php echo $this->lang->line('clothes_name')?> :
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    
                                                    <div class="mt-radio-inline">
                                                        <select name="product_id[]" class="form-control listcategory" multiple>
                                                            <?php foreach($products as $c){?>                                                                    
                                                            <option value="<?php echo $c->id?>" ><?php echo $c->text?></option>
                                                             <?php } ?>
                                                        </select> 
            										</div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-2 col-md-9">
                                                    <button class="btn blue" type="submit"><i class="icon-ok"></i> Save</button>
                                                    <button class="btn" type="button" id="btn-frmcancel">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                            			<?php
                                        echo form_close();
                                       ?>          
                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            </div>