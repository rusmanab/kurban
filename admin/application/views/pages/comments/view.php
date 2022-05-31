                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                            
                                                <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                                            
                                        </div>
                                        <div class="portlet-body form">     
                                            <?php
                                   
                                            $attributes = array('class' => 'form-horizontal', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                                                
                                             echo form_open(site_url($urlBase.'/save'),$attributes);
                                            ?>
                                            <input type="hidden" name="id" id="id" value="<?php echo $comments->id; ?>" />
                                            <input type="hidden" name="produk_id" id="id" value="<?php echo $comments->produk_id; ?>" />
                                            
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Comment On :
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" readonly placeholder="" value="<?php echo $comments->post_title; ?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">User :
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" readonly placeholder="" value="<?php echo $comments->user_name; ?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Message :
                                                    </label>
                                                    <div class="col-md-6">
                                                        <textarea class="form-control" readonly><?php echo $comments->message; ?></textarea>
                                                    </div>
                                                </div>
                                                <?php
                                                $status = '<span class="label label-danger"> Pending </span>';
                                                if ( $comments->status ==1 ){
                                                    $status = '<span class="label label-primary"> Publish </span>';
                                                }
                                                if ( $comments->status ==2 ){
                                                    $status = '<span class="label label-primary"> Unpublish </span>';
                                                }
                                                ?>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Status :
                                                    </label>
                                                    <div class="col-md-6">
                                                        <?php echo $status?> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Comment Date :
                                                    </label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" placeholder="" readonly value="<?php echo $comments->created_date; ?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Set Status :
                                                    </label>
                                                    <div class="col-md-3">
                                                        <select name="status" class="form-control">
                                                            <option value="0">Pending</option>
                                                            <option value="1">Publish</option>
                                                            <option value="2">Un Publish</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-2 col-md-10">
                                                            <button type="submit" class="btn green">Update</button>
                                                            <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
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