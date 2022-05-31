<?php
class Categoryproduct extends MY_Controller{
    
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
       
        $view = 'categoryproduct/index';
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
        
        $addjs = "pages/categoryproduct/js";
        $this->theme_admin->registerScript($addjs);
        
        $view = 'categoryproduct/form';
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
        
        $addjs = "pages/categoryproduct/js";
        $this->theme_admin->registerScript($addjs);
        
        
        $param['where'] = array('id'=>$id);
        $this->category->setParam($param);
                
        $data['category']    = $this->category->getData(true);
        $parent = $this->category->getTop(1);
        $data['parents'] = $parent;
        
        $view = 'categoryproduct/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
        $this->output->enable_profiler(true);
        
        
        //$post = $_POST;
        
        //var_dump($_POST);
        $id                         = $this->input->post('id', true);
        $data['category_name']      = $this->input->post('category_name', true); 
        $data['slug']               = $this->category->getSlug($data['category_name'],'slug') ;
        $data['category_type']      = 1; 
        $data['user_id']            = $this->userid;
        $parent_id                  = $this->input->post('parent_id', true);    
        if ($id){
            $param['where'] = array('id'=>$id);
            $this->category->setParam($param);
        }else{
            $data['create_at']          = date('Y-m-d H:i:s');            
                        
        }
        
        if (!empty($_FILES["userfile"]["size"])){
		
    		$this->load->library('upload');
    		$img    = $this->category->uploadImage("category","userfile",true,220,0,false);
                                    
            $data['image_big']= str_replace('../','', $img['image_path']);
            $data['image']   = str_replace('../','', $img['thumb_path']);
                
		}
        
        /*if ($parent_id != 0){
            $category_desc = $this->category->getParentDesc($parent_id);
            $data['category_desc']   = $category_desc;
        }*/
       
        //$this->category->addData($data);
        $this->category->setData($data);
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        if ( $this->category->save() ){
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
        }
        
        $this->session->set_flashdata($message);    
        redirect('categoryproduct');
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
       
	   $this->category->getDataTable('1');
    }
    
    public function deleteImage(){
        $id = $this->input->post('id',true);
        $param['where'] = array('id'=> $id );
        $this->category->setParam($param);
        $data = $this->category->getData(true);
        
        if ( $data ){   
            $image       = "../". $data->image;
            $image_big   = "../". $data->image_big;
            
            
            @unlink($image);
            @unlink($image_big);
            
            $update = array('image' => '', 'image_big'=> '');
            $this->category->setData($update);
            $this->category->save();
        }
        
        
    }
    
    public function hapusImage(){
        $image = "/public_html/assets/images/category/thumbs/thumb_f98b535b1813ce1203856a876b793bc0.PNG";
        $image2 = "../assets/images/category/thumbs/thumb_f98b535b1813ce1203856a876b793bc0.PNG";
        unlink($image);
        unlink($image2);
    }
}