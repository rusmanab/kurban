                        
                        <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                            
                                            <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                                           
                                        </div>
                                        <div class="portlet-body">    
                                            <div class="table-container">                             
                                                    <table class="table table-striped table-hover table-bordered dataTable no-footer" id="datatable_ajax">
                                                        <thead>
                                                            <tr role="row" class="heading">
                                                                    <th width="10%">
                                                                        #
                                                                    </th>
                                                                    <th width="30%"><?php echo $this->lang->line('post_title') ?></th>
                                                                    <th width="10%"><?php echo $this->lang->line('post_date') ?> </th>
                                                                    <th width="10%"><?php echo $this->lang->line('order_type') ?> </th>
                                                                    <th width="10%"><?php echo $this->lang->line('status') ?> </th>
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
                                <div id="ajax-modal" class="modal fade " tabindex="-1" data-width="760"> </div>
                            </div>