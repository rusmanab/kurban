<?php
class MY_Controller extends CI_Controller{
    private $_userId;
    private $_level;
    private $_area;
    private $_userInfo;
    private $_parameterArea;
    
    public function __construct(){
        parent::__construct();
        
        $uri = $this->uri->segment(2);        
        $requesToken = true;
        if ( $uri == "login"){
            $requesToken = false;
        }elseif ($uri == "resetPass"){
            $requesToken = false;
        }elseif ($uri == "generateCode"){
            $requesToken = false;
        }elseif ($uri == "register"){
            $requesToken = false;
        }


        
        if ( $requesToken ){
        
            $isLogin = $this->session->userdata('f_userid'); //$this->cekOauth();  
                    
            if ($isLogin){
                $this->setUserid($isLogin);
                /*$response['error']       = true;
                $response['error_no']    = 502;
                $response['error_msg']   = "Otorisasi gagal, silahkan login kembali";
                $response['error_type']  = "error";
                $response['error_title'] = "Perhatian";
                echo json_encode($response);
                exit();*/
            }else{
                redirect('/login');
            }
        }
        
    }
    
    public function setUserid($userid){
        $this->_userId = $userid;
    }
    
    public function setLevel($level){
        $this->_level = $level;
    }
    
    
    public function getUserid(){
        return $this->_userId;
    }
    public function getLevel(){
        return $this->_level;
    }
    
    public function setUserInfo($userInfo){
        $this->_userInfo = $userInfo;
    }
    
    public function getUserInfo(){
        return $this->_userInfo;
    }
    
    public function cekOauth(){
        $input = json_decode(file_get_contents("php://input"), true);
        if ($input){
            $_POST = $input;
        }
        
        $token = $this->input->get_post('token', true);
        
        $this->load->model('moauth');
        
        
        $res = $this->moauth->getInfo($token);
         
        if ($res){
            $this->setUserid($res->user_id);
        }
        return $res;
    }
    
}

class API_Controller extends CI_Controller{
    
    private $_userId;
    private $_level;
    private $_area;
    private $_userInfo;
    private $_parameterArea;
    
    public function __construct(){
        parent::__construct();   
        
        header('Access-Control-Allow-Origin: *');
    	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        
        $uri = $this->uri->segment(2);        
        $requesToken = true;
        if ( $uri == "login"){
            $requesToken = false;
        }elseif ($uri == "resetPass"){
            $requesToken = false;
        }elseif ($uri == "generateCode"){
            $requesToken = false;
        }elseif ($uri == "register"){
            $requesToken = false;
        }elseif ($uri == "listProduct"){
            $requesToken = false;
        }elseif ($uri == "productCategory"){
            $requesToken = false;
        }elseif ($uri == "productDetail"){
            $requesToken = false;
        }elseif ($uri == "listBanner"){
            $requesToken = false;
        }elseif ($uri == "listSlider"){
            $requesToken = false;
        }elseif ($uri == "listBannerDetail"){
            $requesToken = false;
        }elseif ($uri == "listSliderDetail"){
            $requesToken = false;
        }elseif ($uri == "listProductByCategories"){
            $requesToken = false;
        }


       
        if ( $requesToken ){
            $isLogin = $this->cekOauth();            
            if (!$isLogin){
                
                $response['error']       = true;
                $response['error_no']    = 502;
                $response['error_msg']   = "Otorisasi gagal, silahkan login kembali";
                $response['error_type']  = "error";
                $response['error_title'] = "Perhatian";
               

                $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
            
               exit;
            }
        }
    }
    
    public function setUserid($userid){
        $this->_userId = $userid;
    }
    
    public function setLevel($level){
        $this->_level = $level;
    }
    
    
    public function getUserid(){
        return $this->_userId;
    }
    public function getLevel(){
        return $this->_level;
    }
    
    public function setUserInfo($userInfo){
        $this->_userInfo = $userInfo;
    }
    
    public function getUserInfo(){
        return $this->_userInfo;
    }
    
    public function cekOauth(){
        $input = json_decode(file_get_contents("php://input"), true);
        if ($input){
            $_POST = $input;
        }
        
        $token = $this->input->get_post('token', true);
        
        $this->load->model('moauth');
        
        
        $res = $this->moauth->getInfo($token);
       
        if ($res){
            $this->setUserid($res->user_id);
            $this->setLevel($res->level_id);
        }
        return $res;
    }
    
}

