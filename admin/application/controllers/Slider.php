<?php
class Slider extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mslider','slide');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('image_slider');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('image_slider');
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
       
        $view = 'slide/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function add(){
        $data['title']     = $this->lang->line('image_slider');
        $data['subTitle']  = $this->lang->line('create_new') . $this->lang->line('image_slider');
        $data['formtitle'] = $this->lang->line('add');
        $data['icon']      = "sticky-note-o";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'image_slider' ),
                             $this->lang->line('add')
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $regCss = array(
                       base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                       base_url('assets/themes/default/global/plugins/select2-4.0.3/css/select2.min.css'),
                       base_url('assets/themes/default/global/plugins/select2/css/select2-bootstrap.min.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/tinymce/tinymce.min.js'),  
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),
                        base_url('assets/themes/default/global/plugins/select2-4.0.3/js/select2.full.min.js'),                       
                        );
                         
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "pages/slide/js";
        $this->theme_admin->registerScript($addjs);
       
        
        $view = 'slide/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function edit($id){
        //$this->output->enable_profiler(true);
        
        $data['title']     = $this->lang->line('image_slider');
        $data['subTitle']  = $this->lang->line('edit') . $this->lang->line('image_slider');
        $data['formtitle'] = $this->lang->line('edit');
        $data['icon']      = "edit";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'image_slider' ),
                             $this->lang->line('edit')
                             );
                             
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $regCss = array(
                       base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                       base_url('assets/themes/default/global/plugins/select2-4.0.3/css/select2.min.css'),
                       base_url('assets/themes/default/global/plugins/select2/css/select2-bootstrap.min.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/tinymce/tinymce.min.js'),  
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),
                        base_url('assets/themes/default/global/plugins/select2-4.0.3/js/select2.full.min.js'),                       
                        );
                         
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "pages/slide/js";
        $this->theme_admin->registerScript($addjs);
        
        
        $param['where'] = array('id'=>$id);
        $this->slide->setParam($param);
                
        $this->load->model('mcategory','category');
        $param['where'] = array ('category_type' => '0');
        $this->category->setParam($param);
        $categories = $this->category->getData();
        
        $data['categories'] = $categories;
        $data['post']    = $this->slide->getData();
        
        
        $view = 'slide/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
        $this->output->enable_profiler(true);
         
        $id         = $this->input->post("id", true);
        $title      = $this->input->post("title", true);
        $status     = $this->input->post("status", true);
        $desc       = $this->input->post("desc", true);
        $link_target= $this->input->post("link_target", true);
        
        $data = array(
                        'title'         => $title,
                        'status'        => $status,
                        'desc'          => $desc,
                        'link_target'   => $link_target,
                        );
        
        if ($id){
            $param['where'] = array('id'=>$id);
             $data['created_at'] = date('Y-m-d H:i:s');
             $this->slide->setParam($param);
        }else{
            $data['created_at']  = date('Y-m-d H:i:s');
            $data['user_id']     = $this->userid;
            
        }
        $data['slug']           = $this->slide->getSlug($title,'slug') ;
        $this->load->library('upload');
        if (!empty($_FILES["userfile"]["size"])){
		
    		
    		$img    = $this->slide->uploadImage("slider");
                                 
    		$data['image']          = str_replace('../','',$img['image_path']);
            $data['thumbs']   = str_replace('../','', $img['thumb_path']);  
                
		}
        if (!empty($_FILES["imageMobile"]["size"])){
		
    	   
    		$img    = $this->slide->uploadImage("slider","imageMobile");
          
    		$data['image_mobile']   = str_replace('../','',$img['image_path']);
		}
       
        $this->slide->addData($data);
       
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        $category_Id = $this->input->post("category_id", true);
       
        if ( $this->slide->save() ){
            
            $slider_id = $this->slide->lastInsert();
          
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
        }
        $this->load->model('mslidercategory','pc');
        if ( !$id ){
            if ( $slider_id ){
                if ($category_Id){
                    for($i=0; $i < count($category_Id); $i++){
                        $pcategory = array(
                                        'slider_id' => $slider_id,
                                        'category_id'     => $category_Id[$i]
                                    );
                        
                        $this->pc->setData($pcategory);                
                        $this->pc->save();             
                    }
                }
            }
        }else{
           
            $where['where'] = array('slider_id'=>$id);
            $this->pc->setParam($where);
            $this->pc->delete();
            $this->pc->ClearSelect();
            if ($category_Id){
                for($i=0; $i < count($category_Id); $i++){
                    $pcategory = array(
                                    'slider_id'    => $id,
                                    'category_id'   => $category_Id[$i]
                                );
                    
                    $this->pc->setData($pcategory);                
                    $this->pc->save();             
                }
            }
         
        }
        
        $this->session->set_flashdata($message);    
        redirect('slider');
    }
    
    public function delete(){
		$id   =explode(',',$this->input->slide('id',true));
        
		$tot=count($id);
	
        
		if (!empty($id)){
			for($i=0;$i < $tot;$i++){
				$param['where'] = array('id'=> $id[$i] );
                $this->slide->setParam($param);
            
                    $result =$this->slide->delete();
                    if ($result){
                        $alert ="success";
                       	$pesan = '<i class="icon-exclamation-sign"> </i> <strong>'.$this->lang->line('msg_delete').'</strong>';
                    }else{
                         $alert ="error";
                        $pesan = '<i class="icon-exclamation-sign"> </i> <strong>'.$this->lang->line('msg_undelete').'</strong>';
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
       
	   $this->slide->getDataTable();
    }
}