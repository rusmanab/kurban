<?php
class Productbestseller extends MY_Controller{
    
    public $model;
    
    public function __construct(){
        parent::__construct();
     
        $this->load->model('mproductbestseller','product');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('bestseller_product');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('bestseller_product');
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
       
        $view = 'productbestseller/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function add(){
        //$this->output->enable_profiler(true);
        
        $data['title']     = $this->lang->line('bestseller_product');
        $data['subTitle']  =  strtolower( $this->lang->line('add') ." " . $this->lang->line('bestseller_product') );
        $data['formtitle'] = $this->lang->line('add');
        $data['icon']      = "shopping-cart";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'bestseller_product' ),
                             $this->lang->line('add')
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $regCss = array(
                       base_url('assets/themes/default/global/plugins/select2-4.0.3/css/select2.min.css'),
                       base_url('assets/themes/default/global/plugins/select2/css/select2-bootstrap.min.css'),

                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/select2-4.0.3/js/select2.full.min.js'),     
                        );
                         
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "pages/productbestseller/js";
        $this->theme_admin->registerScript($addjs);
        
        $this->load->model('mproduct');
        $data['products'] = $this->mproduct->loadProduct();
        
        
        $view = 'productbestseller/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function edit($id){
        //$this->output->enable_profiler(true);
     
        
        $data['title']     = $this->lang->line('bestseller_product');
        $data['subTitle']  = strtolower( $this->lang->line('edit') . " ".  $this->lang->line('bestseller_product') );
        $data['formtitle'] = $this->lang->line('edit');
        $data['icon']      = "edit";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'bestseller_product' ),
                             $this->lang->line('edit')
                             );
                             
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $regCss = array(
                       base_url('assets/themes/default/global/plugins/select2-4.0.3/css/select2.min.css'),
                       base_url('assets/themes/default/global/plugins/select2/css/select2-bootstrap.min.css'),                        
                        );
                        
        $regJs  = array(
                        
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'),      
                        base_url('assets/themes/default/global/plugins/select2-4.0.3/js/select2.full.min.js'),                
                        );
                         
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "productbestseller/product/js";
        $this->theme_admin->registerScript($addjs);
       
        
        $view = 'productbestseller/form';
        
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
       
      
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        $data    = $this->input->post('product_id',true);
        $count   = 0;
        $dataProduct = array();
        
        if (is_array($data)){
            $count   = count($data);    
            for($x=0; $x < $count; $x++){
                $dataProduct[] = array('product_id' => $data[$x]);
            }
            if ($this->db->insert_batch('tbl_product_bestseller', $dataProduct)){    
                $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
               
            }
        }
        
        $this->session->set_flashdata($message);    
        redirect('productbestseller');
    }
    
    public function delete($id=''){
        if ( !empty($id) ){
            $where['where'] = array('id' => $id);
            $this->product->setParam($where);
            if ( $this->product->delete() ){
                $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_delete') );
            }else{
                $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_undelete') );
            }
            $this->session->set_flashdata($message);    
            redirect('productbestseller');
        }else{
            $id   =explode(',',$this->input->post('id',true));
        
    		$tot=count($id);
    	
            
    		if (!empty($id)){
    			for($i=0;$i < $tot;$i++){
    				$param['where'] = array('id'=> $id[$i] );
                    $this->product->setParam($param);
                
                        $result =$this->product->delete();
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
		      
	}
        
   
    public function get_table(){
       
	   $this->product->getDataTable();
    }
    
    public function getProduct(){
        $this->load->model('mproduct','produk');
        $this->output->set_content_type('application/json');
        
        $q = $this->input->get_post('q', true);
        
        $produk = $this->produk->loadProduct($q);
        
        $data = array(
                    'total_count'           => count($produk),
                    'incomplete_results'    => false,
                    'items'                 => $produk
                    );
        $this->output->set_output(json_encode($data));
        // echo json_encode($data);
    }
}