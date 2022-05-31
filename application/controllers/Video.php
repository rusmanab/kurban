<?php
class Video extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('mglobal'));
    }
    public function index(){
        $slug = $this->uri->segment(2);
        if (!empty($slug) && strtolower($slug) !='home'){
           
            $this->getDetail($slug);
        }else{
             $view              = 'videos';
      
            $res = $this->mglobal->getListVideo();
            if (!$res){
                show_404();
            }
            $data['data']      = $res;
            
            $this->themes->display($view,$data);
        }
    }
    public function _remap($params)
    {
        
        $method =  $this->uri->segment(1);
       
        //$method = 'process_'.$method;
        if (method_exists($this, $method))
        {
            //echo $method;
           $this->$method();
           //return call_user_func_array(array($this, $method), $params);
        }else{
            $this->index();
        }
       
    }  
    
    public function getDetail($slug){
        
        $view              = 'video_detail';
        
        $res = $this->mglobal->getVideo($slug);
        if (!$res){
            show_404();
        }
        $data['data']      = $res;
        $data['dataRandom']= $this->mglobal->getVideoRandom();
        
        $this->themes->display($view,$data);
    }
}
?>