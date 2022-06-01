                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $video_id   = "";
                                    $title      = "";
                                    $img        = "";
                                    $iframe     = "";
                                    $product_id = "";
                                    
                                    if (isset($video)){
                                        $video_id   = $video->id;
                                        $title      = $video->title;
                                        $product_id = $video->product_id;
                                        $img        = ROOT . $video->image_thumbs;
                                        $iframe     = $video->iframe;
                                    }
                                    
                                    $attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                                        
                                     echo form_open(site_url($urlBase.'/save'),$attributes);
                                    ?>
                                    <input type="hidden" name="id" id="id" value="<?php echo $video_id; ?>" />
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
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('title_video')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="title" placeholder="" value="<?php echo $title ?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('clothes_name')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <select name="product_id" id="product_id" class="form-control">
                                                            <option>-- Pilih Produk --</option>
                                                            <?php foreach($products as $p){?> 
                                                            <option value="<?php echo $p->id?>" <?php echo $p->id == $product_id ? "selected":""?>><?php echo $p->post_title?></option>
                                                            <?php } ?>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('image')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-8">
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
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Iframe Youtube:</label>
                                                    <div class="col-md-8"> 
                                                        <textarea class="form-control maxlength-handler" rows="4" name="iframe" maxlength="1000"><?php echo $iframe?></textarea>
                                                        <span class="help-block"> max 1000 chars </span>
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