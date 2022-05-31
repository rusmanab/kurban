<?php
class Videos extends MY_Controller{
    
    public $model;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mproductvideo','video');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('video');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('video');
        $data['formtitle'] = "";
        $data['icon']      = "list";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                            $data['title'],
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
       
        $regCss = array(
                        base_url('assets/themes/default/global/plugins/datatables/datatables.min.css'),
                        base_url('assets/themes/default/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/bootbox/bootbox.min.js'),
                        base_url('assets/themes/default/global/plugins/datatables/datatables.min.js'),  
                        base_url('assets/themes/default/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'),                        
                        );
                        
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "global/jslist";
        $this->theme_admin->registerScript($addjs);
       
        $view = 'videos/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function add(){
        $data['title']     = $this->lang->line('video');
        $data['subTitle']  = $this->lang->line('create_new') . $this->lang->line('video');
        $data['formtitle'] = $this->lang->line('add');
        $data['icon']      = "sticky-note-o";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'video' ),
                             $this->lang->line('add')
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $regCss = array(
                       base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),                       
                        );
                         
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        $this->load->model('mproduct');
        $data['products'] = $this->mproduct->listAllProduct();
        
        $addjs = "pages/videos/js";
        $this->theme_admin->registerScript($addjs);
        
        $view = 'videos/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function edit($id){
        //$this->output->enable_profiler(true);
        $this->load->model('mproduct');
        
        
        $data['title']     = $this->lang->line('batik');
        $data['subTitle']  = $this->lang->line('edit') . $this->lang->line('batik');
        $data['formtitle'] = $this->lang->line('edit');
        $data['icon']      = "edit";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'video' ),
                             $this->lang->line('edit')
                             );
                             
        $data['breadcrumb'] = breadcrumb($breadcrumb);
       $regCss = array(
                       base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),                       
                        );
                         
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "pages/post/js";
        $this->theme_admin->registerScript($addjs);
        
        
        $param['where'] = array('id'=>$id);
        $this->video->setParam($param);
                
        $data['video']    = $this->video->getData(true);
        $data['products'] = $this->mproduct->listAllProduct();
        
        $view = 'videos/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
        $this->output->enable_profiler(true);
        
        $id = $this->input->post("id", true);
        $title = $this->input->post("title", true);
        $product_id = $this->input->post("product_id", true);
        $iframe = $this->input->post("iframe", true);
       
        $data = array(
                    'product_id'    => $product_id,
                    'title'         => $title,                       
                    'iframe'        => $iframe,
                    );
                    
        if ($id){
            $param['where'] = array('id'=> $id);
            $this->video->setParam($param);
        }else{
            $data['created_at']  = date('Y-m-d H:i:s'); 
            $data['slug']        = $this->video->getSlug($title,'slug') ;   
        }
        
        if (!empty($_FILES["userfile"]["size"])){
		
    		$this->load->library('upload');
    		$img    = $this->video->uploadImage("video","userfile",true,220,0);
            $data['image_thumbs']   = str_replace('../','', $img['thumb_path']);
		}
        
        
        $this->video->setData($data);
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        if ( $this->video->save() ){
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
        }
        
        $this->session->set_flashdata($message);    
        redirect('videos');
    }
    
    public function delete(){
		$id   =explode(',',$this->input->post('id',true));
        
		$tot=count($id);
	
        
		if (!empty($id)){
			for($i=0;$i < $tot;$i++){
				$param['where'] = array('id'=> $id[$i] );
                $this->video->setParam($param);
            
                    $result =$this->video->delete();
                    if ($result){
                        $alert ="success";
                       	$pesan = '<i class="icon-exclamation-sign"> </i><strong>'.$this->lang->line('msg_delete').'</strong>';
                    }else{
                        $alert ="error";
                        $pesan = '<i class="icon-exclamation-sign"> </i><strong>'.$this->lang->line('msg_undelete').'</strong>';
                    }
		  }
           $output = array(
                        'type'=>$alert,
                        'pesan'=>$pesan
                    );
           echo json_encode($output);	      
		}       
	}
        
   
    public function get_table(){
       
	   $this->video->getDataTable('0');
    }
    
    public function getvideo($tipe='1'){
        $this->output->set_content_type('application/json');
        
        $q = $this->input->get_post('q', true);
        
        $video = $this->video->loadvideo($q);
        
        $data = array(
                    'total_count'           => count($video),
                    'incomplete_results'    => false,
                    'items'                 => $video
                    );
        $this->output->set_output(json_encode($data));
        // echo json_encode($data);
    }
    
    public function deletevideo(){
        $this->output->set_content_type('application/json');
        
        $id = $this->input->post('id', true);
        $response['error'] = true;
        if ($id){
            $param['where'] = array(
                                'id' =>$id
                                );
            $this->video->setParam($param);
            if ($this->video->delete()){
                $response['error'] = false;    
            }
        }
        
        $this->output->set_output(json_encode($response));
        
    }
}