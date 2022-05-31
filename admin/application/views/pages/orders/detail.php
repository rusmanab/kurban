    <?php
    if ($orders->status_id == 8){
    ?>    
    
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-danger">
            <strong><i class="fa fa-exclamation-triangle"></i> Warning!</strong> Pesanan di batalkan. <?php echo $orders->catatan ?></div>
        </div>
    </div>
    <?php } ?>
    <?php
    if (!$paymentConf){
    ?>    
    
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissable">
            <strong><i class="fa fa-exclamation-triangle"></i> Warning!</strong> Pelanggan belum melakukan pembayaran atau konfirmasi pembayaran</div>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                    <i class="icon-microphone font-blue-hoki"></i>
                    <span class="caption-subject bold font-blue-hoki">                        
                        <?php echo $this->lang->line('billing_address') ?>
                    </span>
                    
                    </div>
                </div>
                <div class="portlet-body">
                    <?php
                    
                    $avat = base_url($orders->avatar_thumbs);
                    if (!@getimagesize($avat)){
                        $avat = base_url('assets/themes/default/layouts/layout3/img/avatar1.jpg');
                    }
                    ?>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" alt="" src="<?php echo $avat?>"> </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="#"><?php echo $orders->full_name  ?></a>
                            </h4> 
                            
                            <?php echo $orders->address  ?><br /> 
                            <?php echo $orders->provinsi  ?> 
                            <?php echo $orders->kota  ?> <?php echo $orders->postal_code  ?> <br /> 
                            <?php echo $orders->email  ?> <br />
                            <?php echo $orders->phone_number  ?> 
                            <div class="alert alert-info">
                                <strong><i class="fa fa-money"></i> Payment </strong>
                                <i><?php echo $orders->nama_pembayaran; ?></i>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                    <i class="icon-microphone font-blue-hoki"></i>
                    <span class="caption-subject bold font-blue-hoki">                        
                        <?php echo $this->lang->line('shipping_address') ?>
                    </span>
                    
                    </div>
                </div>
                <div class="portlet-body">
                    
                    <?php echo $shipAddress->recipient  ?><br />
                    <?php echo $shipAddress->address  ?><br /> 
                    <?php echo $shipAddress->province  ?> 
                    <?php echo $shipAddress->city  ?> <?php echo $shipAddress->postal_code  ?> <br /> 
                    <?php echo $shipAddress->email  ?> <br />
                    <?php echo $shipAddress->phone_number  ?> 
                                                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered ">
                <div class="portlet-title tabbable-line">
                    <div class="caption">
                        <i class="icon-microphone font-blue-hoki"></i>
                        <span class="caption-subject bold font-blue-hoki uppercase">
                            <?php echo $this->lang->line('orders') ?> #<?php echo $orders->no_order ?>
                        </span>
                        
                    </div>
                    
                    <div class="actions">
                        <a href="<?php echo site_url('orders/cancel/'.$orders->no_order)?>" data-toggle="modal" class="btn btn-danger">
                            Cancel Order
                        </a>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="">
                            <a href="#tab_1_1" data-toggle="tab" aria-expanded="true" id="invoice" > <?php echo $this->lang->line('invoice') ?> </a>
                        </li>
                      
                        <li class="">
                            <a href="#tab_1_3" data-toggle="tab" aria-expanded="false"> <?php echo $this->lang->line('order_history') ?> </a>
                        </li>  
                        <?php
                        if ($orders->methode_bayar_id==4){ ?>
                        <li class="">
                            <a href="#tab_1_4" data-toggle="tab" aria-expanded="false"> <?php echo $this->lang->line('payment_tempo') ?> </a>
                        </li>
                        <?php
                        }else{
                        ?>
                        <li class="">
                            <a href="#tab_1_2" data-toggle="tab" aria-expanded="false"> <?php echo $this->lang->line('payment_verifikasi') ?> </a>
                        </li>
                        <?php } ?>
                        <?php
                        /*
                        if ($orders->order_type==2){
                        ?>
                        
                        <li class="">
                            <a href="#tab_1_4" data-toggle="tab" aria-expanded="false"> <?php echo $this->lang->line('assignment') ?> </a>
                        </li> 
                        <li class="active">
                            <a href="#tab_1_5" data-toggle="tab" aria-expanded="false" data-filter="" id="getImageDesain"> <?php echo $this->lang->line('thread') ?> </a>
                        </li>
                        <?php }*/ ?>                                            
                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane fade" id="tab_1_1">
                            <div class="invoice">
                                
                                <div class="row">
                                    <div class="col-xs-12">
                                        
                                        
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Item </th>
                                                    
                                                    <th class="hidden-xs"> Quantity </th>
                                                    <th class="hidden-xs"> Price </th>
                                                    <th> Total </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1; 
                                                $grantotal = 0;
                                                foreach($orderdetail as $o){
                                                ?>
                                                <tr>
                                                    <td> <?php echo $no ?></td>
                                                    <td> <?php echo $o->post_title ?> </td>
                                                   
                                                    <td class="hidden-xs text-right"> <?php echo $o->qty ?> </td>
                                                    <?php
                                                    $price = number_format($o->price,0);
                                                    if ( $o->diskon_price > 0 ){
                                                        /*$price = "<strike>".number_format($o->price,0)."</strike> ";
                                                        $price.= number_format($o->price - $o->diskon_price,0);*/
                                                        $price = number_format($o->price,0)."<br /> ";
                                                        $price.= "(Diskon " . $o->qty . " x " . number_format($o->diskon_price,0).")";
                                                    }
                                                    ?>
                                                    <td class="hidden-xs text-right" > 
                                                        <?php echo $price; ?> 
                                                    </td>
                                                    <?php $subtotal = $o->qty * $o->price ?>
                                                    <td class="text-right"> <?php echo number_format($subtotal,0) ?> </td>
                                                    <?php $grantotal+=$subtotal;?>
                                                </tr>
                                                <?php 
                                                $no++; 
                                                } ?>
                                               
                                                <?php
                                                foreach($orderdetail2 as $o2){
                                                ?>
                                                <tr>
                                                    <td> <?php echo $no ?></td>
                                                    <td colspan="3"> Kurir <?php echo strip_tags( $o2->keterangan) ?> </td>
                                                    <td class="text-right">  <?php echo number_format($o2->price,0);  ?> </td>
                                                </tr>
                                                <?php 
                                                $no++; 
                                                } ?>
                                                <tr>
                                                    <td colspan="4" class="text-right"><strong>Sub Total:</strong></td>
                                                    <td class="text-right"><?php echo number_format($orders->total_price,0); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right"><strong>Total Diskon:</strong></td>
                                                    <td class="text-right"><?php echo number_format($orders->total_diskon,0); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right"><strong>Grand Total:</strong></td>
                                                    <?php
                                                    $totalTagihan = $orders->total_price - $orders->total_diskon;
                                                    ?>
                                                    <td class="text-right"><?php echo number_format($totalTagihan,0); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="tab_1_3">
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <td class="text-left">Date Added</td>
                                    <td class="text-left">Comment</td>
                                    <td class="text-left">Status</td>
                                    <!-- <td class="text-left">Customer Notified</td> -->
                                  </tr>
                                </thead>
                                <tbody>
                                <?php foreach($orderhistory as $oh){?> 
                                    <tr>
                                    <td class="text-left"><?php echo $oh->created_date ?></td>
                                    <td class="text-left"><?php echo $oh->comment ?></td> 
                                    <td class="text-left"><?php echo $oh->nama_status ?></td>
                                    <!-- <td class="text-left"><?php //echo $oh->comment ?></td> -->
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                            <br />
                            <?php
                            $attributes = array('class' => 'form-horizontal form ', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                                        
                            echo form_open(site_url($urlBase.'/addhistory'),$attributes);
                            ?>
                            <input type="hidden" name="no_order" value="<?php echo $orders->no_order ?>" />
                            <input type="hidden" name="order_id" value="<?php echo $orders->id ?>" />
                            <div class="form-body">
                                <h3 class="form-section"><?php echo $this->lang->line('add_order_history') ?></h3>
                                <div class="form-group">
                                    <label class="control-label col-md-2"><?php echo $this->lang->line('status') ?></label>
                                    <div class="col-md-10">
                                        <select name="status_id" class="form-control">
                                            <?php foreach($orderstatus as $os){?>                                            
                                            <option value="<?php echo $os->id?>"><?php echo $os->nama_status?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Comment</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="comment" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <button class="btn green pull-right" type="submit">
                                <i class="fa fa-plus"></i> <?php echo $this->lang->line('add_history')?></button>
                            </div>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                        <div class="tab-pane fade" id="tab_1_2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Nama Pengirim</td>
                                        <td>Nominal</td>
                                        <td>Bank Pengirim</td>
                                        <td>Bukti Pembayaran</td>
                                        <td>Status</td>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($paymentConf){?> 
                                    <tr>
                                        <td><?php echo $paymentConf->nama_pengirim ?></td>
                                        <td><?php echo $paymentConf->nominal ?></td>
                                        <td><?php echo $paymentConf->bank_pengirim ?></td>
                                        <td>
                                            <?php 
                                            $imageBuktiPay = ROOT . $paymentConf->bukti_bayar;
                                            $thumbsBuktiPay = ROOT . $paymentConf->bukti_thumbs; 
                                            if ( $imageBuktiPay &&  $thumbsBuktiPay){
                                            ?>
                                            <a href="<?php echo $imageBuktiPay ?>" data-fancybox data-caption="Bukti Pembayaran. Bank : <?php echo $paymentConf->bank_pengirim ?>, Pengirim : <?php echo $paymentConf->nama_pengirim ?>">
                                            	<img src="<?php echo $thumbsBuktiPay ?>" alt="" />
                                            </a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $paymentConf->nama_status ?>
                                            <?php
                                            if ($paymentConf->status_id == 2 ){
                                            ?>
                                            <label class="label label-danger"><i class="fa fa-exclamation"></i></label>
                                            <?php }else{ ?>
                                            <label class="label label-primary"><i class="fa fa-check"></i></label>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php }else{ ?>
                                       <td colspan="4">
                                            <label class="label label-warning">Belum melakukan pembayaran / konfirmasi pembayaran</label>
                                       </td>
                                    <?php } ?>
                                </tbody>
                            </table> 
                            <br />
                            <?php if ($paymentConf){?>
                            <?php
                            $attr = array('class'=>'form-horizontal myformv form ', 'id'=>'frm-payverify');
                                
                            echo form_open( site_url('orders/saveVerify') ,$attr);
                            ?>
                            <div class="form-body">
                                <input type="hidden" name="no_order" value="<?php echo $orders->no_order ?>" />
                                <input type="hidden" name="idf" value="<?php echo $paymentConf->id ?>" />
                                <h3 class="form-section">Verify Payment</h3>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Verify Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="verifed">
                                            <option value=""></option>
                                            <option value="2">Verifikasi Pembayaran</option>
                                            <option value="3">Pembayaran Diterima</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Note</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="note" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <button class="btn green pull-right" type="submit">
                                    <i class="fa fa-check"></i> Submit</button>
                                </div>
                            </div>
                            <?php
                            echo form_close();
                            ?>
                            
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade assignment" id="tab_1_4">      
                            <div class="form">
                                <h3 class="form-section"><?php echo $this->lang->line('payment') ?></h3>
                            </div>
                                  
                            <?php 
                            
                            if (!$orderTempo){
                            
                                $attr = array('class'=>'form-horizontal myform form-horizontal form ', 'id'=>'frm-fitter');
                                
                                echo form_open( site_url('orders/setTempo') ,$attr);
                            ?>
                            <input type="hidden" name="no_order" value="<?php echo $orders->no_order ?>" />
                            <input type="hidden" name="order_id" value="<?php echo $orders->id ?>" />
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Jumlah Tempo <span class="required" aria-required="true"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <select class="form-control" name="jumlah_tempo" id="jumlah_tempo">
                                            <option value="">-- Pilih Jumlah --</option>      
                                            <option value="30">30 Hari (1 bulan)</option>
                                            <option value="90">90 Hari (3 bulan)</option>                                       
                                        </select>   
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Notes <span class="required" aria-required="true"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <textarea class="form-control" name="notes" rows="6"></textarea>   
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                    <button class="btn green" type="submit">Submit</button>
                                    </div>
                                </div>
                                
                            </div>
                            <?php 
                                echo form_close();
                            }else{
                            ?>
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Tempo</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Notes</th>
                                    <th>Status</th>
                                    <!-- <th></th> -->
                                </tr>
                                <tr>
                                    <td> <?php echo $orderTempo->jumlah_tempo ?> Hari</td>
                                    
                                    <td> <?php echo $orderTempo->tanggal_jatuh_tempo ?></td>
                                    <td> <?php echo $orderTempo->notes ?></td>
                                    <td>
                                        <?php 
                                        $status = "<label class='label label-warning'>Belum Lunas</label>";
                                        if ( $orderTempo->status_bayar== 2 ){
                                            $status = "<label class='label label-info'>Sudah Lunas</label>";
                                        }
                                        echo $status;
                                        ?>
                                    </td>
                                    <!-- <td></td> -->
                                </tr>
                            </table>
                            <?php
                            }
                            ?>
                            
                        </div>    
                        <div class="tab-pane fade active in" id="tab_1_5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                Suggest Design
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-md-12" >
                                                    <?php
                                                    if (isset($imageDesainer)){
                                                    ?>
                                                    <div class="portfolio-content portfolio-1">                                                        
                                                        <div id="js-grid-juicy-projects" class="cbp">
                                                                    <?php 
                                                                    $y = 0;                                                    
                                                                    foreach($imageDesainer as $i){
                                                                        $y++;    
                                                                    ?>                                       
                                                                      <div class="cbp-item <?php echo $y ?>">
                                                                        <div class="cbp-caption">
                                                                            <div class="cbp-caption-defaultWrap">
                                                                                <img src="<?php echo ROOT . ($i->image_thumbs)?>" alt=""> </div>
                                                                            <div class="cbp-caption-activeWrap">
                                                                                <div class="cbp-l-caption-alignCenter">
                                                                                    <div class="cbp-l-caption-body">
                                                                                        <a href="<?php echo ROOT . ($i->image)?>" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="<?php echo $i->title?><br>by <?php echo $desainername?>">view larger</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center"><?php echo $i->title?></div>
                                                                    </div><?php } ?>                                                               
                                                        </div>                                                        
                                                    </div>
                                                     <?php }else{?>
                                                     <div class="alert alert-info">
                                                        <strong><i class="fa fa-exclamation-triangle"></i> No desaign </strong>
                                                     </div>
                                                     <?php } ?>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                Comments
                                            </div>
                                        </div>
                                        <div id="chats" class="portlet-body">
                                            <?php if (isset($comments)){ ?>
                                            <ul class="chats">
                                                <?php  
                                                foreach($comments as $com) {
                                                    
                                                    $img = ROOT . ($com->avatar_thumbs);
                                                    if (!@getimagesize($img)){
                                                        $img = ROOT . ('assets/themes/modelines2/img/client-1.png');
                                                    }
                                                    $class = "out";
                                                    if ( $com->user_id == $desainer_id){
                                                        $class = "in";
                                                    }
                                                    $comdate = new DateTime($com->created_date);
                                                    $comdate = $comdate->format("M,d Y H:i:s");
                                                ?>
                                                
                                                <li class="<?php echo $class?>">
                                                    <img class="avatar" src="<?php echo $img?>" />
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a href="javascript:;" class="name"> <?php echo $com->full_name ?> </a>
                                                        <span class="datetime"> at <?php echo $comdate?> </span>
                                                        <span class="body"> 
                                                            <?php echo $com->comment ?>
                                                        </span>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                            <?php }else{?>
                                            <div class="alert alert-info">
                                                <strong><i class="fa fa-exclamation-triangle"></i> Comments not start yet</strong>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                Design Choose
                                            </div>
                                        </div>
                                        <div id="chats" class="portlet-body">
                                            <?php if ( isset($isclose) && isset($yourchoose)){?> 
                                              <img class="img-responsive" src="<?php echo $yourchoose ?>" />
                                             <?php }else{?>
                                            <div class="alert alert-info">
                                                <strong><i class="fa fa-exclamation-triangle"></i> No design choosen</strong>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>                            
                            </div>                           
                    </div>
                </div>
            </div>
            
            
            
                                        
            
        </div>
    </div>                                
    </div>                                                    
