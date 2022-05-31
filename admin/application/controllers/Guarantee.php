<?php
class Guarantee extends MY_Controller{
    
    public $model;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mguarantee','guarantee');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('guarantee');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('guarantee');
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
       
        $view = 'guarantee/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function add(){
        $data['title']     = $this->lang->line('guarantee');
        $data['subTitle']  = $this->lang->line('create_new') . $this->lang->line('guarantee');
        $data['formtitle'] = $this->lang->line('add');
        $data['icon']      = "sticky-note-o";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'guarantee' ),
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
        
        
        $addjs = "pages/guarantee/js";
        $this->theme_admin->registerScript($addjs);
        
        $view = 'guarantee/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function edit($id){
        //$this->output->enable_profiler(true);
        
        $data['title']     = $this->lang->line('guarantee');
        $data['subTitle']  = $this->lang->line('edit') . " ". $this->lang->line('guarantee');
        $data['formtitle'] = $this->lang->line('edit');
        $data['icon']      = "edit";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'guarantee' ),
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
        $this->guarantee->setParam($param);
                
        $data['guarantee']    = $this->guarantee->getData(true);
       
        $view = 'guarantee/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
        $this->output->enable_profiler(true);
        
        
        $post = $_POST;
        $this->guarantee->input($post);
        if ($post["id"]){
            $param['where'] = array('id'=>$post["id"]);
            $this->guarantee->setParam($param);
        }else{
            $data['created_date']  = date('Y-m-d H:i:s');            
          
        }
        
        
        
        $this->guarantee->addData($data);
        
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        if ( $this->guarantee->save() ){
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
        }
        
        $this->session->set_flashdata($message);    
        redirect('guarantee');
    }
    
    public function delete(){
		$id   =explode(',',$this->input->post('id',true));
        
		$tot=count($id);
	
        
		if (!empty($id)){
			for($i=0;$i < $tot;$i++){
				$param['where'] = array('id'=> $id[$i] );
                $this->guarantee->setParam($param);
            
                    $result =$this->guarantee->delete();
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
       
	   $this->guarantee->getDataTable('0');
    }
    
    public function getBrand($tipe='1'){
        $this->output->set_content_type('application/json');
        
        $q = $this->input->get_post('q', true);
        
        $brand = $this->guarantee->loadBrand($q);
        
        $data = array(
                    'total_count'           => count($brand),
                    'incomplete_results'    => false,
                    'items'                 => $brand
                    );
        $this->output->set_output(json_encode($data));
        // echo json_encode($data);
    }
    
    public function deleteBrand(){
        $this->output->set_content_type('application/json');
        
        $id = $this->input->post('id', true);
        $response['error'] = true;
        if ($id){
            $param['where'] = array(
                                'id' =>$id
                                );
            $this->guarantee->setParam($param);
            if ($this->guarantee->delete()){
                $response['error'] = false;    
            }
        }
        
        $this->output->set_output(json_encode($response));
        
    }
}