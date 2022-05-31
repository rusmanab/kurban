<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Myprofile extends MY_Controller{
    public $user;
    public $data;
    
    public function __construct(){
        parent::__construct();
        
        $this->load->model(array('muser'));
        $this->user = new muser();
        
        $this->data['dir']       = 'profile';
        
        
    }
    public function index(){	
        $this->load->helper(array('global','form'));
        //$this->load->library(array('form')); 
        
	    $this->data['title']     = $this->lang->line('profile_saya');
        $this->data['subTitle']  = $this->lang->line('halaman_akun_pengguna');
               
        $this->data['formtitle'] = $this->lang->line('profile_saya'); 
        $this->data['icon']      = 'list';
        
        $breadcrumb = array(
                            array( $this->lang->line('home') => 'home'),
                            $this->data['formtitle']
                            );
        $this->data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $regCss = array(
                         
                         base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                        );
                        
        $regCss2 = array(
                        base_url('assets/themes/default/pages/css/profile.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/bootbox/bootbox.min.js'), 
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),  
                        
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'),                        
                        );
                        
        
                        
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->registerCsshead($regCss2,2);
        $this->theme_admin->regsiterJsClosing($regJs);
        
       
        
        $where['where'] = array('id'=> $this->userid);
        $this->user->setParam($where);
        $userprofile = $this->user->getData();
        
	    $this->data['userprofile'] = $userprofile;
		$this->theme_admin->display( $this->data['dir'] . '/index',$this->data);
	}
    
    
    
    public function changeavatar()
    {
        $this->output->enable_profiler(true);
        
        if (!empty($_FILES["userfile"]["size"])){
		
            $this->load->library('upload');
 			$img    = $this->user->uploadImage("avatars","userfile",true,0,64);
              
 			$data['avatar']          = str_replace('../','',$img['image_path']) ;
            $data['avatar_thumbs']   = str_replace('../','', $img['thumb_path']) ;
            
		}  
        
        $param['where'] = array('id'=>$this->userid);
        
        $this->user->setParam($param);
        $this->user->setData($data);
        if ( $this->user->save() ){
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
            $this->session->set_flashdata($message);     
            $this->session->set_userdata('a_avatar', ROOT . $data['avatar_thumbs']);               
        }else{
            $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
            $this->session->set_flashdata($message);                        
        }
        
        redirect('myprofile');
    }
    
    public function changepassword()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="help-inline" >', '</span>');
        
        $this->form_validation->set_rules('oldpass',$this->lang->line('oldpass'),'trim|required');	
		$this->form_validation->set_rules('newpass',$this->lang->line('newpass'),'trim|required');
        $this->form_validation->set_rules('repass',$this->lang->line('repass'),'trim|required');
        
        if ($this->form_validation->run() == FALSE ){
            $this->index();
        }else{
            $this->load->model(array('muser'));
            
            $oldpass = md5( trim($this->input->post("oldpass",true)) );
            $newpass = trim($this->input->post("newpass",true));
            $retpass = trim($this->input->post("repass",true));
            
            
            $param['where'] = array('id'=>$this->userid);
            $this->muser->setParam($param);
            $cekpass = $this->muser->getData();
            
            if ( $cekpass[0]->password ==  $oldpass){
                
                if ($newpass != $retpass){
                    $message = array('msg_type'=>"danger","msg_content"=>"Password tidak cocok." );
                    $this->session->set_flashdata($message);    
                    
                    redirect('myprofile');
                }
                
                
                $dataUpdate = array('password' => md5($newpass));
                
                $this->muser->setData($dataUpdate);
                
                if ( $this->muser->save() ){
                    $message = array('msg_type'=>"success","msg_content"=>"Password berhasil di ubah." );
                    $this->session->set_flashdata($message);                    
                }else{
                    $message = array('msg_type'=>"danger","msg_content"=>"Password gagal di ubah." );
                    $this->session->set_flashdata($message);                        
                }
                
            }else{
                $message = array('msg_type'=>"danger","msg_content"=>"Password anda salah." );
                $this->session->set_flashdata($message);    
                    
            }
        }
        
        
        
        redirect('myprofile');
    }
    
    
   
    
    public function save(){     
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="help-inline" >', '</span>');
        
        $this->form_validation->set_rules('full_name',$this->lang->line('nama_lengkap'),'trim|required');	
		$this->form_validation->set_rules('phone_number',$this->lang->line('hp'),'trim|required');
        $this->form_validation->set_rules('email',$this->lang->line('email'),'trim|required');
        
        if ($this->form_validation->run() == FALSE ){
            $this->index();
        }else{
        
            $data = array(          
                    'full_name'     => trim($this->input->post("full_name",true)),  
                    'address'   => trim($this->input->post("address",true)),
                    'phone_number'        => trim($this->input->post("phone_number",true)),
                    'email'     => trim($this->input->post("email",true)),
                    
                    );
                    
            $param['where'] = array('id'=>$this->userid);
        
            $this->user->setParam($param);
            $this->user->setData($data);
            if ( $this->user->save() ){
                $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
                $this->session->set_flashdata($message);       
                $this->session->set_userdata('a_username', $data['full_name']);
                
                             
            }else{
                $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
                $this->session->set_flashdata($message);                        
            }
        }               
        redirect('myprofile');
        
    }
    
    
    
	
	
    
}