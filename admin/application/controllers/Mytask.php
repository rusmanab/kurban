<?php
class Mytask extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mjobdesc','job');
        $this->load->model('morderdetail','orderdetail');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('mytask');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('mytask');
        $data['formtitle'] = $this->lang->line('summary_task');
        $data['icon']      = "list";
        $data['columnSort'] = 1;
        
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
        
        $addjs = "pages/mytask/js";
        $this->theme_admin->registerScript($addjs);
       
        $view = 'mytask/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function newtask($noorder){
        $data['no_order'] = $noorder;
        $this->load->view('pages/mytask/newtask', $data);
    } 
    public function complete($noorder){
        $data['no_order'] = $noorder;
        $this->load->view('pages/mytask/completetask', $data);
    }     
    public function completeTask(){
        	
        $noorder        = $this->input->post("no_order", true);
        $isdone         = $this->input->post("isdone", true);
        $description    = $this->input->post("description", true);	

	
        $where['where'] = array(
                            'no_order' => $noorder,
                            'user_id'  => $this->userid
                            );
        $start_date = "";
        $end_date   = "";
        
        $data = array(
                    'description'=> $description,
                    'status'    => $isdone,
                    );
        $this->job->setParam($where);
        $this->job->setData($data);
        if ( $this->job->save() ){
             
             $json = array(
                            'error' =>  "success",
                            'err_msg'   => "Accepted successfull."
                        );
                        
        }else{
            $json = array(
                            'error'     => "error",
                            'err_msg'   => "You rejected."
                        );
        }
        
        echo json_encode($json);
    }
    public function assign(){
        	
        $noorder  = $this->input->post("no_order", true);
        $accepted = $this->input->post("accepted", true);
        
        $where['where'] = array(
                            'no_order' => $noorder,
                            'user_id'  => $this->userid
                            );
        $start_date = "";
        $end_date   = "";
        
        $data = array(
                    'start_date'=> $start_date,
                    'end_date'  => $end_date,
                    'is_accept' => $accepted,
                    'status'    => 1,
                    );
        $this->job->setParam($where);
        $this->job->setData($data);
        if ( $this->job->save() ){
             $json = array(
                            'error' =>  "success",
                            'err_msg'   => "Accepted successfull."
                        );
        }else{
            $json = array(
                            'error'     => "error",
                            'err_msg'   => "You rejected."
                        );
        }
        
        echo json_encode($json);
    }
    
    public function getTableNew($status){
        $this->job->getTableNew($status,$this->userid); // 
    }
    public function getTablePro(){
        $this->job->getTablePro($this->userid); // 
    }
    
    public function detail($noorder){
        $this->load->model('mjobdescimage','jobdescimage');
        $this->load->model('morders','order');
        
        $order = $this->orderdetail->getOrder($noorder);
        
        $orderDetail = $this->order->getOrder($noorder);
        
        $data['orderdetail'] = $orderDetail;
        
        $ukurDesc = $this->job->getDescUkur($noorder,$this->userid);
        $descUkur = "";
        $image = "";
        if ($ukurDesc){
            $where['where'] = array('jobdesc_id'=>$ukurDesc->id);
            $this->jobdescimage->setParam($where);
            $image    = $this->jobdescimage->getData();
            $descUkur = $ukurDesc;
        }
        
        $data['desc']      = $descUkur;
        $data['image']     = $image;
        $data['title']     = $this->lang->line('mytask');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('mytask');
        $data['formtitle'] = $this->lang->line('submit_your_task');
        $data['icon']      = "list";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                            array($data['title'] => 'mytask'),
                            'submit'
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $regCss = array(
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.css'),
                        );
        
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'),
                        base_url('assets/themes/default/global/plugins/plupload/js/plupload.full.min.js'),
                                               
                        );
        $this->theme_admin->registerCsshead($regCss);                
        $this->theme_admin->regsiterJsClosing($regJs);
        
               
        $addjs = "pages/mytask/js2";
        $this->theme_admin->registerScript($addjs);
       
        $view = 'mytask/completetask';
        $this->theme_admin->display($view,$data);
    }
    
    public function submit(){
        //$this->output->enable_profiler(true);
        
        $this->load->model('mjobdescimage','jobdescimage');
        
        $noorder        = $this->input->post("no_order", true);
        $isdone         = $this->input->post("isdone", true);
        $description    = $this->input->post("description", true);	
        $jobdescid      = $this->input->post("jobdescid", true);
        $imageId        = $this->input->post("imageid", true);
        $image          = $this->input->post("image", true);
        $imagethumbs    = $this->input->post("imagethumbs", true);
        $imageTitle     = $this->input->post("imageTitle", true);
        $count          = count($image);
        
       
        
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
            
	
        $where['where'] = array(
                            //'no_order' => $noorder,
                            //'user_id'  => $this->userid, 
                            'id'       => $jobdescid
                            );
       
        
        $data = array(
                    'description' => $description,
                    'status'      => $isdone,
                    );
        $this->job->setParam($where);
        $this->job->setData($data);
        
        $date = Date('Y-m-d H:i:s');
        for($i=0; $i < $count; $i++){
                $data = array(
                            'jobdesc_id'    => $jobdescid,
                            'title'         => $imageTitle[$i],
                            'image'         => $image[$i],
                            'image_thumbs'  => $imagethumbs[$i] ,
                            'create_date'   => $date,
                            );
               
                if (isset($imageId[$i])){
                    if ($imageId[$i] > 0){
                        $wherec['where'] = array(
                                    'id' => $imageId[$i]
                                    );
                        unset($data['image']);
                        unset($data['image_thumbs']);
                        $this->jobdescimage->setParam($wherec);
                    }
                }
                $this->jobdescimage->setData($data);
                if($this->jobdescimage->save()){
                    $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
                }
                
            }
        
        if ( $this->job->save() ){
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
        }
        
        
        if ($isdone==2){
            $jobdesc = $this->job->getData(true);
                 
            $this->load->model('muser');
                 
            $desainer = $this->muser->getDasignerAvailable();
                 
            if ($desainer){
                $dateStar = date('Y-m-d H:i:s');
                $dateT = new DateTime( date('Y-m-d H:i:s') );// date('Y-m-d H:i:s');
                $dateE = $dateT->add(new DateInterval('P8D'));
                  
                $dateE = $dateE->format('Y-m-d H:i:s');
                $this->job->ClearSelect();    
                $jobdes = array(
                                'parent_id'     => $jobdescid, //$jobdesc->id,
                                'no_order'      => $noorder,                           
                                'user_id'       => $desainer->user_id,
                                'status'        => 0,
                                //'description'   => '',
                                'start_date'    => $dateStar,
                                'end_date'      => $dateE,
                                'is_accept'     => 0,
                                'assign_by'     => 0,
                                'assign_date'   => $dateStar
                             );
                $this->job->setData($jobdes);
                    
                if ( $this->job->save() ){
                    $this->load->library('email');
                    $this->load->model('morders','orders');
                    $this->load->model('muser','user');
                    
                    $param['where'] = array('no_order' => $noorder );
                    $this->orderdetail->setParam($param);
                    $orderDetail = $this->orderdetail->getData();        
                    
                    $this->orders->setParam($param);
                    $orders = $this->orders->getData(true);
                   
                    $param['where'] = array('id' => $orders->user_id );
                    $this->user->setParam($param  );
                    $profile = $this->user->getData(true );
                    
                    $data['orderDetail']    = $orderDetail;
                    $data['memberProfile']  = $profile;
                    $data['noorder']        = $noorder;
                    $data['descTukangUkur'] = $jobdesc->description;
                    
                    $emailed = $this->load->view('mail/emailtodesainer',$data,TRUE);
                        
                    $config['wordwrap'] = TRUE;
                    $config['protocol'] = "sendmail";
                        
                    $config['mailtype'] = 'html';
                    $this->email->initialize($config);
                               
        
                    $this->email->from('cs@modelines.id', 'Modelines.ID');
                    $this->email->to($desainer->email);
                        
                    $this->email->subject('New Order');
                    $this->email->message($emailed);
                    $this->email->send();
                }
            }
        }     
        $this->session->set_flashdata($message);    
        redirect('mytask');
    }
    
    public function doupload(){ 
       $this->load->library('upload');
       $output = array(
                    "jsonrpc"   => "2.0", 
                    "result"    => "false", 
                    "id"        => "id"
                    );
        if (!empty($_FILES)) {
            $img = $this->job->uploadImage('uploads', 'file');
           
            $image       = str_replace('..'.DIRECTORY_SEPARATOR,'',$img['image_path']); 
            $image_thumbs= str_replace('..'.DIRECTORY_SEPARATOR,'', $img['thumb_path']);
            $uniqId      = uniqid();
            $addtag      = '<tr id="'.$uniqId.'">
                                <td><a href="'. ROOT . $image.'" class="fancybox-button" data-rel="fancybox-button">
                                    <img class="img-responsive" src="'. ROOT . $image_thumbs.'" alt=""> </a>
                                                </td>
                                                <td>
                                                    <input type="hidden" value="'.$image.'" name="image[]" id="img_'.$uniqId.'" />
                                                    <input type="hidden" value="'.$image_thumbs.'" name="imagethumbs[]" id="imgthumbs_'.$uniqId.'"/>
                                                    <input type="text" class="form-control" name="imageTitle[]" value="Thumbnail image"> 
                                                </td>                                                                                                                        
                                                <td>
                                                    <a href="#" class="btn btn-default btn-sm removeimage" data-url="'.site_url('mytask').'" data-trid="'.$uniqId.'" data-id="0">
                                                    <i class="fa fa-times"></i> Remove </a>
                                                </td>
                                            </tr>';
           $output = array(
                        "jsonrpc"     => "2.0", 
                        "result"      => "OK", 
                        "id"          => $uniqId,
                        "addtag"      => $addtag,
                    );   
        }
        
        echo json_encode($output);
    }
    
    public function deleteimage(){
        $this->load->model('mjobdescimage','jobdescimage');
        
        
        $id = $this->input->post('id', true);
        $where['where'] = array('id'=>$id);
        
        $output = array('error'=>1);
        $this->jobdescimage->setParam($where);    
            
        $row = $this->jobdescimage->getData(true);
            
        if ($this->jobdescimage->delete()){
            $output = array('error'=>0);   
            
            $this->deleteFile($row->image,$row->image_thumbs); 
        }
            
        echo json_encode($output);
       
    }
    
    public function deleteimagefile(){
        $output = array('error'=>1);
        $delet = $this->deleteFile();
        if ($delet){
            $output = array('error'=>0);
        }
        json_encode($output);
    }
    
    public function deleteFile($img='', $imgthumbs=''){
        
        
        $this->load->helper('file');
        
        $imgb = $this->input->post("imgb", true);
        $imgt = $this->input->post("imgt", true);
        
        if ($img && $imgthumbs){
            $imgb = $img;
            $imgt = $imgthumbs;
        }
        
        $doc = $_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR. "khanza" . DIRECTORY_SEPARATOR  ;
        
        $fileB = $doc . $imgb;
        $fileT = $doc . $imgt;
        $infoImg = get_file_info($fileB);  
        $infoImgT= get_file_info($fileT); 
        
        $isImgB = $infoImg["size"];
        
        $isImgT = $infoImgT["size"];
       
        if ( $isImgB > 0 ){
            //var_dump($fileB);
            $isdeletB = unlink($fileB);
            //var_dump($isdeletB);
        }
        if ( $isImgT > 0 ){
            $isdeletT = unlink($fileT);
            //var_dump($isdeletT);
        }
       
        if ( $isImgB == true || $isImgT == true){
            return true;  
        }else{
            return false;
        }
    }
    
    public function view($noorder){
        $this->load->model('morders','order');
        
        $data['title']    = $this->lang->line('mytask');
        $data['subTitle']  = "";//$this->lang->line('list_of').$this->lang->line('mytask');
        $data['formtitle'] = $this->lang->line('summary_task');
        $data['icon']      = "list";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                            $data['title'],
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $order = $this->orderdetail->getOrder($noorder);
        
        $orderDetail = $this->order->getOrder($noorder);
        
        $data['orderdetail'] = $orderDetail;
        
       
        $data['dataorder'] = $order;
        $data['noorder'] = $noorder;
        
        $param2['where'] = array(
                               'no_order' => $noorder, 
                               'user_id'  => $this->userid,
                               'status'   => 0 
                            );
        $this->job->setParam($param2);
        $job = $this->job->getData(true);
        $data['jobdesc'] = $job;
        
        $view = 'mytask/detail';
        $this->theme_admin->display($view,$data);
    }
    
    public function assign2(){
        	
        $id  = $this->input->post("id", true);
        $accepted = $this->input->post("accepted", true);
        $star = 0;
        if ($accepted==2){
            $star = 1;
        }elseif ($accepted==1){
            $star = 3;
        }
        
        $where['where'] = array(
                            'id' => $id,
                            'user_id'  => $this->userid
                            );
        $dateStar = date('Y-m-d H:i:s');
        $dateT = new DateTime( $dateStar );// date('Y-m-d H:i:s');
        $dateT->add(new DateInterval('P8D'));
        $end_date = $dateT->format('Y-m-d H:i:s');
        
        $data = array(
                    'start_date'=> $dateStar,
                    'end_date'  => $end_date,
                    'is_accept' => $accepted,
                    'status'    => $star,
                    );
        $this->job->setParam($where);
        $this->job->setData($data);
        if ( $this->job->save() ){
            $this->load->library('email');
            
            if ($accepted == 2){
                $noorder = $this->input->post("noorder", true);
                
                $this->load->model('morderhistory');
                $this->load->model('morders','order');
                
                $addHistory['no_order'] = $noorder;
                $addHistory['status_id'] = 4;
                $addHistory['comment']   = "Dalam proses tukang ukur"; 
                $addHistory['customer_notif'] = 1;
                $addHistory['created_date'] = date('Y-m-d H:i:s');
                $addHistory['created_by'] = $this->userid;
                                
                $this->morderhistory->setData($addHistory);
                $this->morderhistory->save();
                
                
                
                /*$infoOrder = $this->order->getOrder($noorder);
                $data['info'] = $infoOrder;
                
                $emailed = $this->load->view('mail/status_4',$data,TRUE);
                $this->email->from('cs@modelines.id', 'Modelines.ID');
                $this->email->to($infoOrder->email);
                $this->email->subject('Proses Pengukuran ( tukang ukur )');
                $this->email->message($emailed);
                $this->email->send();*/
                
              
                $json = array(
                            'error' =>  "success",
                            'err_msg'   => "Accepted successfull."
                        );
             }else{
                $json = array(
                            'error' =>  "error",
                            'err_msg'   => "You rejected."
                        );
             }
        }else{
            $json = array(
                            'error'     => "error",
                            'err_msg'   => "You rejected."
                        );
        }
        
        redirect('mytask');
    }
}