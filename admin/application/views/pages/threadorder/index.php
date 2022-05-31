            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> 
                            </div>                                
                        </div>
                        <div class="portlet-body">                                                
                            <table class="table table-striped table-hover table-bordered dataTable no-footer" id="datatable_ajax">
                                                <thead>
                                                    <tr role="row" class="heading">                                                        
                                                        <th width="70%"><?php echo $this->lang->line('no_order') ?></th>
                                                        <th width="20%"><?php echo $this->lang->line('date') ?></th>
                                                        <th width="10%"><?php echo $this->lang->line('status') ?> </th>
                                                    </tr>                                                        
                                                </thead>
                                                <tbody> 
                                                </tbody>
                                            </table>
                        </div>
                </div>
            </div>
        </div>