<?php
class Menu extends MY_Controller{
    protected $menu;
    protected $data;
    
    public function __construct(){
        parent::__construct();
        $this->load->library(array('theme_admin'));
        $this->load->model(array('mmenu'));
        $this->menu = new mmenu();
        
        $this->data['dir']       = 'menu';
        $this->data['Icon']      = array('copy','list');
    }
    public function index(){	
        
        
        $data['formtitle'] = "";
        
        
	    $this->data['title']     = "Menu";
        $this->data['subTitle']  = $this->lang->line('create')." Menu";
        $this->data['icon']      = "list";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             'Menu'
                             );
                             
        $this->data['breadcrumb'] = breadcrumb($breadcrumb);
        
	    $this->load->model(array('mcategory','mpost'));
        
        $category = $this->mcategory->getData();
        $this->data['category']  = $category;
        
        
        $param['where'] = array('post_type'=>'pages');
        $this->mpost->setParam($param);
        $post = $this->mpost->getData();
        
        $this->data['pages']      = $post;
        $where['order_by']  = 'order ASC';
        $this->menu->setParam($where);
        $menu = $this->menu->getData();
        $this->data['menu']     = $menu; 
        
		$this->theme_admin->display('menu/view',$this->data);
	}
	
    
    public function save(){     
        $this->output->enable_profiler(TRUE);
        $this->load->model(array('mcategory','mpost'));
       
        $menu = $this->input->post("menu",true);
       
        $type = $this->input->post("type",true);
        if ( is_array($menu) ){
            $count = count($menu);    
        }else{
            $count = 0;
        }
        
        
       
        for($i=0 ; $i < $count; $i++){
           
            if ( $type == 3 ){
                $menu_label = $this->input->post("menu",true);
                $link_menu  = $this->input->post("link_menu",true);
                $data = array(
                            'type'      => '1',
                            'menu_id'   => 0,
                            'slug'      => $link_menu,
                            'menu_label'=> $menu_label,
                            'created_at' =>  Date('Y-m-d H:i:s'),
                            'user_id'   => $this->session->userdata('admin_id')
                        ); 
                
            }elseif ( $type == 0 ){
                $param['where'] = array('id'=> $menu[$i]);
                $this->mpost->setParam($param);
                $post = $this->mpost->getData();
                
                $data = array(
                            'type'      => '1',
                            'menu_id'   => $post[0]->id,
                            'slug'      => $post[0]->url_slug,
                            'menu_label'=> $post[0]->post_title,
                            'created_at' =>  Date('Y-m-d H:i:s'),
                            'user_id'   => $this->session->userdata('admin_id')
                        ); 
                
            }else{
                $param['where'] = array('id'=> $menu[$i]);
                $this->mcategory->setParam($param);
                $category = $this->mcategory->getData();
                
                $data = array(
                            'type'      => '1',
                            'menu_id'   => $category[0]->id,
                            'slug'      => 'category/'.$category[0]->slug,
                            'menu_label'=> $category[0]->category_name,
                            'created_at' =>  Date('Y-m-d H:i:s'),
                            'user_id'   => $this->session->userdata('admin_id')
                        );
            }
           
            $this->menu->setData($data);
            if ( $this->menu->save() ){
                $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
                $this->session->set_flashdata($message);                    
            }else{
                $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
                $this->session->set_flashdata($message);                        
            }
            
          
           
        }
        redirect('menu');
       
    }
    
    
    public function delete($id){
        $this->output->enable_profiler(true);
                
		$param['where'] = array('id'=> $id );
        $this->menu->setParam($param);
                
        $result =$this->menu->delete();
        if ($result){
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
            $this->session->set_flashdata($message);   
        }else{
            $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
            $this->session->set_flashdata($message);             
        }
	
        redirect('menu');
          
	}
        
    public function update()
    {
        $id = $this->input->post("id",true);
        if ($id){
            
            $data = array(
                        'menu_label' => $this->input->post("menu_label",true),
                        'order'      => $this->input->post("order",true),
                        'type'      => $this->input->post("menu_type",true)
                    );
            $param['where'] = array('id'=>$id);
            $this->menu->setParam($param);
            $this->menu->setData($data);
            if ( $this->menu->save() ){
                $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
                $this->session->set_flashdata($message);                    
            }else{
                $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
                $this->session->set_flashdata($message);                        
            }
        }
        redirect('menu');
    }
    public function get_table(){
       
	   $this->menu->getDataTable();
    }
	
	
    
}