            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> 
                            </div>                                
                        </div>
                        <div class="portlet-body">                                                
                            <div class="col-md-12">
                                <div class="tabbable-bordered">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_new" data-toggle="tab"> New Task </a>
                                        </li>
                                        <li>
                                            <a href="#tab_progress" data-toggle="tab"> On Progress </a>
                                        </li>
                                        <li>
                                            <a href="#tab_finish" data-toggle="tab"> Finish </a>
                                        </li>                    
                                                            
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_new">
                                            <table class="table table-striped table-hover table-bordered dataTable no-footer" id="datatable_ajax">
                                                <thead>
                                                    <tr role="row" class="heading">                                                        
                                                        <th width="30%"><?php echo $this->lang->line('no_order') ?></th>
                                                        <th width="30%"><?php echo $this->lang->line('address') ?></th>
                                                        <th width="20%"><?php echo $this->lang->line('date') ?></th>
                                                        <th width="10%"><?php echo $this->lang->line('status') ?> </th>
                                                    </tr>                                                        
                                                </thead>
                                                <tbody> 
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab_progress">
                                            <table class="table table-striped table-hover table-bordered dataTable no-footer" id="datatable_ajax_pro">
                                                <thead>
                                                    <tr role="row" class="heading">                                                        
                                                        <th width="30%"><?php echo $this->lang->line('no_order') ?></th>
                                                        <th width="30%"><?php echo $this->lang->line('address') ?></th>
                                                        <th width="20%"><?php echo $this->lang->line('date') ?></th>
                                                        <th width="10%"><?php echo $this->lang->line('status') ?> </th>
                                                    </tr>                                                        
                                                </thead>
                                                <tbody> 
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab_finish">
                                            <table class="table table-striped table-hover table-bordered dataTable no-footer" id="datatable_ajax_finish">
                                                <thead>
                                                    <tr role="row" class="heading">                                                        
                                                        <th width="30%"><?php echo $this->lang->line('no_order') ?></th>
                                                        <th width="30%"><?php echo $this->lang->line('address') ?></th>
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
                        </div>
                        <div id="ajax-modal" class="modal fade " tabindex="-1"> </div>
                        <div id="ajax-modal2" class="modal fade container " tabindex="-1"></div>
                </div>
            </div>
        </div>