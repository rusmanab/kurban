<?php
class Threadorder extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mjobdesc','jobdesc');
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
        
        $addjs = "global/jslist";
        $this->theme_admin->registerScript($addjs);
       
        $view = 'threadorder/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function read($noorder,$id=''){
        //$this->output->enable_profiler(true);
        
        if (!$noorder){
            redirect('threadorder');
        }
        $this->load->model('mcommentsorder','commen');
        $this->load->model('morders','orders');
        $this->load->model('mjobdescimage');
        
        if ($id){
            $this->commen->setReadComment($id);
        }
        
        
        $desainerDesc = $this->jobdesc->getDescDesainer($noorder, $this->userid);
        
        $data['noorder']   = $noorder;
        $data['desainerDesc']          = $desainerDesc;
        
        $data['title']     = $this->lang->line('mytask');
        $data['subTitle']  = " Tread #".$noorder;
        $data['formtitle'] = $this->lang->line('summary_task');
        $data['icon']      = "list";
        $m = $this->lang->line('list_of').$this->lang->line('mytask');
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array($m => 'threadorder'),
                             '#'.$noorder
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $regCss = array(
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.css'),
                        base_url('assets/themes/default/global/plugins/cubeportfolio/css/cubeportfolio.css'),
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                        );
        
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'),
                        base_url('assets/themes/default/global/plugins/plupload/js/plupload.full.min.js'),
                        base_url('assets/themes/default/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js'),
                        base_url('assets/themes/default/pages/scripts/portfolio-1.min.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),                                               
                        );
        
        $this->theme_admin->registerCsshead($regCss);                
        $this->theme_admin->regsiterJsClosing($regJs);
        
        
        //$addjs = "pages/threadorder/js";
        //$this->theme_admin->registerScript($addjs);
        
        $addjs = "pages/threadorder/js";
        $this->theme_admin->registerScript($addjs);
        
        $orderinfo = $this->orders->getOrder($noorder);
        $data['orderinfo'] = $orderinfo;
        
        $orderComment = $this->commen->getTread($noorder);
        $data['comments'] = $orderComment;
        
        $where['where'] = array(
                            'jobdesc_id'=>$desainerDesc->id
                            );
        $where['order_by'] = "id DESC";
        
        $this->mjobdescimage->setParam($where);
        $image    = $this->mjobdescimage->getData();
        $data['image']  = $image;
        
        
        
        $hasilukur = $this->jobdesc->getDescUkur($noorder);
       
        $data['hasilukur'] = $hasilukur;
        
        
        
        $view = 'threadorder/detail';
        $this->theme_admin->display($view,$data);
    }
    
    public function submitcomment(){
        $this->load->model('mcommentsorder','commen');
        $this->load->model('morderhistory');
        
        
        $noorder    = $this->input->post('noorder', true);
        $comment    = $this->input->post('comment', true);
        $parentid   = 0;
        $redirect   = 'threadorder';
        
        if (isset($_POST['parent_id'])){
            $parentid = $this->input->post('parent_id', true);
            $redirect.= '/read/'.$noorder;
        }
        
        
        if (!empty($_FILES["image_att"]["size"])){
		
    		$this->load->library('upload');
    		$img    = $this->commen->uploadImage("post");
                                    
    		$data['image_att']          = str_replace('../','',$img['image_path']);
           
                
		}
        
        $data = array(
                    'parent_id'     => $parentid,
                    'no_order'      => $noorder,
                    'comment'       => $comment,
                    'user_id'       => $this->userid,
                    'created_date'  => date('Y-m-d H:i:s'),
                    );
        
        $this->commen->setData($data);
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        if ( $this->commen->save() ){
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
        }
        
        $jobdescid      = $this->input->post("jobdescid", true);
        $image          = $this->input->post("image", true);
        $imagethumbs    = $this->input->post("imagethumbs", true);
        $imageTitle     = $this->input->post("imageTitle", true);
        $count          = count($image);
        
        $this->load->model('mjobdescimage','jobdescimage');
        $date = Date('Y-m-d H:i:s');
        for($i=0; $i < $count; $i++){
            $data = array(
                        'jobdesc_id'    => $jobdescid,
                        'title'         => $imageTitle[$i],
                        'image'         => $image[$i],
                        'image_thumbs'  => $imagethumbs[$i] ,
                        'create_date'   => $date,
                    );
                
            $this->jobdescimage->setData($data);
            $this->jobdescimage->save();
                
        }
        
        $addHistory = array(
                        'no_order'      => $noorder,
                        'comment'       => 'proses desain pakaian',
                        'status_id'     => 5,
                        'customer_notif'=> 1,
                        'created_date'  => date('Y-m-d H:i:s'),
                        'created_by'    => $this->userid
                        );
        $this->morderhistory->setData($addHistory);
        $this->morderhistory->save();
        
        $this->session->set_flashdata($message);    
        redirect($redirect);
    }
    
    public function addDesain(){
        $this->load->model('mjobdescimage');
        
        $noorder    = $this->input->post("noorder", true);
        $jobdesc_id = $this->input->post("jobdesc_id", true);
        $title      = $this->input->post("title", true);
        
        $data = array(
                    'jobdesc_id'    => $jobdesc_id,
                    'title'         => $title,
                    'create_date'   => date("Y-m-d H:i:s")
                );
        
        if (!empty($_FILES["userfile"]["size"])){
		
    		$this->load->library('upload');
    		$img    = $this->mjobdescimage->uploadImage("uploads","userfile",true,330,0);
                                
            $data['image']          = str_replace('../','', $img['image_path']);
            $data['image_thumbs']   = str_replace('../','', $img['thumb_path']);
		}
        
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        
        $this->mjobdescimage->setData($data);
        if ( $this->mjobdescimage->save()  ){
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
        }
        
        
        $this->session->set_flashdata($message);    
        $redirect   = 'threadorder/read/'.$noorder;
        redirect($redirect);
    }
    
    public function get_table(){
       
	   $this->jobdesc->getTablePro2($this->userid);
    }
    
    public function newtask($noorder){
        $this->load->model('morderdetail','orderdetail');
        
        $data['title']    = $this->lang->line('new_task');
        $data['subTitle']  = "";//$this->lang->line('list_of').$this->lang->line('mytask');
        $data['formtitle'] = $this->lang->line('summary_task');
        $data['icon']      = "list";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                            $data['title'],
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $order = $this->orderdetail->getOrder($noorder);
        $data['dataorder'] = $order;
        $data['noorder'] = $noorder;
        
        
        $job = $this->jobdesc->getJobDesc2($noorder,$this->userid); // desainer
        
       
        $fitter = $this->jobdesc->JobdesDetail($job->parent_id);
        
        $data['jobdesc'] = $job;
        $data['descFitter'] = $fitter;
        $view = 'threadorder/newtask';
        $this->theme_admin->display($view,$data);
    }
    
    public function accept(){
        $this->load->model('mjobdesc','job');
        
        $id  = $this->input->post("id", true);
        $accepted = $this->input->post("accepted", true);
        $star = 0;
        if ($accepted==2){
            $star = 1;
        }
        
        if ($accepted==1){
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
                $addHistory['status_id'] = 5;
                $addHistory['comment']   = "Dalam proses desain"; 
                $addHistory['customer_notif'] = 1;
                $addHistory['created_date'] = date('Y-m-d H:i:s');
                $addHistory['created_by'] = $this->userid;
                                
                
                $this->morderhistory->setData($addHistory);
                $this->morderhistory->save();
                
                
                
                /*$infoOrder = $this->order->getOrder($noorder);
                $data['info'] = $infoOrder;
                
                $emailed = $this->load->view('mail/status_5',$data,TRUE);
                $this->email->from('cs@modelines.id', 'Modelines.ID');
                $this->email->to($infoOrder->email);
                $this->email->subject('Proses desain ( Desainer )');
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
        
        redirect('threadorder');
    }
    
}