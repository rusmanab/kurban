                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <?php
                                    $img                    = '';
                                    $clothes_name           = '';
                                    $sku                    = '';
                                    $price                  = '';
                                    $clothes_for            = '';
                                    $category_id            = '';
                                    $status                 = '';
                                    $clothes_description    = '';
                                    $meta_title             = '';
                                    $meta_keywords          = '';
                                    $meta_description       = '';
                                    
                                    if ( $clothes ){
                                        $clothes_name           = $clothes->post_title;
                                        $sku                    = $clothes->sku; 
                                        $price                  = $clothes->price; 
                                        $clothes_for            = $clothes->gender;
                                        $category_id            = $clothes->category_id;
                                        
                                        $status                 = $clothes->post_status;
                                        $clothes_description   = $clothes->post_description;
                                        
                                        $meta_title             = $clothes->meta_title; 
                                        $meta_keywords          = $clothes->meta_keywords ;
                                        $meta_description       = $clothes->meta_description;
                                        
                                    }
                                    
                                    
                                    $attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                                        
                                     echo form_open(site_url($urlBase.'/save'),$attributes);
                                    ?>
                                        <input type="hidden" name="id" id="id" value="<?php echo (!empty($id) ? $id : ''); ?>" />
                                        <div class="portlet">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                                                <div class="actions btn-set">
                                                    <button type="button" name="back" class="btn btn-secondary-outline">
                                                        <i class="fa fa-angle-left"></i> Back</button>
                                                    
                                                    <button class="btn btn-success" type="submit">
                                                        <i class="fa fa-check"></i> Save</button>
                                                   
                                                </div>
                                            </div>
                                            <div class="portlet-body">                                                
                                                <div class="col-md-12">
                                                    <div class="tabbable-bordered">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active">
                                                                <a href="#tab_general" data-toggle="tab"> General </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_meta" data-toggle="tab"> Meta </a>
                                                            </li>
                                                            
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab_general">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label"><?php echo $this->lang->line('clothes_name')?> :
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" class="form-control" name="post_title" placeholder="" value="<?php echo  $clothes_name ?>"> </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label"><?php echo $this->lang->line('sku')?> :
                                                                                    <span class="required"> * </span> 
                                                                                </label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" class="form-control" name="sku" placeholder="" value="<?php echo $sku?>"> </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label"><?php echo $this->lang->line('price')?> :
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" class="form-control" name="price" placeholder="" value="<?php echo  $price ?>"> </div> 
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label"><?php echo $this->lang->line('clothes_for')?> :
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-9">
                                                                                    <select class="table-group-action-input form-control input-medium" name="gender">
                                                                                        <option value="">Select...</option>
                                                                                        <option value="1" <?php echo $clothes_for==1 ? "selected":"" ?> ><?php echo $this->lang->line('man')?></option>
                                                                                        <option value="0" <?php echo $clothes_for==0 ? "selected":"" ?>><?php echo $this->lang->line('woman')?></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label"><?php echo $this->lang->line('category')?> :
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-9">
                                                                                    <select class="table-group-action-input form-control input-medium" name="category_id" id="category">
                                                                                        <option value="">Select...</option>
                                                                                        <?php
                                                                                        foreach($categories as $c){
                                                                                        ?>
                                                                                        <option value="<?php echo $c->id?>" <?php echo $category_id==$c->id ? "selected":"" ?>><?php echo $c->category_name?></option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                        
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label"><?php echo $this->lang->line('sub_category')?> :
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-9">
                                                                                    <select class="table-group-action-input form-control input-medium" name="sub_category_id" id="subcategory">
                                                                                        <option value="">Select...</option>
                                                                                        
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label">Status:
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-9">
                                                                                    <select class="table-group-action-input form-control input-medium" name="post_status">
                                                                                        <option value="">Select...</option>
                                                                                        <option value="1" <?php echo $status==1 ? "selected":"" ?>>Published</option>
                                                                                        <option value="0" <?php echo $status==0 ? "selected":"" ?>>Not Published</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
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
                                    										</div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Description:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <textarea class="form-control mytiny" name="post_description"><?php echo  $clothes_description ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <?php /*
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Short Description:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <textarea class="form-control" name="product[short_description]"></textarea>
                                                                            <span class="help-block"> shown in product listing </span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Available Date:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                                                                <input type="text" class="form-control" name="product[available_from]">
                                                                                <span class="input-group-addon"> to </span>
                                                                                <input type="text" class="form-control" name="product[available_to]"> </div>
                                                                            <span class="help-block"> availability daterange. </span>
                                                                        </div>
                                                                    </div> */ ?>
                                                                    
                                                                    <?php /*
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Tax Class:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <select class="table-group-action-input form-control input-medium" name="product[tax_class]">
                                                                                <option value="">Select...</option>
                                                                                <option value="1">None</option>
                                                                                <option value="0">Taxable Goods</option>
                                                                                <option value="0">Shipping</option>
                                                                                <option value="0">USA</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    */ ?>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab_meta">
                                                                <div class="form-body">
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Meta Title:</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control maxlength-handler" name="meta_title" maxlength="100" placeholder="" value="<?php echo $meta_title ?>">
                                                                            <span class="help-block"> max 100 chars </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Meta Keywords:</label>
                                                                        <div class="col-md-10"> 
                                                                            <textarea class="form-control maxlength-handler" rows="8" name="meta_keywords" maxlength="1000"><?php echo $meta_keywords?></textarea>
                                                                            <span class="help-block"> max 1000 chars </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Meta Description:</label>
                                                                        <div class="col-md-10">
                                                                            <textarea class="form-control maxlength-handler" rows="8" name="meta_description" maxlength="255"><?php echo $meta_description?></textarea>
                                                                            <span class="help-block"> max 255 chars </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>