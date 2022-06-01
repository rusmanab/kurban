                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $brand_id   = "";
                                    $brand_name = "";
                                    $img        = "";
                                    
                                    if (isset($brand)){
                                        $brand_id    = $brand->id;
                                        $brand_name  = $brand->brand_name;
                                        $img         = ROOT . $brand->image;
                                    }
                                    
                                    $attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                                        
                                     echo form_open(site_url($urlBase.'/save'),$attributes);
                                    ?>
                                    <input type="hidden" name="id" id="id" value="<?php echo $brand_id; ?>" />
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                            
                                                <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                                            <div class="actions btn-set">
                                                    <a href="<?php echo site_url($urlBase) ?>" id="back" class="btn default">
                                                        <i class="fa fa-angle-left"></i> Back</a>
                                                    <button class="btn btn-default" type="submit">
                                                        <i class="fa fa-check"></i> Save</button>
                                                   
                                                </div>
                                        </div>
                                        <div class="portlet-body">     
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('brand_name')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="brand_name" placeholder="" value="<?php echo $brand_name ?>"> 
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