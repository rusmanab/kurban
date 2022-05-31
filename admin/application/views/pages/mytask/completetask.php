        <div class="row">   
            <div class="col-md-12">
                <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                            
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <?php echo $this->lang->line('billing_address') ?>
                                               
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <ul class="list-unstyled">
                                                <li><h4><?php echo $orderdetail->full_name ?></h4></li>
                                                <li><?php echo $orderdetail->address ?></li>
                                                <li><?php echo $orderdetail->phone_number ?></li>
                                                <li><?php echo $orderdetail->email ?></li>
                                                <?php //echo $orderdetail->nama_kota ?>
                                                <?php //echo $orderdetail->nama_provinsi ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <?php echo $this->lang->line('shipping_address') ?>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <ul class="list-unstyled">
                                                <li><h4><?php echo $orderdetail->nama_pemesan ?></h4></li>
                                                <li><?php echo $orderdetail->alamat ?></li>
                                                <li><?php echo $orderdetail->nomor_telepon ?></li>
                                                <li><?php echo $orderdetail->email ?></li>
                                                <li><?php echo $orderdetail->catatan ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php 
                $attr = array('class'=>'form-horizontal myform', 'id'=>'frm-accept');
                
                echo form_open( site_url('mytask/submit') ,$attr);
                ?>
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
                        <div class="tabbable-bordered">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_general" data-toggle="tab"> General </a>
                                </li>
                                <li>
                                    <a href="#tab_images" data-toggle="tab"> Images </a>
                                </li>                    
                            </ul>
                            <div class="tab-content">
                                <input type="hidden" name="no_order" value="<?php echo $desc->no_order ?>" />
                                <input type="hidden" name="jobdescid" value="<?php echo $desc->id ?>" />                                
                                <div class="tab-pane active" id="tab_general">
                                    <div class="form-group">
                                    <label class="control-label col-md-2">
                                        Done <span class="required" aria-required="true"> * </span>
                                    </label>
                                    <div class="col-md-3">
                                        <select name="isdone" class="form-control">
                                            <option value="2" <?php echo $desc->status == 2 ? "selected" : "" ?>>Yes</option>
                                            <option value="1" <?php echo $desc->status == 1 ? "selected" : "" ?> >No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">
                                        Description<span class="required" aria-required="true"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" rows="6"><?php echo $desc->description ?></textarea>
                                    </div>
                                </div>                                  
                                </div>
                                <div class="tab-pane" id="tab_images">
                                    <div class="alert alert-success margin-bottom-10">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                        <i class="fa fa-warning fa-lg"></i> Image type and information need to be specified. 
                                    </div>
                                    <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                                        <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn btn-success" data-upload="<?php echo site_url('mytask/doupload')?>">
                                            <i class="fa fa-plus"></i> Select Files </a>
                                        <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn btn-primary">
                                        <i class="fa fa-share"></i> Upload Files </a>
                                    </div>
                                    <div class="row">
                                        <div id="tab_images_uploader_filelist" class="col-md-12 col-sm-12"> </div>
                                    </div>
                                    <table class="table table-bordered table-hover" id="listImage">
                                        <thead>
                                            <tr role="row" class="heading">
                                                <th width="8%"> Image </th>
                                                <th width="25%"> Label </th>
                                                <th width="10%"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // id
                                            foreach($image as $i){
                                            ?>
                                            <tr id="<?php echo $i->id ?>">
                                                <td>
                                                    <a href="<? echo ROOT . $i->image?>" class="fancybox-button" data-rel="fancybox-button">
                                                        <img class="img-responsive" src="<? echo ROOT . $i->image_thumbs?>" alt=""> </a>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="imageTitle[]" value="<? echo $i->title?>"> 
                                                    <input type="hidden" name="imageid[]" value="<? echo $i->id?>" />
                                                    <input type="hidden" name="image[]" value="<? echo $i->image?>" />
                                                    <input type="hidden" name="imagethumbs[]" value="<? echo $i->image_thumbs?>" />
                                                </td>                                                                                                                        
                                                <td>
                                                    <a href="javascript:;" class="btn btn-default btn-sm removeimage" data-url="<?php echo site_url('mytask')?>" data-trid="<?php echo $i->id ?>" data-id="<?php echo $i->id ?>">
                                                    <i class="fa fa-times"></i> Remove </a>
                                                </td>
                                            </tr>
                                            <?php } ?>                                                                                                                                
                                        </tbody>
                                    </table>
                                </div>                      
                            </div>
                        </div>
                    </div>
                 </div>  
                 <?php echo form_close() ?>
            </div>
        </div>
 