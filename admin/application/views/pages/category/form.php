                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $category_id   = "";
                                    $category_name = "";
                                    $img           = "";
                                    $parent_id     = "";
                                    $isparent      = "";
                                    
                                    if (isset($category)){
                                        $category_id    = $category->id;
                                        $category_name  = $category->category_name;
                                        $img            = ROOT . $category->image;
                                        $parent_id      = $category->parent_id;
                                        $isparent       = $category->isparent;
                                    }
                                    
                                    $attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                                        
                                     echo form_open(site_url($urlBase.'/save'),$attributes);
                                    ?>
                                    <input type="hidden" name="id" id="id" value="<?php echo $category_id; ?>" />
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
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('category_name')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="category_name" placeholder="" value="<?php echo  $category_name ?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('is_parent_top')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio mt-radio-outline">
                                                                <input type="radio" name="isparent" class="form-control" value="1" <?php echo $isparent == 1 || empty($category_id) ? "checked":"" ?>/> Yes
                                                                <span></span> 
                                                            </label>
                                                            <label class="mt-radio mt-radio-outline">
                                                                <input type="radio" name="isparent" class="form-control" value="0" <?php echo $isparent == 0 && !empty($category_id) ? "checked":"" ?>/> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('parent')?> :
                                                    </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="parent_id">
                                                            <option value="0">None</option>
                                                            <?php foreach($parents as $p){?> 
                                                            <option value="<?php echo $p->id ?>" <?php echo $parent_id == $p->id ? "selected" : "" ?> ><?php echo trim($p->category_desc . " " .$p->category_name) ?></option>
                                                            <?php } ?> 
                                                        </select>
                                                         
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('image')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
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
                                    <?php
                                    echo form_close();
                                    ?>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            </div>