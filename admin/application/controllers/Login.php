<?php
class Login extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('pages/user/login');
    }
    
    public function submit(){
        $this->output->enable_profiler(true);
        
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        
        $this->memberaccess->Login($username, $password);
        redirect('home');
    }
    
    public function logout(){
        $this->memberaccess->Logout();
        redirect('home');
    }
    
}
