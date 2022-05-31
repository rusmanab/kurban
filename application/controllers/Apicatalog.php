<?php
class Apicatalog extends API_Controller{
    //private $_token = "excellent!@#1(8^^&$#%";
    private $_userId = 0;
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('mtemplate','mglobal'));
        $this->mglobal->setLevel($this->getLevel());
        
        //$isLogin = $this->cekOauth();
        
        
        /*if ( $token != $this->_token){
            
        }*/
        
    }
    
    /*public function cekOauth(){
        $input = json_decode(file_get_contents("php://input"), true);
        if ($input){
            $_POST = $input;
        }
        
        $token = $this->input->get_post('token', true);
        
        $this->load->model('moauth');
        $res = $this->moauth->getInfo($token);
       
        if ($res){
            $this->setUserid($res->user_id);
            $this->mglobal->setLevel($res->level_id);
            if ( !$this->session->userdata('f_level') ){
                $this->session->set_userdata('f_level',$res->level_id);
            }
        }else{
            $this->setUserid(-1);
        }
        return $res;
    }*/
    
    public function setUserId($userId){
        $this->_userId = $userId;
        
    }
    public function getUserId(){
        return $this->_userId;
    }
    
    public function index(){
        
    }
    
    
    
    public function search(){
        $keyword = $this->input->get_post("keyword", true);
        $res = $this->mglobal->searchProduk($keyword);
        
        $errSts = 200 ;
        if ($res){
            $response['error']  = false;
            $response['data']   = $res;
        }else{
            $response['error']  = true;
            $response['data']   = array();
        }
        
        $this->output->set_status_header($errSts)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        
    }
    public function productCategory(){
        
        $category = $this->mtemplate->getKategory();
        
        if ($category){
            $errSts = 200;
            $response['error']      = false;
            $response['category']   = $category;
        }else{
            $errSts = 200 ;
            $response['error']      = true;
            $response['category']   = array();
        }
        
        $this->output->set_status_header($errSts)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    
    public function listProduct(){
        $userId = $this->getUserId();
        $latestProduk    = $this->mglobal->getLatestProduk($userId);
        $bestProduct     = $this->mglobal->getBestProduct($userId);
        $specialProduct  = $this->mglobal->getSpecialProduct($userId);
        $featureProduct  = $this->mglobal->getSpecialProduct($userId);
        
        if ($latestProduk){
            $errSts = 200;
            $response['error']          = false;
            $response['latestProduct']  = $latestProduk;
            $response['bestProduct']    = $bestProduct;
            $response['specialProduct'] = $specialProduct;
            $response['featureProduct'] = $featureProduct;
        }else{
            $errSts = 200 ;
            $response['error']          = true;
            $response['latestProduct']  = array();
        }
        
        
        $this->output->set_status_header($errSts)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    public function productDetail(){
        $slug = $this->input->post('slug', TRUE);
        $userId = $this->getUserId();
        $product        = $this->mglobal->getProductDetail($slug,$userId);
        $relatedProduct = $this->mglobal->relatedProduct();
        
        if ($product){
            $post_description = html_entity_decode($product->post_description); 
            $product->post_description = $post_description;     
            
            $product_media = $this->mglobal->getProductMedia($product->product_id);
            $getProductImage = $this->mglobal->getProductImage($product->product_id);
            
            $ulasan          = $this->mglobal->getLatestUlasan($product->product_id);
            if (!$ulasan){
                $ulasan = "";
            }
            $comment         = $this->mglobal->getLatestComment($product->product_id);
            if (!$comment){
                $comment = array();
            }
            $errSts = 200;
            $response['error']          = false;
            $response['detailProduct']  = $product;
            $response['product_media']  = $product_media;
            $response['product_image']  = $getProductImage;
            $response['relatedProduct'] = $relatedProduct;
            $response['latestUlasan']   = $ulasan;
            $response['latestComment']  = $comment;
        }else{
            $errSts = 200 ;
            $response['error']          = true;
            $response['detailProduct']  = array();
            $response['product_media']  = array();
        }
        
        
        $this->output->set_status_header($errSts)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    
    public function getCity(){
        $province_id = $this->input->post('province_id', true);
        
        $this->load->library('rajaongkir');
        $city = $this->rajaongkir->city($province_id);
        $city = json_decode($city);
        
        $kota = json_encode($city->rajaongkir);
        
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output($kota);
         
    }
    
    public function getCost(){
        $this->load->library('rajaongkir');
        
        $origin          = '456'; //$this->input->post('origin', true);
        $destination     = $this->input->post('destination', true);
        $weight          = $this->input->post('weight', true);
        $courier         = $this->input->post('courier', true);
        
        $cost = $this->rajaongkir->cost($origin, $destination, $weight,$courier);
        $cost = json_decode($cost);       
         
        
        $error = $cost->rajaongkir->status;
        
        $biaya = "";
        if ( $error->code == 200 ){
            $biaya = $cost->rajaongkir->results[0]->costs;
        }
        
        $response['error'] = $cost->rajaongkir->status;
        $response['cost']  = $biaya;
        
        $response = json_encode($response);
        
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output($response);
    }
    
    /* payment*/
    /**/
    
    public function listKurir(){
        $kurir = $this->mglobal->getKurir();
        
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($kurir));
    }
    
    public function listPayment(){
        $list = $this->mglobal->listPayment();
        
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($list));
    }
    
    public function listProductByCategories(){
        $slug   = $this->input->post('slug', true);
        $res    = $this->mglobal->getCategory($slug);
        $error_products = true;
        $error = false;
        
        if ($res){
            $produk = $this->mglobal->getProdukByCategory($res->id);
            
            if ($produk){
                $error_products = false;
            }
        }else{
            $error = true;
            $produk = array();
        }
        
        $response['error'] = $error;
        $response['categoryDetail'] = $res;
        $response['products'] = array('error_products' => $error,'data'=>$produk);
        
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    
    public function listBanner(){
        $res    = $this->mglobal->getListBanner();
        
        if ($res){
           $error = false;
        }else{
            $error = true;
        }
        
        $response['error']  = $error;
        $response['banner'] = $res;
        
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    public function listBannerDetail(){
        $id     = $this->input->post('id', true);
        $res    = $this->mglobal->getBannerDetail($id);
        
        if ($res){
           $error = false;
           $response['bannerDetail']= $res['detailBanner'];
           $response['product']     = $res['product'];
        }else{  
            $error = true;
        }
        
        $response['error']  = $error;
        
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    
    public function listSlider(){
        $res    = $this->mglobal->getListSlider();
        
        if ($res){
           $error = false;
        }else{
            $error = true;
        }
        
        $response['error']  = $error;
        $response['slider'] = $res;
        
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    public function listSliderDetail(){
        $id     = $this->input->post('id', true);
        $res    = $this->mglobal->getSliderDetail($id);
        
        if ($res){
           $error = false;
           $response['bannerDetail']= $res['detailBanner'];
           $response['product']     = $res['product'];
        }else{  
            $error = true;
        }
        
        $response['error']  = $error;
        
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    
    public function getListDiskusi(){
        $product_id   = $this->input->post('product_id', true);
        $listComments = $this->mglobal->getLatestComment($product_id, 20);
        
        if ($listComments){
           $error = false;
           $response['listComment'] = $listComments;
           $response['error_msg'] = "";
        }else{  
            $error = true;
            $response['error_msg'] = "No data";
        }
        
        $response['error']  = $error;
        
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    
    public function getListAllUlasan(){
        $product_id   = $this->input->post('product_id', true);
        $ulasan = $this->mglobal->getListReview($product_id, 20);
       
        if ($ulasan){
           $error = false;
           $response['listUlasan'] = $ulasan;
           $response['error_msg'] = "";
        }else{  
            $error = true;
            $response['error_msg'] = "No data";
        }
        
        $response['error']  = $error;
        
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}