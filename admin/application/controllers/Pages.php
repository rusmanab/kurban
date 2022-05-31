<?php
class Pages extends MY_Controller{
    
    public $model;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mpost','post');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('page');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('page');
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
       
        $view = 'page/index';
        $this->theme_admin->display($view,$data);
    }
    public function add(){
        //$this->output->enable_profiler(true);
        
        $data['title']     = $this->lang->line('page');
        $data['subTitle']  = $this->lang->line('create_new') . $this->lang->line('posting');
        $data['formtitle'] = $this->lang->line('add');
        $data['icon']      = "sticky-note-o";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'post' ),
                             $this->lang->line('add')
                             );
                             
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $regCss = array(
                       base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/tinymce/tinymce.min.js'),  
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),                      
                        );
        
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "pages/page/js";
        $this->theme_admin->registerScript($addjs);
        
        
                
        $this->load->model('mcategory','category');
        $param['where'] = array ('category_type' => '1');
        $this->category->setParam($param);
        $categories = $this->category->getData();
        
        $data['categories'] = $categories;
        
        
        $view = 'page/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function edit($id){
        //$this->output->enable_profiler(true);
        
        $data['title']     = $this->lang->line('page');
        $data['subTitle']  = strtolower( $this->lang->line('edit') ." ". $this->lang->line('page') );
        
        $data['icon']      = "sticky-note-o";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'post' ),
                             $this->lang->line('edit')
                             );
                             
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $regCss = array(
                       base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/tinymce/tinymce.min.js'),  
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),                      
                        );
        
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "pages/page/js";
        $this->theme_admin->registerScript($addjs);
        
        
        $param['where'] = array('id'=>$id);
        $this->post->setParam($param);
        $post = $this->post->getData();;
                
        $this->load->model('mcategory','category');
        $param['where'] = array ('category_type' => '1');
        $this->category->setParam($param);
        $categories = $this->category->getData();
        
        $data['categories'] = $categories;
        $data['post']    = $post;
        
        $data['formtitle'] = $this->lang->line('edit') . " <strong>" . $post[0]->post_title . "</strong>";
        
        $view = 'page/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
        //$this->output->enable_profiler(true);
        $post = $_POST;
        $this->post->input($post);
        if ($post["id"]){
            $param['where'] = array('id'=>$post["id"]);
             $data['post_modify_date'] = date('Y-m-d H:i:s');
             $this->post->setParam($param);
        }else{
            $data['post_created_date']  = date('Y-m-d H:i:s');            
            $data['url_slug']           = $this->post->getSlug($post['post_title'],'url_slug') ;
            $data['post_type']          = 'pages'; 
            $data['user_id']            = $this->userid;
            
        }
        $hasError = false;
        if (!empty($_FILES["userfile"]["size"])){
		
    		$this->load->library('upload');
    		$img    = $this->post->uploadImage("pages");
                             
             
            $hasError = $img["error"];  
            if (!$hasError){
                $data['post_image']          = str_replace('../','',$img['image_path']);
                $data['post_image_thumbs']   = str_replace('../','', $img['thumb_path']);    
            }  
		}
        
        
        
        $this->post->addData($data);
        
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        if ( !$hasError ){
            if ( $this->post->save() ){
                $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
            }
        }
        
        $this->session->set_flashdata($message);    
        redirect('pages');
        
        
    }
    
    
   
    public function get_table(){
       //$this->output->enable_profiler(true);
       
	   $this->post->getDataTable('pages');
    }
}