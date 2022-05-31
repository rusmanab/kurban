<?php
class Options extends MY_Controller{
    
   
    public function __construct(){
        parent::__construct();
        $this->load->model('moptions','options');
        $this->load->model('moptionsdesc','optionsdesc');
        
    }
    
    public function index(){
        $data['title']     = $this->lang->line('options');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('option');
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
       
        $view = 'options/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function add(){
        $data['title']     = $this->lang->line('options');
        $data['subTitle']  = $this->lang->line('create_new') . $this->lang->line('option');
        $data['formtitle'] = $this->lang->line('add');
        $data['icon']      = "sticky-note-o";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'options' ),
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
        
        $data['optionchoose'] = $this->options->getOptionChoose();
        
        $addjs = "pages/options/js";
        $this->theme_admin->registerScript($addjs);
        
        $view = 'options/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function edit($id){
        //$this->output->enable_profiler(true);
        
        $data['title']     = $this->lang->line('batik');
        $data['subTitle']  = $this->lang->line('edit') . $this->lang->line('batik');
        $data['formtitle'] = $this->lang->line('edit');
        $data['icon']      = "edit";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'options' ),
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
        
        $addjs = "pages/options/js";
        $this->theme_admin->registerScript($addjs);
        
        
        $param['where'] = array('option_id'=>$id);
        $this->options->setParam($param);
        $this->optionsdesc->setParam($param);        
        $data['options']    = $this->options->getData(true);
        $data['optionsdesc']= $this->optionsdesc->getData();
        $data['optionchoose'] = $this->options->getOptionChoose();
        
        $view = 'options/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
        $this->output->enable_profiler(true);
        
        $this->db->trans_start();
        
        $id = $this->input->post('id', true);
        $option_type = $this->input->post('option_type', true);
        
        $option_name = $this->input->post('option_name', true);
        
        
        $option_value_id          = $this->input->post('option_value_id', true);
        $option_value_description = $this->input->post('option_value_description', true);
        $sort_order               = $this->input->post('sort_order', true);
        
        $option = array(
                    'type' => $option_type
                    );
        
   
        
        if ($id){
            $param['where'] = array('option_id'=> $id);
            $this->options->setParam($param);
            $this->optionsdesc->setParam($param);
                       
        }
        
        $this->options->setData($option);        
        $this->options->save();
        
        $optionDesc = array(                       
                        'language_id'   => 1,
                        'option_name'   => $option_name
                        ); 
        if (!$id){
            $option_id =  $this->options->lastInsert(); 
            $optionDesc['option_id']     = $option_id;
            $optionValueDesc['option_id']= $option_id;
            $optionValue['option_id']    = $option_id;
        }
             
        
        $this->optionsdesc->setData($optionDesc);        
        $this->optionsdesc->save();
        
       
        if ($option_value_id){
            $count = count($option_value_id);
            
            for($i=0; $i < $count; $i++){
                $optionValue['sort_order'] = $sort_order[$i];
                
                $optionValueDesc['language_id'] = 1;
                $optionValueDesc['name']        = $option_value_description[$i];
                                  
                    
                if ($option_value_id[$i] > 0){
                    $param2['where'] = array('option_value_id' => $option_value_id[$i]);
                
                    $this->optionsdesc->setParamOption($param2);
                }
                
                $option_valueId = $this->optionsdesc->saveoptionValue($optionValue); 
                
                if ($option_value_id[$i] < 1 ){
                    $optionValueDesc['option_value_id'] = $option_valueId;
                }
                
                $this->optionsdesc->saveoptionValueDesc($optionValueDesc);
            }
        }
         
      
        if ($this->db->trans_status() === FALSE)
        {
             $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
            $this->db->trans_rollback();
        }
        else
        {
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
            $this->db->trans_commit();
        }
        
        
        $this->session->set_flashdata($message);    
        redirect('options');
    }
    
    public function delete(){
        $this->output->enable_profiler(true);        
		$id   =explode(',',$this->input->post('id',true));
        
		$tot=count($id);
	
        
		if (!empty($id)){
			for($i=0;$i < $tot;$i++){
				$param['where'] = array('option_id'=> $id[$i] );
                $this->options->setParam($param);
            
                $result =$this->options->delete();
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
	   $this->optionsdesc->getDataTable();
    }
    
    public function loadOption(){
        $this->output->set_content_type('application/json');
        
        $q = $this->input->get('q', true);
        
        $optionsdesc = $this->optionsdesc->loadOption($q);
        
        $data = array(
                    'total_count'           => count($optionsdesc),
                    'incomplete_results'    => false,
                    'items'                 => $optionsdesc
                    );
        $this->output->set_output(json_encode($data));
        // echo json_encode($data);
    }
    
    public function loadform(){
        $option_id = $this->input->post('option_id', true);
        
        $data['optionval'] = $this->options->getOptionValue($option_id);
        
        $this->load->view('pages/options/loadform',$data);
        
    }
    
    public function loadrowoption(){
        $option_id = $this->input->post('optionid', true);
        $rowid     = $this->input->post('rowid', true);
        
        $data['optionval'] = $this->options->getOptionValue($option_id);
        $data['rowid']    = $rowid;
        
        $view = $this->load->view('pages/options/loadrowoption',$data, true);
        
        $output['tablerow'] = $view;
        
        echo json_encode($output);
    }
    
    public function deleteOption(){
        $product_option_id = $this->input->post('product_option_id', true);
        $res = $this->options->deleteOption($product_option_id);
        $output['error'] = true;
        if ($res){
            $output['error'] = false;
        }
        
        echo json_encode($output);
    }
    
    public function deleteProductOption(){
        $product_option_value_id = $this->input->post('id', true);
        $res = $this->options->deleteProductOption($product_option_value_id);
        
        $output['error'] = true;
        if ($res){
            $output['error'] = false;
        }
        
        echo json_encode($output);
    }
}