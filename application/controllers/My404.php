<?php
class My404 extends CI_Controller
{
   public function __construct()
   {
       parent::__construct();
   }
   public function index()
   {
       $this->output->set_status_header('404');
       $view = 'err404'; 
       
       $data['mcategoryHidden'] = true;
        
        
       $this->themes->display($view,$data);
        
       
   
   }
}