                        
                        <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                            
                                            <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                                            
                                            <div class="actions">
                                                <a href="<?php echo site_url('userlevel/add')?>" class="btn btn-default btn-sm">
                                                    <i class="fa fa-plus"></i> <?php echo $this->lang->line('add') ?> </a>
                                                <a href="javascript:;" class="btn btn-default btn-sm btn-edit">
                                                    <i class="fa fa-pencil"></i> <?php echo $this->lang->line('edit') ?> </a>
                                               
                                            </div>
                                        </div>
                                        <div class="portlet-body">     
                                            <div class="table-container">                             
                                                    <table class="table table-striped table-hover table-bordered dataTable no-footer" id="datatable_ajax">
                                                        <thead>
                                                            <tr role="row" class="heading">
                                                                    <th width="2%">
                                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                            <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                                            <span></span>
                                                                        </label>
                                                                    </th>
                                                                    
                                                                    <th width="60%"><?php echo $this->lang->line('user_level') ?></th>
                                                                    <th width="20%"><?php echo $this->lang->line('created_at') ?> </th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody> 
                                                        </tbody>
                                                    </table>
                                            </div> 
                                           
                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            </div>