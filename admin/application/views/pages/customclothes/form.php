                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <?php
                                    $post_id                = '';
                                    $img                    = '';
                                    $clothes_name           = '';
                                    $sku                    = '';
                                    $price                  = '';
                                    $clothes_for            = '';
                                    $category_id            = '';
                                    $sub_category_id        = '';
                                    $status                 = '';
                                    $clothes_description    = '';
                                    $meta_title             = '';
                                    $meta_keywords          = '';
                                    $meta_description       = '';
                                    
                                    if ( $clothes ){
                                        $id                     = $clothes->id;
                                        $post_id                = $clothes->post_id;
                                        $clothes_name           = $clothes->post_title;
                                        $sku                    = $clothes->sku; 
                                        $price                  = $clothes->price; 
                                        //$clothes_for            = $clothes->gender;
                                        $category_id            = $clothes->category_id;
                                        //$sub_category_id        = $clothes->sub_category_id;
                                        $status                 = $clothes->post_status;
                                        $clothes_description    = $clothes->post_description;
                                        $img                    = ROOT . ($clothes->post_image);
                                        $meta_title             = $clothes->meta_title; 
                                        $meta_keywords          = $clothes->meta_keywords ;
                                        $meta_description       = $clothes->meta_description;
                                        
                                    }
                                    
                                    
                                    $attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                                        
                                    echo form_open(site_url($urlBase.'/save'),$attributes);
                                    ?>
                                        <input type="hidden" name="id" id="id" value="<?php echo (!empty($id) ? $id : ''); ?>" />
                                        <input type="hidden" name="postid" id="postid" value="<?php echo $post_id; ?>" />
                                        <div class="portlet">
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
                                                <div class="col-md-12">
                                                    <div class="tabbable-bordered">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active">
                                                                <a href="#tab_general" data-toggle="tab"> General </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_meta" data-toggle="tab"> Data </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_discount" data-toggle="tab"> Discount </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_images" data-toggle="tab"> Images </a>
                                                            </li>
                                                            
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab_general">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="col-md-2 control-label"><?php echo $this->lang->line('clothes_name')?> :
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-10">
                                                                                    <input type="text" class="form-control" name="post_title" placeholder="" value="<?php echo  $clothes_name ?>"> </div>
                                                                            </div>
                                                                            
                                                                            
                                                                            <div class="form-group">
                                                                                <label class="col-md-2 control-label">Status:
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-10">
                                                                                    <select class="table-group-action-input form-control input-medium" name="post_status">
                                                                                        <option value="">Select...</option>
                                                                                        <option value="1" <?php echo $status==1 ? "selected":"" ?>>Published</option>
                                                                                        <option value="0" <?php echo $status==0 ? "selected":"" ?>>Not Published</option>
                                                                                    </select>
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
                                                                        <label class="col-md-2 control-label"><?php echo $this->lang->line('sku')?> :
                                                                            <span class="required"> * </span> 
                                                                        </label>
                                                                    <div class="col-md-10">
                                                                        <input type="text" class="form-control" name="sku" placeholder="" value="<?php echo $sku?>"> </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label"><?php echo $this->lang->line('price')?> :
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control" name="price" id="proprice" placeholder="" value="<?php echo  $price ?>"> </div> 
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label"><?php echo $this->lang->line('category')?> :
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <select class="table-group-action-input form-control input-medium" name="category_id" id="category">
                                                                            <option value="">Select...</option>
                                                                            <?php
                                                                            foreach($categories as $c){
                                                                            ?>
                                                                            <option value="<?php echo $c->id?>" <?php echo $c->id == $category_id ? "selected":"" ?>><?php echo !empty($c->category_desc) ? $c->category_desc . " / ". $c->category_name : $c->category_name ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>                                                                                                
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab_discount">
                                                                <table class="table table-bordered" id="listDiscount">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Discount Persen (%)</th>
                                                                            <th>Discount Price</th>
                                                                            <th>Star Date</th>
                                                                            <th>End Date</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $no = 1; 
                                                                        if (isset($discount)){
                                                                        ?>
                                                                        <?php foreach($discount as $d){?>
                                                                        <tr id="row<?php echo $no ?>">
                                                                            <td><input type="hidden" name="did[]" value="<?php echo $d->id ?>" /><input type="text" name="discount_persen[]" value="<?php echo $d->discount_persen ?>" class="form-control" /></td>
                                                                            <td><input type="text" name="discount_price[]" value="<?php echo $d->discount_price ?>" class="form-control" /></td>
                                                                            <td><div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" >
                                                                                    <input type="text" class="form-control" name="star_date[]" value="<?php echo $d->star_date ?>" maxlength="10" >
                                                                                    <span class="input-group-btn"> <button class="btn default" type="button"><i class="fa fa-calendar"></i></button></span>
                                                                                </div> 
                                                                            </td>
                                                                            <td><div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" >
                                                                                    <input type="text" class="form-control" name="end_date[]" value="<?php echo $d->end_date ?>" maxlength="10" >
                                                                                    <span class="input-group-btn"><button class="btn default" type="button"> <i class="fa fa-calendar"></i></button></span>
                                                                                </div> 
                                                                            </td>
                                                                            <td>
                                                                                <a class="btn btn-red removediscount" data-url="<?php echo site_url('product/remdiscount')?>" data-rowid="<?php echo $no ?>" data-id="<?php echo $d->id ?>"><i class="fa fa-remove"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <?php $no++; } } ?>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <td>
                                                                            <button type="button" class="btn btn-info" id="adddiscount"><i class="fa fa-plus"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane" id="tab_images">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <td>Image</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
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
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
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