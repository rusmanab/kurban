<?php
class Categorypromo extends MY_Controller{
    
    public $model;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mcategory','category');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('category');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('category');
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
       
        $view = 'categorypromo/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function add(){
        $data['title']     = $this->lang->line('category');
        $data['subTitle']  = $this->lang->line('create_new') . $this->lang->line('category');
        $data['formtitle'] = $this->lang->line('add');
        $data['icon']      = "sticky-note-o";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'category' ),
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
        
        
        $parent = $this->category->getTop(1);
        $data['parents'] = $parent;
        
        $addjs = "pages/categorypromo/js";
        $this->theme_admin->registerScript($addjs);
        
        $view = 'categorypromo/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function edit($id){
        //$this->output->enable_profiler(true);
        
        $data['title']     = $this->lang->line('batik');
        $data['subTitle']  = $this->lang->line('edit') . $this->lang->line('batik');
        $data['formtitle'] = $this->lang->line('edit');
        $data['icon']      = "edit";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'category' ),
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
        $this->category->setParam($param);
                
        $data['category']    = $this->category->getData(true);
        $parent = $this->category->getTop(1);
        $data['parents'] = $parent;
        
        $view = 'categorypromo/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
        $this->output->enable_profiler(true);
       
        
        $post = $_POST;
        $this->category->input($post);
        $data['category_name'] = $this->input->post('category_name', true);
                 
        $data['slug']               = $this->category->getSlug($post['category_name'],'slug') ;
            
            
        if ($post["id"]){
            $param['where'] = array('id'=>$post["id"]);
            $this->category->setParam($param);
        }else{
            $data['create_at']  = date('Y-m-d H:i:s');   
            $data['category_type']      = 2; 
            $data['user_id']            = $this->userid;
        }
        $this->load->library('upload');
        if (!empty($_FILES["userfile"]["size"])){
		
    		
    		$img    = $this->category->uploadImage("category","userfile",true,220,0);
                               
            $data['image_big']= str_replace('../','', $img['image_path']);
            $data['image']    = str_replace('../','', $img['thumb_path']);
                
		}
        
        if (!empty($_FILES["imageMobile"]["size"])){
    		$img    = $this->category->uploadImage("category","imageMobile");
                                 
    		$data['image_mobile']   = str_replace('../','',$img['image_path']);
		}
        
        $this->category->addData($data);
        
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        if ( $this->category->save() ){
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
        }
        
        $this->session->set_flashdata($message);    
        redirect('categorypromo');
    }
    
    public function delete(){
		$id   =explode(',',$this->input->post('id',true));
        
		$tot=count($id);
	
        
		if (!empty($id)){
			for($i=0;$i < $tot;$i++){
				$param['where'] = array('id'=> $id[$i] );
                $this->category->setParam($param);
            
                    $result =$this->category->delete();
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
       
	   $this->category->getDataTable('2');
    }
    public function getCategory($tipe='2'){
        $this->output->set_content_type('application/json');
        
        $q = $this->input->get_post('q', true);
        
        $category = $this->category->loadCategory($q,$tipe);
        
        $data = array(
                    'total_count'           => count($category),
                    'incomplete_results'    => false,
                    'items'                 => $category
                    );
        $this->output->set_output(json_encode($data));
        // echo json_encode($data);
    }
}