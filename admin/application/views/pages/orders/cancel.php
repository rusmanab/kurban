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
                                                        
                                     echo form_open(site_url($urlBase.'/cancelorder'),$attributes);
                                    ?>
                                    <input type="hidden" name="noorder" id="id" value="<?php echo $orders->no_order; ?>" />
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                            
                                                <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                                            <div class="actions btn-set">
                                                    <a href="<?php echo site_url('orders/detail/'.$orders->no_order)?>" id="back" class="btn default">
                                                        <i class="fa fa-angle-left"></i> Back</a>
                                                    <button class="btn btn-success" type="submit">
                                                        <i class="fa fa-check"></i> Save</button>
                                                   
                                                </div>
                                        </div>
                                        <div class="portlet-body">     
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"><?php echo $this->lang->line('note_cancel_order')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="noted" rows="4" ></textarea>
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