<?php
class MY_Controller extends CI_Controller{
    
    public $username;
    public $userid;
    public $avatar;
    public $level;
    
    public function __construct(){
        parent::__construct();
        
        //$this->output->enable_profiler(true);
        $isLogin = $this->memberaccess->isLogin();
        //var_dump($isLogin);
        if (!$isLogin){
            redirect('login');
        }
        $this->userid     = $isLogin;
        $this->username   = $this->session->userdata('a_username');
        $this->avatar     = $this->session->userdata('a_avatar');  
        $this->level      = $this->session->userdata('a_level');
        
    }
    
    public function deleteFile($img='', $imgthumbs=''){
        
        
        $this->load->helper('file');
        
         
       
        
        if ($img && $imgthumbs){
            $imgb = $img;
            $imgt = $imgthumbs;
        }
        
        $doc = $_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR;//. "khanza" . DIRECTORY_SEPARATOR  ;
      
        
        $fileB = $doc . $imgb;
        $fileT = $doc . $imgt;
        $infoImg = get_file_info($fileB);  
        $infoImgT= get_file_info($fileT); 
        
        $isImgB = $infoImg["size"];
        
        $isImgT = $infoImgT["size"];
       
        if ( $isImgB > 0 ){
            //var_dump($fileB);
            $isdeletB = unlink($fileB);
            //var_dump($isdeletB);
        }
        if ( $isImgT > 0 ){
            $isdeletT = unlink($fileT);
            //var_dump($isdeletT);
        }
       
        if ( $isImgB == true || $isImgT == true){
            return true;  
        }else{
            return false;
        }
    }
    
}