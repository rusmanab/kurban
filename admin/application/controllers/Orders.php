<?php
class Orders extends MY_Controller{
    
    
    public function __construct(){
        parent::__construct();
        $this->load->model('morders','order');
        $this->load->model('morderdetail','orderdetail');
        $this->load->model('morderdetail2','orderdetail2');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('order');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('order');
        $data['formtitle'] = "";
        $data['icon']      = "list";
        
        $data['columnSort'] = 2;
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                            $data['title'],
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
       
        $regCss = array(
                        base_url('assets/themes/default/global/plugins/datatables/datatables.min.css'),
                        base_url('assets/themes/default/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.css'),
                        base_url('assets/themes/default/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css'),
                        base_url('assets/themes/default/global/plugins/bootstrap-modal/css/bootstrap-modal.css'),
                        
                        base_url('assets/themes/default/pages/css/invoice.min.css'),
                        
                        );
                        
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/bootbox/bootbox.min.js'),
                        base_url('assets/themes/default/global/plugins/datatables/datatables.min.js'),  
                        base_url('assets/themes/default/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-modal/js/bootstrap-modal.js'),
                                               
                        );
                        
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "pages/orders/js";
        $this->theme_admin->registerScript($addjs);
       
        $view = 'orders/index';
        $this->theme_admin->display($view,$data);
    }
    
    
    public function detail($noorder){
        
        
        $this->load->model(array('morderhistory','mkonfirmasipembayaran','museraddress'));
        
        
        $data['title']     = $this->lang->line('order');
        $data['subTitle']  = $this->lang->line('order_detail').$noorder;
        $data['formtitle'] = "";
        $data['icon']      = "list";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array($data['title'] => 'orders' ),
                             "#".$noorder,
                            );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $this->load->model('muser','user');
        $this->load->model('mjobdesc','job');
        $this->load->model('mjobdescimage','jobimage');
        $this->load->model('mglobal');
        
        
        
        $orders              = $this->order->getOrder($noorder);
        if (!$orders){
            show_404();
        }
        $orderdetail         = $this->orderdetail->getOrder($orders->id);
        $orderdetail2        = $this->orderdetail2->orderDetail2($orders->id);
        
        $orderhistory        = $this->morderhistory->getOrderDesc($orders->id);
        $paymentKonfirm      = $this->mkonfirmasipembayaran->getConfirmation($noorder); 
        
        $data['orders']      = $orders;
        $data['orderdetail'] = $orderdetail;
        $data['orderdetail2']= $orderdetail2;
        $data['orderTempo']  = $this->mglobal->getTempoBayar($orders->id);
        $getShipAddress      = $this->museraddress->getShipAddress($orders->user_id);
        
        $data['shipAddress'] = $getShipAddress;
        $data['orderhistory']= $orderhistory;
        $data['paymentConf'] = $paymentKonfirm;
        
        $users = $this->user->getUsersByLevel();
        
        $data['users'] = $users;
        
        $this->load->model('mstatus','status');
        
        $orderStatus = $this->status->getData();
        $data['orderstatus'] = $orderStatus;
      
        
        
        $regCss = array(
                        base_url('assets/themes/default/global/plugins/cubeportfolio/css/cubeportfolio.css'),
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.css'),
                        base_url('assets/themes/default/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css'),
                        base_url('assets/themes/default/global/plugins/bootstrap-modal/css/bootstrap-modal.css'),
                        base_url('assets/themes/default/global/plugins/fancybox-3.0/dist/jquery.fancybox.css'),
                        
                        );
                        
        $regJs  = array(
                        //base_url('assets/themes/default/global/plugins/bootbox/bootbox.min.js'),
                        base_url('assets/themes/default/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-modal/js/bootstrap-modal.js'),
                        base_url('assets/themes/default/global/plugins/fancybox-3.0/dist/jquery.fancybox.js'),      
                        );
        $regJs2  = array(
                        //base_url('assets/themes/default/global/plugins/bootbox/bootbox.min.js'),
                        base_url('assets/themes/default/pages/scripts/portfolio-1.js'),
                        );
                        
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        $this->theme_admin->regsiterJsClosing($regJs2,2);
        
        
        $addjs = "pages/orders/js2";
        $this->theme_admin->registerScript($addjs);
        
        $view = 'orders/detail';
        $this->theme_admin->display($view,$data);
    }     
    public function setTempo(){
        $this->load->model(array('mtempo','morders','morderhistory'));

        $order_id       = $this->input->post('order_id', true);
        $jumlah_tempo   = $this->input->post('jumlah_tempo', true);
        $notes          = $this->input->post('notes', true);
        $statusId       = 10;
        $noorder        = $this->input->post('no_order', true);
        $orderDetail    = $this->morders->getOrder($noorder);
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );

        $data   = array(
                    'order_id'      => $order_id,
                    'jumlah_tempo'  => $jumlah_tempo,
                    'notes'         => $notes,
                    'created_date'  => date('Y-m-d H:i:s'),
                    'created_by'    => $this->userid,
                );
        $this->mtempo->setData($data);
        if ( $this->mtempo->save() ){
            $this->load->model('mstatus');

            $where['where'] = array(
                                'id' => $statusId
                                );
            $this->mstatus->setParam($where);
            $res = $this->mstatus->getData(true);

            if ( !empty($res->tpl_email )){
                $this->load->library('email');

                $data['orderDetail']    = $orderDetail;
                $data['noorder']        = $noorder;
                $data['info']           = $orderDetail;
                $emailed        = $this->load->view($res->tpl_email,$data,TRUE);                    
                $config['wordwrap'] = TRUE;
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'iso-8859-1';        
                $config['mailtype'] = 'html';
                
                $this->email->initialize($config);
                                   
            
                $this->email->from('cs@excellent.com', 'excellent.com');
                $this->email->to($orderDetail->email);
                $this->email->subject('[Excellent] ' . $res->nama_status);
                $this->email->message($emailed);
                $this->email->send();
            }
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
        }

        $this->session->set_flashdata($message);    
        redirect('orders/detail/'.$noorder);
    }
    public function addhistory(){
        //$this->output->enable_profiler(true);
        $this->load->model(array('morderhistory','morders'));
        
        $post = $_POST;
        
        
        $noorder = $this->input->post('no_order', true);
        $orderDetail = $this->morders->getOrder($noorder); 
      
        unset($post['no_order']);
        
        $data["created_date"] = date('Y-m-d H:i:s');
        $data['created_by']   = $this->userid;
        
        $this->morderhistory->input($post);
        $this->morderhistory->addData($data);
        
        
        
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        if ( $this->morderhistory->save() ){
            $this->load->model('mstatus');
           
            $where['where'] = array(
                                'id' => $post["status_id"]
                                );
            $this->mstatus->setParam($where);
            $res = $this->mstatus->getData(true);
           
            if ( !empty($res->tpl_email )){
                $this->load->library('email');
                
                $data['orderDetail']    = $orderDetail;
                $data['noorder']        = $noorder;
                $data['info']           = $orderDetail;
                $emailed        = $this->load->view($res->tpl_email,$data,TRUE);                    
                $config['wordwrap'] = TRUE;
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'iso-8859-1';        
                $config['mailtype'] = 'html';
                
                $this->email->initialize($config);
                                   
            
                $this->email->from('cs@excellent.com', 'excellent.com');
                $this->email->to($orderDetail->email);
                $this->email->subject('[Excellent] ' . $res->nama_status);
                $this->email->message($emailed);
                $this->email->send();
            }
            
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
            if ( $post['status_id'] == 7 ){
                
                
                //echo $this->email->print_debugger(array('headers'));

            }
        }
        
        $this->session->set_flashdata($message);    
        
         redirect('orders/detail/'.$noorder);
    }
    
    public function assign(){
        //$this->output->enable_profiler(TRUE);
        
        
        $this->load->model('mjobdesc', 'job');
        $this->load->model('mkonfirmasipembayaran', 'kp');
        
        
        $noorder = $this->input->post('no_order', true);
        $user_id = $this->input->post('user_id', true);
        $mode    = $this->input->post('mode', true);
        
        $dateStar = date('Y-m-d H:i:s');
        $dateT = new DateTime( $dateStar );// date('Y-m-d H:i:s');
        $dateT->add(new DateInterval('P8D'));
        $dateE = $dateT->format('Y-m-d H:i:s');
        
        // cek pembayaran
        
        // 170324201908
        /*$where['where'] = array('no_order'=>$noorder);
        $this->kp->setParam($where);
        $result =  $this->kp->getData(true);*/
        $result = 3;
        if ($result){
            //if ($result->status_id == 3){
            if ($result == 3){    
            
        
            // 1 cek di tukang ukur dulu.. 
                $isAssignFiiter = $this->job->cekIsAssign($noorder);
                
                if (empty($user_id)){
                    if ($mode==1){
                        $json = array(
                                'error'     => "error",
                                'err_msg'   => "Please choose a fitter."
                            );
                    }else{
                        $json = array(
                                'error'     => "error",
                                'err_msg'   => "Please choose a designer."
                            );
                    }
                    $mode = 5;            
                }
                
                if ( $mode==1){
                    
                    
                    if (!$isAssignFiiter){                
                       
                        $jobdes = array(
                                    'parent_id'     => 0,
                                    'no_order'      => $noorder,                           
                                    'user_id'       => $user_id,
                                    'start_date'    => $dateStar,
                                    'end_date'      => $dateE,
                                    'status'        => 0,
                                    'is_accept'     => 0,
                                    'assign_by'     => $this->userid,
                                    'assign_date'   => $dateStar
                                );
                        $this->job->setData($jobdes);
                        if ( $this->job->save() ){
                            $json = array(
                                        'error' =>  "success",
                                        'err_msg'   => "Assigment successfull."
                                        );
                        }
                    }else{
                        if ($isAssignFiiter->status == 0){
                            $err_msg = 'Can\'t assign. waiting fitter accept.'; 
                        }
                        if ($isAssignFiiter->status == 1){
                            $err_msg = 'Can\'t assign. already assigment.';
                        }
                            $json = array(
                                    'error'     => "error",
                                    'err_msg'   => $err_msg 
                                    );
                    }
                    
                }elseif ( $mode==2 ){
                    // cek status di fitter
                    $json = array(
                                    'error'     => "error",
                                    'err_msg'   => 'Can\'t assign to desainer. no fitter accept.' 
                                );
                                        
                    if ($isAssignFiiter){
                        
                        if ( $isAssignFiiter->status == 2 ){
                            $json = array(
                                    'error'     => "error",
                                    'err_msg'   => 'Assign Failed' 
                                    );
                                    
                            $ass = array(
                                        'parent_id'     => $isAssignFiiter->id,
                                        'no_order'      => $noorder,                           
                                        'user_id'       => $user_id,
                                        'start_date'    => $dateStar,
                                        'end_date'      => $dateE,
                                        'status'        => 0,
                                        'is_accept'     => 0,
                                        'assign_by'     => $this->userid,
                                        'assign_date'   => date('Y-m-d H:i:s')
                                    );
                            $this->job->setData($ass);
                            if ( $this->job->save() ){
                                 $json = array(
                                            'error' => "success",
                                            'err_msg'   => "Assigment successfull."
                                        );
                            }
                        }else{
                            if ($isAssignFiiter->status == 0){
                                $err_msg = 'Can\'t assign to desainer. waiting fitter accept.'; 
                            }
                            if ($isAssignFiiter->status == 1){
                                $err_msg = 'Can\'t assign to desainer. fitter onprogress.';
                            }
                            $json = array(
                                            'error'     => "error",
                                            'err_msg'   => $err_msg 
                                        );
                        }
                    }
                }
            }else{
                $json = array(
                            'error'     => "error",
                            'err_msg'   => 'Can\'t assign. waiting payment verification' 
                            );
            }
        }else{
            $json = array(
                        'error'     => "error",
                        'err_msg'   => 'Can\'t assign. waiting payment confirmation'
                        );
        }
        echo json_encode($json);
    }
    
    public function get_table(){       
	   $this->order->getDataTable();
    }
    
    public function saveVerify(){
        $this->load->model(array('mkonfirmasipembayaran','morderhistory','mglobal','mjobdesc','morderdetail'));
        
        $idf = $this->input->post('idf', true);
        $verifed = $this->input->post('verifed', true);
        $note = $this->input->post('note', true);
        $noorder = $this->input->post('no_order', true);
        
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        
        $data = array(
                    'status_id'     => $verifed,
                    'verify_note'   => $note,
                    'verify_date'   => date('Y-m-d H:i:s'),
                    'verify_by'     => $this->userid,         
                    );
        $where['where'] = array('id'=>$idf);
        $this->mkonfirmasipembayaran->setParam($where);
        $this->mkonfirmasipembayaran->setData($data);
        if ($this->mkonfirmasipembayaran->save()){
            
            $addHistory = array(
                                'no_order'      => $noorder,
                                'comment'       => 'pembayaran sudah di verifikasi',
                                'status_id'     => $verifed,
                                'customer_notif'=> 1,
                                'created_date'  => date('Y-m-d H:i:s'),
                                'created_by'    => 0
                                );
            $this->morderhistory->setData($addHistory);
            $this->morderhistory->save();
                    
            $order_type = 2;
            $this->load->library('email');
            $data['noorder']        = $noorder;
            if ( $order_type == 2){
                
                $isAssign = $this->mjobdesc->cekIsAssign($noorder);
                // cek.. sudah di assign atau blum
                if ( !$isAssign ){
                    $availableFiiter = $this->mglobal->getFitterAvailable();
                    // var_dump($availableFiiter);
                    if ($availableFiiter && !empty( $availableFiiter->email ) ){
                        $tukangUkurId = $availableFiiter->user_id;
                        $dateStar = date('Y-m-d H:i:s');
                        $dateT = new DateTime( date('Y-m-d H:i:s') );// date('Y-m-d H:i:s');
                        $dateE = $dateT->add(new DateInterval('P8D'));
                      
                        $dateE = $dateE->format('Y-m-d H:i:s');
                        $jobdes = array(
                                    'parent_id'     => 0,
                                    'no_order'      => $noorder,                           
                                    'user_id'       => $tukangUkurId,
                                    'status'        => 0,
                                    'description'   => '',
                                    //'start_date'    => $dateStar,
                                    //'end_date'      => $dateE,
                                    'is_accept'     => 2,
                                    'assign_by'     => 0,
                                    'assign_date'   => $dateStar
                                 );
                        $this->mjobdesc->setData($jobdes);
                        
                        $this->mjobdesc->save();
                        
                        // email pemberitahuan
                        $orderDetail = $this->morderdetail->getOrderFront($noorder);     
                        
                        $profile = $this->order->getOrder($noorder) ; //$this->mglobal->getMember($orderDetail[0]->user_id);
                        
                        $data['orderDetail']    = $orderDetail;
                        $data['memberProfile']  = $profile;
            
                        $emailed        = $this->load->view('mail/emailtofiiter',$data,TRUE);                    
                        $config['wordwrap'] = TRUE;
                        $config['protocol'] = "sendmail";
                        
                        $config['mailtype'] = 'html';
                        $this->email->initialize($config);
                               
        
                        $this->email->from('cs@modelines.id', 'Modelines.ID');
                        $this->email->to($availableFiiter->email);
                        $this->email->subject('New Order');
                        $this->email->message($emailed);
                        $this->email->send();
                      
                        //$this->email->print_debugger(array('headers'));
                        
                    }
                }
            }
            
            // notif ke user 
            $infoOrder = $this->order->getOrder($noorder);
           
            $data['info'] = $infoOrder;
            
            $emailed = $this->load->view('mail/status_3',$data,TRUE);
            $this->email->from('cs@modelines.id', 'Modelines.ID');
            $this->email->to($infoOrder->email);
            $this->email->subject('Pembayaran Diterima');
            $this->email->message($emailed);
            $this->email->send();
                        
                        
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
        }
        
        $this->session->set_flashdata($message); 
        redirect('orders/detail/'.$noorder);
    } 
    
    public function cancel($noorder){
        $data['title']     = $this->lang->line('order');
        $data['subTitle']  = $this->lang->line('order_detail').$noorder;
        $data['formtitle'] = "";
        $data['icon']      = "list";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array($data['title'] => 'orders' ),
                             "#".$noorder,
                            );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $orders              = $this->order->getOrder($noorder);
        $data['orders']      = $orders;
        
        $view = 'orders/cancel';
        $this->theme_admin->display($view,$data);
    }
    
    public function cancelorder(){
        $statusId = 8;
        $catatan = $this->input->post('noted', true);
        $noorder = $this->input->post('noorder', true);
        
        $where['where'] = array('no_order'=>$noorder);
        $this->order->setParam($where);
        $data = array(
                    'status_id' => $statusId,
                    'catatan' => $catatan
                );
        $this->order->setData($data);
        
        if ($this->order->save()){
            
            $this->load->model(array('morderhistory','morders'));
            
            $addHistory = array(
                                'no_order'      => $noorder,
                                'comment'       => $catatan,
                                'status_id'     => $statusId,
                                'customer_notif'=> 0,
                                'created_date'  => date('Y-m-d H:i:s'),
                                'created_by'    => $this->userid
                                );
            $this->morderhistory->setData($addHistory);
            $this->morderhistory->save();
            
        }
        
        redirect('orders');
    }
    
    public function getListDesainerDesain($noorder){
        $this->load->model('mjobdesc','job');
        $this->load->model('mjobdescimage','jobimage');
        
        $getJobDesainer = $this->job->getJobdesc($noorder,2);
            
        $desainerId = $getJobDesainer[0]->id;
            
        $imageDesainer  = $this->jobimage->getImageDesainer($noorder, $desainerId);
        //$isclose    = $getJobDesainer[0]->is_close;
        //$imgchoosen = $getJobDesainer[0]->jobdesc_image;
            
            
        $data['imageDesainer'] = $imageDesainer;
        //$this->load->view('pages/orders/listdesain', $data);
        $htmlOutput = $this->load->view('pages/orders/listdesain', $data, TRUE);
        $response['htmlOutput'] = $htmlOutput;
        
        echo json_encode($response);
    }
    
    public function getListDesainerDesain2($noorder){
        $this->load->model('mjobdesc','job');
        $this->load->model('mjobdescimage','jobimage');
        
        $getJobDesainer = $this->job->getJobdesc($noorder,2);
            
        $desainerId = $getJobDesainer[0]->id;
            
        $imageDesainer  = $this->jobimage->getImageDesainer($noorder, $desainerId);
        //$isclose    = $getJobDesainer[0]->is_close;
        //$imgchoosen = $getJobDesainer[0]->jobdesc_image;
            
            
        $data['imageDesainer'] = $imageDesainer;
        $this->load->view('pages/orders/listdesain', $data);
        
    }
}