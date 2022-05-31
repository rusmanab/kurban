         <div class="row">
            <div class="col-md-6">
                                <!-- Begin: life time stats -->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-blue"></i>
                                <span class="caption-subject font-blue bold uppercase">Overview</span>
                            <span class="caption-helper">report overview...</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#overview_1" data-toggle="tab"> Top Selling </a>
                                </li>
                                <li>
                                    <a href="#overview_2" data-toggle="tab"> Most Viewed </a>
                                </li>
                                <li>
                                    <a href="#overview_3" data-toggle="tab"> New Customers </a>
                                </li>
                                                
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="overview_1">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Product Name </th>
                                                    <th> Price </th>
                                                    <th> Sold </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                foreach($mostviewed as $v){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:;"> <?php echo $v->post_title ?> </a>
                                                    </td>
                                                    <td> <?php echo number_format($v->price) ?> </td>
                                                    <td> <?php echo $v->viewed ?> </td>
                                                    <td>
                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                        <i class="fa fa-search"></i> View </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                                
                                <div class="tab-pane" id="overview_2">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Product Name </th>
                                                    <th> Price </th>
                                                    <th> Views </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                foreach($mostviewed as $v){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:;"> <?php echo $v->post_title ?> </a>
                                                    </td>
                                                    <td> <?php echo number_format($v->price) ?> </td>
                                                    <td> <?php echo $v->viewed ?> </td>
                                                    <td>
                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                        <i class="fa fa-search"></i> View </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="overview_3">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Customer Name </th>
                                                    <th> Total Orders </th>
                                                    <th> Total Amount </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:;"> David Wilson </a>
                                                    </td>
                                                    <td> 3 </td>
                                                    <td> $625.50 </td>
                                                    <td>
                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                        <i class="fa fa-search"></i> View </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <!-- End: life time stats -->
            </div>
            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">New Order</span>
                            
                        </div>
                                        
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th> Customer Name </th>
                                        <th> Pembayaran </th>
                                        <th> Amount </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                   
                                    foreach($neworder as $n){
                                       
                                        $date = new DateTime($n->order_date);  
                                        $newdate = $date->format('d M, Y');
                                        $price =  number_format($n->total_price);
                                        if ( $n->total_diskon > 0 ){
                                            $price = "<strike>".number_format($n->total_price)."</strike> ";
                                            $price.=  number_format($n->total_price - $n->total_diskon);
                                        }
                                        
                                        $cname = $n->full_name;
                                        if (empty($cname)){
                                            $cname = $n->username;
                                        }
                                        $nama_status = $n->nama_status;
                                        $label_color = $n->label_color;
                                        if ( $n->methode_bayar_id == 4){
                                            $nama_status = "Tunggu kompirmasi admin";
                                            $label_color = "label label-warning";
                                        }
                                    ?> 
                                    <tr>
                                        <td>
                                            <a href="<?php echo site_url('orders/detail/'.$n->no_order)?>"> <?php echo $cname ?> </a>
                                            <br />
                                            <small class="<?php echo $label_color ?> label-sm"> <?php echo $nama_status ?> </small>
                                        </td>

                                        <td> <?php echo $n->nama_pembayaran ?> </td>
                                        <td> Rp <?php echo $price ?> </td>
                                        
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Revenue Chart</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-cloud-upload"></i>
                            </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-wrench"></i>
                            </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-trash"></i>
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="highchart_3" style="height:500px;"></div>
                    </div>
                </div>
            </div>
        </div>