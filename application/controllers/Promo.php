<?php
class Promo extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('mglobal'));
    }
    public function index(){
        $slug = $this->uri->segment(2);
        if (!empty($slug) && strtolower($slug) !='home'){
           
            $this->getDetail($slug);
        }else{
            
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
        $promo = $this->mglobal->getPromoSlider($slug);
        
        
        
        if (!$promo){
            show_404();
        }
        $view = "promo_detail";
        $data['promo'] = $promo;
        $data['mglobal'] = $this->mglobal;
        $this->themes->display($view,$data);
    }
}
?>