<?php
class Comments extends MY_Controller{
    
    public $model;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mcomments','komen');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('comments');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('comments');
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
       
        $view = 'brand/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function views($id){
        $data['title']     = $this->lang->line('comments');
        $data['subTitle']  = '';
        $data['formtitle'] = "";
        $data['icon']      = "list";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                            $data['title'],
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $comments = $this->komen->getDetail($id);
        $data['comments'] = $comments;
        
        $view = 'comments/view';
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
        $id         = $this->input->post("id", true);
        $produk_id  = $this->input->post("produk_id", true);
        $status     = $this->input->post("status", true);
        
        $where['where'] = array('id'=>$id);        
        $this->komen->setParam($where);
        $update = array(
                    'status' => $status
                    );
        $this->komen->setData($update);
        
        if ( $this->komen->save() ){
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
        }else{
            $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        }
        
        $this->session->set_flashdata($message);    
        redirect('product/edit/'.$produk_id);
    }
    
    
    
    
    public function delete(){
		$id   =explode(',',$this->input->post('id',true));
        
		$tot=count($id);
	
        
		if (!empty($id)){
			for($i=0;$i < $tot;$i++){
				$param['where'] = array('id'=> $id[$i] );
                $this->brand->setParam($param);
            
                    $result =$this->brand->delete();
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
       
	   $this->brand->getDataTable('0');
    }
    
    public function getBrand($tipe='1'){
        $this->output->set_content_type('application/json');
        
        $q = $this->input->get_post('q', true);
        
        $brand = $this->brand->loadBrand($q);
        
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
            $this->brand->setParam($param);
            if ($this->brand->delete()){
                $response['error'] = false;    
            }
        }
        
        $this->output->set_output(json_encode($response));
        
    }
}