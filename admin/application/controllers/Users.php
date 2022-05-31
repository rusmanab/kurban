<?php
class Users extends MY_Controller{
    public $model;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('muser','user');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('user');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('user');
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
       
        $view = 'user/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function blassEmailVerifikasi(){
        
        $q = "SELECT * FROM tbl_users where email='rusmanab@gmail.com'";
        $res = $this->db->query($q);
        $res = $res->result();

        $this->load->library('kirimemail');
        foreach($res as $r){
            $register = array(
                'full_name'     => $r->full_name,
                'phone_number'  => $r->phone_number,
                'email'         => $r->email,
                'username'      => $r->username,
                'password'      => MD5($r->password),
                'date_created'  => date('Y-m-d H:i:s')
                );
            $genecode = MD5($r->password);

            $q = "UPDATE tbl_users SET activated_key='".$genecode."' WHERE id='".$r->id."'";
            $this->db->query($q);  


            $register['subject']    = "Verifikasi Alamat Email Kamu di Excellent Scale"; 
            $register['genecode']   = $genecode;
            
            $view                   = "email_register_2";
            $this->kirimemail->kirim($view,$register);
            sleep(10);
        }


    }

    public function add(){
        $data['title']     = $this->lang->line('user');
        $data['subTitle']  = $this->lang->line('create_new') . $this->lang->line('user');
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
        
        $addjs = "pages/user/js";
        $this->theme_admin->registerScript($addjs);
        
        $this->load->model('mcategory','category');
        $param['where'] = array ('category_type' => '1');
        $this->category->setParam($param);
        $categories = $this->category->getData();
        
        $data['categories'] = $categories;
        $this->load->model('mlevel');
        $data['levels']  = $this->mlevel->getData();
        
        $view = 'user/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function edit($id){
        //$this->output->enable_profiler(true);
        
        $data['title']     = $this->lang->line('user');
        $data['subTitle']  = $this->lang->line('edit') . $this->lang->line('user');
        $data['formtitle'] = $this->lang->line('edit');
        $data['icon']      = "edit";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'user' ),
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
        
        
        $addjs = "pages/user/js";
        $this->theme_admin->registerScript($addjs);
        
        
        $param['where'] = array('id'=>$id);
        $this->user->setParam($param);
                
        /*$this->load->model('mcategory','category');
        $param['where'] = array ('category_type' => '1');
        $this->category->setParam($param);
        $categories = $this->category->getData();*/
        
        //$data['categories'] = $categories;
        $data['user']    = $this->user->getData();
        $this->load->model('mlevel');
        $data['levels']  = $this->mlevel->getData();
        
        $view = 'user/edit';
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
        //$this->output->enable_profiler(true);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[6]');
        
        //$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]');
        //$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('level_id', 'Level', 'trim|required');
        
        $users = $_POST;
        $this->user->input($users);
           
        if ($this->form_validation->run() == FALSE){
            if ($users["id"]){
                $this->edit($users["id"]);
            }else{
                $this->add();
            }
        }else{
            
            if ($users["id"]){
                $param['where'] = array('id'=>$users["id"]);
                $data['modified_date'] = date('Y-m-d H:i:s');
                $this->user->setParam($param);
            }else{
                $data['date_created']  = date('Y-m-d H:i:s');
                $data['created_by']            = $this->userid;
                
            }
            
            if (!empty($_FILES["userfile"]["size"])){
    		
        		$this->load->library('upload');
        		$img    = $this->user->uploadImage("avatars");
                                        
        		$data['avatar']          = str_replace('../','',$img['image_path']);
                $data['avatar_thumbs']   = str_replace('../','', $img['thumb_path']);
                    
    		}
            
            $data['password'] = md5( $this->input->post('password', true)) ;
            $data['status']   = '1';
            $this->user->addData($data);
            
            $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
            if ( $this->user->save() ){
                $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
            }
            
            $this->session->set_flashdata($message);    
            redirect('users');
        }
    }
    
    
    public function changeavatar(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        
        $userId = $this->input->post('userid', true);
        
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        
        
        $this->form_validation->set_rules('userfile', 'Image / Picture', 'required');
        
        if ($userId){
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->edit($userId);
            }else{
                if (!empty($_FILES["userfile"]["size"])){
    		
            		$this->load->library('upload');
            		$img    = $this->user->uploadImage("avatars");
                                            
            		$data['avatar']          = str_replace('../','',$img['image_path']);
                    $data['avatar_thumbs']   = str_replace('../','', $img['thumb_path']);
                    
                    $where['where'] = array('id'=>$userId);
                    $this->user->setParam($where);
                    $this->user->setData($data);
                    
                    if ($this->user->save()){
                        $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
                    }
                    
                    $this->session->set_flashdata($message); 
                    redirect('users');
        		}
            }
        }
        
        
    }
    
    public function changepassword(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
         
        $this->form_validation->set_rules('newpassword', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('retypepassword', 'Password Confirmation', 'trim|required|matches[newpassword]');
        
        $userId = $this->input->post('userid2', true);
        if ($userId){
            if ($this->form_validation->run() == FALSE)
            {                
                $this->edit($userId);
            }else{
                $newpassword = $this->input->post('newpassword', true);
                
                $data = array(
                            'password' => md5($newpassword)
                        );
                
                $where['where'] = array('id'=>$userId);
                $this->user->setParam($where);
                $this->user->setData($data);
                    
                if ($this->user->save()){
                    $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
                }else{
                    $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
                }
                
                $this->session->set_flashdata($message); 
                redirect('users');
            }
        }
        
        
    }
    
    public function delete(){
		$id   =explode(',',$this->input->post('id',true));
        
		$tot=count($id);
	
        
		if (!empty($id)){
			for($i=0;$i < $tot;$i++){
				$param['where'] = array('id'=> $id[$i] );
                $this->user->setParam($param);
            
                    $result =$this->user->delete();
                    if ($result){
                        $alert ="alert-success";
                       	$pesan = '<i class="icon-exclamation-sign"> </i> <strong>'.$this->lang->line('msg_delete').'</strong>';
                    }else{
                         $alert ="alert-error";
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
       
	   $this->user->getDataTable();
    }
    
    public function profile(){

        $data['title']     = $this->lang->line('users');
        $data['subTitle']  = $this->lang->line('profile');
        $data['formtitle'] = "profile";
        $data['icon']      = "Users";
       

        $breadcrumb = array( array($this->lang->line('home') => '' ),
                            $data['title'],
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);

        $regCss = array(
                        base_url('assets/themes/default/pages/css/profile.min.css'),
                       base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                       base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.css')
                        );

        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/tinymce/tinymce.min.js'),  
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'),
                        );

        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        

        $addjs = "global/jslist";
        $this->theme_admin->registerScript($addjs);
        $id = $this->session->userdata('a_userid');
        $param['where'] = array('id'=>$id);
        $this->user->setParam($param);

        $data['user']    = $this->user->getData();
        $this->load->model('mlevel');
        $data['levels']  = $this->mlevel->getData();
        $view = 'user/profile';
        $this->theme_admin->display($view,$data);

    }
    
    public function profilesave(){

        //$this->output->enable_profiler(true);

        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('level_id', 'Level', 'trim|required');

        

        $users = $_POST;
        $returnUrl = "";
        
        $this->user->input($users);
        if ($this->form_validation->run() == FALSE){
            if ($users["id"]){
                $this->edit($users["id"]);
            }else{
                $this->add();
            }
        }else{            
            if ($users["id"]){
                $param['where'] = array('id'=>$users["id"]);
                $data['modified_date'] = date('Y-m-d H:i:s');
                $this->user->setParam($param);
                $returnUrl = $this->input->get_post("returnUrl", true);
            }else{
                $data['date_created']  = date('Y-m-d H:i:s');
                $data['created_by']            = $this->userid;
            }


            if (!empty($_FILES["userfile"]["size"])){
                $this->load->library('upload');
                $img    = $this->user->uploadImage("avatars");
                $data['avatar']          = str_replace('../','',$img['image_path']);
                $data['avatar_thumbs']   = str_replace('../','', $img['thumb_path']);
            }
           
            $this->user->addData($data);
            $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
            if ( $this->user->save() ){
                $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
            }

            $this->session->set_flashdata($message);    
            if ( !empty($returnUrl) ){
                redirect($returnUrl);
            }else{
                redirect('users/profile');   
            }
        }

    }
    
    public function profilechangeavatar(){
        $this->load->library('form_validation');
        $userId = $this->session->userdata('a_userid');
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );       

        if ($userId){
            if (!empty($_FILES['userfile']['size'])){
                $this->load->library('upload');
                $img = $this->user->uploadImage("avatar","userfile",true,225,225);
                $data['avatar']          = str_replace('../','',$img['image_path']);
                $data['avatar_thumbs']   = str_replace('../','', $img['thumb_path']);                    

                $where['where'] = array('id'=>$userId);
                $this->user->setParam($where);
                $this->user->setData($data);
                if ($this->user->save()){
                    $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
                }
                $this->session->set_flashdata($message); 
            }
        }
        redirect('users/profile');
    }

    

    public function profilechangepassword(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        $this->form_validation->set_rules('newpassword', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('retypepassword', 'Password Confirmation', 'trim|required|matches[newpassword]');
        

        $userId = $this->input->post('userid2', true);
        if ($userId){
            if ($this->form_validation->run() == FALSE)
            {                
                $this->edit($userId);
            }else{
                $newpassword = $this->input->post('newpassword', true);
                $data = array(
                            'password' => md5($newpassword)
                        );
                $where['where'] = array('id'=>$userId);
                $this->user->setParam($where);
                $this->user->setData($data);
                if ($this->user->save()){
                    $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
                }else{
                    $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
                }
                $this->session->set_flashdata($message); 
                redirect('users/profile');
            }
        }
    }


}