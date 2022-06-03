<?php
class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mglobal');
    }
    
    public function index(){
        
        $slug = $this->uri->segment(2);
        
        if (!empty($slug)){
            //$this->output->enable_profiler(true);
            
            
            $regCss= array(                       
                        base_url('assets/themes/themesv1/css/produk_detail.css'),
                        );
            $this->themes->registerCsshead($regCss);
                        
            $regJs = array(                       
                        'https://unpkg.com/xzoom/dist/xzoom.min.js',
                        'https://hammerjs.github.io/dist/hammer.min.js',
                        'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js'
                        );
        
            $this->themes->regsiterJsClosing($regJs);
            
            
            $addjs = "javascript/product_detail";
            $this->themes->registerScript($addjs);
            
            $userId = $this->session->userdata('f_userid');
            $product = $this->mglobal->getProductDetail($slug,$userId);
           
            if (!$product){
                show_404();
            }
            
            
            $relatedProduk = $this->mglobal->getLatestProduk();
            
            $data['product']         = $product;
            $data['metadata']        = $product;
            $data['comments']        = $this->mglobal->listComments($product->id);
            
            $data['productCategory'] = $this->mglobal->getProductCategory($product->product_id);
            $data['producsImage']    = $this->mglobal->getImagesProduct($product->product_id);
            $data['medias']          = $this->mglobal->getMedias($product->product_id);
            //$data['relatedProduk']   = $relatedProduk;
            $data['mcategoryHidden'] = true;
            $data['rating_value']    = 2;
            
            
            $view = 'product_detail';
            $this->themes->display($view,$data);
        }else{
            
        }
    }
    
    public function _remap($method, $params = array())
    {
        //$method = 'process_'.$method;
    
        if (method_exists($this, $method))
        {
                return call_user_func_array(array($this, $method), $params);
        }else{
            $this->index();
        }
       
    }
    
    public function rating(){
        $name_slug = $this->input->post('name_slug', true);
        $rating    = $this->input->post('rating', true);
        
        $prod = $this->mglobal->getCekProductSlug($name_slug);
     
        if ($prod){
            $insert = array(
                        'product_id'    => $prod->product_id,
                        'rating'        => $rating,
                        'created_at'    => date('Y-m-d H:i:s'),
                        );
            $userId = $this->session->userdata('f_userid');
            if ($userId){
                $insert['user_id'] = $userId;
            }
            
            $this->db->insert("tbl_product_rating",$insert);
        }
    }
    
    public function category($slug="",$params2=""){
        $category = $this->mglobal->getCategory($slug);
        
        if (!$category){
            if (!empty($slug)){
                show_404();    
            }
            
            $view                = 'list_category';
            $data['listCat']     = $this->mglobal->getKategory("1");
            $data['allproduct']  = $this->mglobal->getAllProducts();
        }else{
            $produk              = $this->mglobal->getProdukByCategory($category->id);
            $view                = 'product_category_2';
            
            $regJs               = 'javascript/product_category';
            $this->themes->registerScript($regJs);
            
            
            $data['products']    = $produk;
            $data['cateName']    = $category->category_name;
            $data['catgory']     = $category;
        }
                
        $this->themes->display($view,$data);
    }
    
    public function submit_comment(){
        
        $userId = $this->session->userdata('f_userid');
        if (!$userId){
            $userId = "0";
        }
        
        $return = $this->input->get_post('url', true);
        
        $post_id     = $this->input->post('post_id', true);
        $product_id  = $this->input->post('product_id', true);
        $message     = $this->input->post('content', true); 
        
        $comment = array(
                        'user_id'    => $userId,
                        'post_id'    => $post_id,
        //                'product_id' => $product_id,    
                        'message'    => $message,
                        'created_date' => date('Y-m-d H:i:s')
                    );
        $res = $this->mglobal->saveComment($comment);
        
        redirect($return);
    }
   
   
}