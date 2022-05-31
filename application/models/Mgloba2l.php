<?php
class Mglobal extends CI_Model{
    
    private $_level;
    
    public function setLevel($level){
        $this->_level = $level;
    }
    
    public function getLevel(){
        
        return $this->session->userdata('f_level') ? $this->session->userdata('f_level') : $this->_level;
        
    }
    public function getListMethodePayment(){
        $q = "SELECT * FROM tbl_methode_bayar WHERE isactive='1'";
        $res = $this->db->query($q);
      
        return $res->result(); 
    }
    public function getListPay($mid){
        $q = "SELECT * FROM tbl_list_payment WHERE methode_bayar_id=".$mid;
        $res = $this->db->query($q);
      
        return $res->result(); 
    }
    public function getBrand(){
        $q = "SELECT brand_name,image_big FROM tbl_brand";
        $res = $this->db->query($q);
      
        return $res->result(); 
    }
    
    public function getListVideo($page='1'){
        $q = "SELECT v.*, ps.post_title FROM tbl_product_video v ";
        $q.= "LEFT JOIN tbl_product p ON p.id = v.product_id ";
        $q.= "JOIN tbl_post ps ON ps.id = p.post_id ORDER BY v.id DESC";
        $res = $this->db->query($q);
      
        return $res->result(); 
    }
    public function getVideo($slug){
        $q = "SELECT v.*, ps.post_title FROM tbl_product_video v ";
        $q.= "LEFT JOIN tbl_product p ON p.id = v.product_id ";
        $q.= "JOIN tbl_post ps ON ps.id = p.post_id ";
        $q.= "WHERE v.slug='".$slug."'";
        $res = $this->db->query($q);
      
        return $res->row(); 
    }
    
    
    public function getPromoSlider($slug){
        $q = "SELECT * FROM tbl_slider WHERE slug='".$slug."'";
        $res = $this->db->query($q);
      
        return $res->row(); 
    }
    public function getPromoSliderChild($id){
        $q = "SELECT sc.*,c.category_name FROM tbl_slider_category sc LEFT JOIN tbl_category c ON c.id = sc.category_id";
        $q.= " WHERE slider_id='".$id."'";
        $res = $this->db->query($q);
      
        return $res->result(); 
    }
    public function getMainBanner(){
        $q = "SELECT * FROM tbl_banner_promo";
        $res = $this->db->query($q);
        
        return $res->result(); 
    }
    
    public function getSubBanner($banner_id){
        $q = "SELECT *, c.image,c.slug FROM tbl_banner_promo_category bp ";
        $q.= "LEFT JOIN tbl_category c ON c.id = bp.category_id ";
        $q.= "WHERE bp.banner_promo_id = '".$banner_id."'";
        $res = $this->db->query($q);
        
        return $res->result(); 
    }
    
    
    
    public function getCategory($slug){
        $q = "SELECT id,category_name,category_desc,image,image_big FROM tbl_category WHERE slug='".$slug."'";
        $res = $this->db->query($q);
        
        return $res->row(); 
    }
    
    public function resetPass(){
        $q = "SELECT email,username FROM tbl_users WHERE email='".$email."' OR username='".$email."'";
        $res = $this->db->query($q);
        $res = $res->row();
        
    }
    
    public function getUserInfo($id){ 
        $q = "SELECT u.*, ua.address, ua.province, ua.city FROM tbl_users u ";
        $q.= "LEFT JOIN tbl_user_address ua ON ua.user_id = u.id ";
        $q.= "WHERE u.id='".$id."'";
       
        $res = $this->db->query($q);
        $res = $res->row();
        
        return $res;
    }
    
    public function countTagihan($userId){
        $q = "Select COUNT(id) as total FROM tbl_orders WHERE user_id='".$userId."' AND status_id='1'";
        $res = $this->db->query($q);
        $res = $res->row();
        
        return $res;
    }
    
    public function countTransaksi($userId){
        $q = "Select COUNT(id) as total FROM tbl_orders WHERE user_id='".$userId."' AND status_id='3'";
        $res = $this->db->query($q);
        $res = $res->row();
        
        return $res;
    }
    
    
    public function activitedAccount($code){
        $q = "SELECT id FROM tbl_users WHERE activated_key='".$code."'";
        $res = $this->db->query($q);
        $res = $res->row(); 
        
        if ($res){
            $q = "UPDATE tbl_users SET activated_key='', status='1' WHERE id='".$res->id."'";
            $this->db->query($q);
            if ( $this->db->affected_rows() ){
                $response['error']    = false;
                $response['error_no'] = 200;
            }else{
                $response['error']    = true;
                $response['error_no'] = 500;
            }
        }else{
            $response['error']    = true;
            $response['error_no'] = 404;
        }
        
        return $response; 
    }
    
    public function getPost($slug){
        $q = "SELECT * FROM tbl_post WHERE url_slug='".$slug."'";
        $res = $this->db->query($q);
        
        return $res->row(); 
    }
    
    public function getAllProducts(){
        $base_url = "";//base_url();
       
        if (!empty($userId)){
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='".$userId."' AND product_id=p.id),-1) as mywish ";
        }else{
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='-1' AND product_id=p.id),-1) as mywish ";
        }
        
        $q = "SELECT p.id, p.price,ROUND(IFNULL((p.rating / p.rater),0),1)as rating, ps.post_title,ps.url_slug,";
        $q.= " CONCAT('".$base_url."', ps.post_image) as post_image, CONCAT('".$base_url."', ps.post_image_thumbs) as post_image_thumbs, ";
        $q.= " IFNULL(pd.discount_persen,0) as discount_persen, IFNULL(pd.discount_price,0) as discount_price,";
        $q.= " IFNULL(pd.star_date,0) as star_date, IFNULL(pd.end_date,0) as end_date ";
        $q.= $qW;
        $q.= "FROM tbl_product p ";
        $q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id ";
        
        //$q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE star_date <= DATE(NOW()) AND end_date >= DATE(NOW()) ORDER BY id DESC )";
        $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."' ORDER BY id DESC )";
        $q.= " as pd ON pd.product_id = p.id ";
        $q.= "ORDER BY p.id DESC";
    
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function getFeaturedProduct(){
        /*$q = "SELECT p.id, p.price, ps.post_title,ps.url_slug,";
        $q.=" ps.post_image, ps.post_image_thumbs ";
        $q.= "FROM tbl_product p ";
        $q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id ";
        $q.= "ORDER BY p.id DESC LIMIT 12";*/
        $base_url = "";
        
        if (!empty($userId)){
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='".$userId."' AND product_id=p.id),-1) as mywish ";
        }else{
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='-1' AND product_id=p.id),-1) as mywish ";
        }
        
        $q = "SELECT p.id, p.price,ROUND(IFNULL((p.rating / p.rater),0),1)as rating, ps.post_title,ps.url_slug,";
        $q.= "(SELECT GROUP_CONCAT(c.category_name) as category_name FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id WHERE pc.product_id = p.id) as category_name,";
        $q.= " CONCAT('".$base_url."', ps.post_image) as post_image, CONCAT('".$base_url."', ps.post_image_thumbs) as post_image_thumbs, ";
        $q.= " IFNULL(pd.discount_persen,0) as discount_persen, IFNULL(pd.discount_price,0) as discount_price,";
        $q.= " IFNULL(pd.star_date,0) as star_date, IFNULL(pd.end_date,0) as end_date ";
        $q.= $qW;
        $q.= "FROM tbl_product_featured ft ";
        $q.= "LEFT JOIN tbl_product p ON p.id=ft.product_id ";
        $q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id ";
        
        $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."' ORDER BY id DESC )";
        $q.= " as pd ON pd.product_id = p.id ";
        $q.= "ORDER BY p.id DESC LIMIT 12";
        
        $res = $this->db->query($q);
        
        return $res->result();
    }
    public function getBestSeller(){
        
    }
     
    public function getProdukByCategory($catId){
        $base_url = "";//base_url();
        
        if (!empty($userId)){
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='".$userId."' AND product_id=p.id),-1) as mywish ";
        }else{
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='-1' AND product_id=p.id),-1) as mywish ";
        }
    
        $q = "SELECT p.id, p.price,ROUND(IFNULL((p.rating / p.rater),0),1)as rating, ps.post_title,ps.url_slug,";
        $q.=" CONCAT('".$base_url."', ps.post_image) as post_image, CONCAT('".$base_url."', ps.post_image_thumbs) as post_image_thumbs, ";
        $q.= " IFNULL(pd.discount_persen,0) as discount_persen, IFNULL(pd.discount_price,0) as discount_price,";
        $q.= " IFNULL(pd.star_date,0) as star_date, IFNULL(pd.end_date,0) as end_date ";
        $q.= $qW;
        $q.= "FROM tbl_product p ";
        $q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id ";
        $q.= "LEFT JOIN tbl_product_category pc ON product_id = p.id ";
        $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."' ORDER BY id DESC)";
        $q.= " as pd ON pd.product_id = p.id ";
        $q.= "WHERE pc.category_id='".$catId."' ORDER BY p.id"; //  DESC LIMIT 8
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function getLatestProduk($userId=''){
        $base_url = "";//base_url();
       
        if (!empty($userId)){
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='".$userId."' AND product_id=p.id),-1) as mywish ";
        }else{
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='-1' AND product_id=p.id),-1) as mywish ";
        }
        
        $q = "SELECT p.id, p.price,ROUND(IFNULL((p.rating / p.rater),0),1)as rating, ps.post_title,ps.url_slug,";
        $q.= " CONCAT('".$base_url."', ps.post_image) as post_image, CONCAT('".$base_url."', ps.post_image_thumbs) as post_image_thumbs, ";
        $q.= " IFNULL(pd.discount_persen,0) as discount_persen, IFNULL(pd.discount_price,0) as discount_price,";
        $q.= " IFNULL(pd.star_date,0) as star_date, IFNULL(pd.end_date,0) as end_date ";
        $q.= $qW;
        $q.= "FROM tbl_product_newarrival pn ";
        $q.= "LEFT JOIN tbl_product p ON p.id=pn.product_id ";
        $q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id ";
        
        $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."' ORDER BY id)";
        $q.= " as pd ON pd.product_id = p.id ";
        $q.= "ORDER BY p.id DESC LIMIT 8";
     
        $res = $this->db->query($q);
        
        return $res->result();
    }
    public function getBestProduct($userId=''){
        $base_url = "";//base_url();
       
        if (!empty($userId)){
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='".$userId."' AND product_id=p.id),-1) as mywish ";
        }else{
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='-1' AND product_id=p.id),-1) as mywish ";
        }
        
        $q = "SELECT p.id, p.price,ROUND(IFNULL((p.rating / p.rater),0),1)as rating, ps.post_title,ps.url_slug,";
        $q.= " CONCAT('".$base_url."', ps.post_image) as post_image, CONCAT('".$base_url."', ps.post_image_thumbs) as post_image_thumbs, ";
        $q.= " IFNULL(pd.discount_persen,0) as discount_persen, IFNULL(pd.discount_price,0) as discount_price,";
        $q.= " IFNULL(pd.star_date,0) as star_date, IFNULL(pd.end_date,0) as end_date ";
        $q.= $qW;
        $q.= "FROM tbl_product_bestseller pn ";
        $q.= "LEFT JOIN tbl_product p ON p.id=pn.product_id ";
        $q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id ";
        
        $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."' ORDER BY id)";
        $q.= " as pd ON pd.product_id = p.id ";
        $q.= "ORDER BY p.id DESC LIMIT 8";
     
        $res = $this->db->query($q);
        
        return $res->result();
    }
    public function getSpecialProduct($userId=''){
        $base_url = "";//base_url();
       
        if (!empty($userId)){
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='".$userId."' AND product_id=p.id),-1) as mywish ";
        }else{
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='-1' AND product_id=p.id),-1) as mywish ";
        }
        
        $q = "SELECT p.id, p.price,ROUND(IFNULL((p.rating / p.rater),0),1)as rating, ps.post_title,ps.url_slug,";
        $q.= " CONCAT('".$base_url."', ps.post_image) as post_image, CONCAT('".$base_url."', ps.post_image_thumbs) as post_image_thumbs, ";
        $q.= " IFNULL(pd.discount_persen,0) as discount_persen, IFNULL(pd.discount_price,0) as discount_price,";
        $q.= " IFNULL(pd.star_date,0) as star_date, IFNULL(pd.end_date,0) as end_date ";
        $q.= $qW;
        $q.= "FROM tbl_product_specials pn ";
        $q.= "LEFT JOIN tbl_product p ON p.id=pn.product_id ";
        $q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id ";
        
        $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."' ORDER BY id)";
        $q.= " as pd ON pd.product_id = p.id ";
        $q.= "ORDER BY p.id DESC LIMIT 8";
     
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    
    public function getCekProductSlug($slug){
        
        $q = "SELECT pd.id as product_id FROM tbl_post p ";
        $q.= "LEFT JOIN tbl_product pd ON pd.post_id = p.id ";
        $q.= "WHERE p.url_slug='".$slug."'";
      
        $res = $this->db->query($q);
        $res = $res->row();
        
        return $res;
    }
    public function getProductDetail($slug,$userId=''){
        
        if (!empty($userId)){
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='".$userId."' AND product_id=pd.id),-1) as mywish ";
        }else{
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='-1' AND product_id=pd.id),-1) as mywish ";
        }
        
        $q = "SELECT p.*, pd.id as product_id, pd.price, pd.qty,pd.range_timbang, pd.kapasitas_timbang, ";
        $q.= "ROUND(IFNULL((pd.rating / pd.rater),0),1)as rating,pd.rater, b.brand_name, b.image_big as brandImage ";
        $q.= $qW .", ";
        $q.= " IFNULL(pdis.discount_persen,0) as discount_persen, IFNULL(pdis.discount_price,0) as discount_price,";
        $q.= " IFNULL(pdis.star_date,0) as star_date, IFNULL(pdis.end_date,0) as end_date ";
        $q.= "FROM tbl_post p ";
        $q.= "LEFT JOIN tbl_product pd ON pd.post_id = p.id ";
        $q.= "LEFT JOIN tbl_brand b ON b.id = pd.brand_id ";
        $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."' AND product_id = product_id )";
        $q.= " as pdis ON pdis.product_id = pd.id ";
        $q.= "WHERE p.url_slug='".$slug."' AND p.post_type='product'";
      
        //var_dump($q);
        
        $res = $this->db->query($q);
        $res = $res->row();
        
        if ($res){
            $q = "UPDATE tbl_post SET viewed=viewed+1 WHERE id='".$res->id."'";
            $this->db->query($q);
            
            if ( $userId ){
                $q = "SELECT id FROM tbl_user_product WHERE user_id='".$userId."' AND product_id='".$res->product_id."'";
                $last = $this->db->query($q);
                $last = $last->row();
                if (!$last){
                    $data = array(
                                'user_id'   => $userId,
                                'product_id'=> $res->product_id,
                                'created_date' => date('Y-m-d H:i:s')
                                );
                    $this->db->insert('tbl_user_product', $data);
                }
            }
        }
    
        return $res;
    }
    
    public function getProductMedia($product_id){
        $q = "SELECT * FROM tbl_product_media WHERE product_id='".$product_id."'";
        
        $res = $this->db->query($q);
        $res = $res->result();
        if (!$res){
            $q = "SELECT * FROM tbl_product_media LIMIT 2";
        
            $res = $this->db->query($q);
            $res = $res->result();
        }
        return $res;
    }
    public function getProductImage($product_id){
        $q = "SELECT * FROM tbl_product_image WHERE product_id='".$product_id."'";
        
        $res = $this->db->query($q);
        $res = $res->result();
        
        return $res;
    }
    public function listComments($id){
        $q = "SELECT * FROM tbl_comments WHERE post_id='".$id."'";
        $res = $this->db->query($q);
        $res = $res->result();
        
        return $res;
    }
    
    public function saveComment($comment){
        
        if ( $this->db->insert('tbl_comments',$comment)){
            return true;
        }
        
        return false;
    }
    
    
    
    public function getImagesProduct($productId){
        $q = "SELECT *  FROM tbl_product_image ";
        $q.= "WHERE product_id='".$productId."'";
        
        $res = $this->db->query($q);
        return $res->result();
    }
    
    public function getMedias($sku){
        $q = "SELECT * FROM tbl_product_media p WHERE p.product_id='".$sku."'";
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function getProductCategory($productId){
        $q = "SELECT *,c.category_name, c.slug FROM tbl_product_category pc ";
        $q.= "LEFT JOIN tbl_category c ON c.id = pc.category_id ";
        $q.= "WHERE product_id='".$productId."'";
        
        $res = $this->db->query($q);
        return $res->result();
    }
    
    public function userProduct($userId,$productId){
       
        $date = date('Y-m-d H:i:s');
        $q = "INSERT INTO tbl_user_product(user_id,product_id,created_date) ";
        $q.= "VALUE ('".$userId."','".$productId."','".$date."')";
        $this->db->query($q);
        
        
    }
    
    public function relatedProduct(){
        $base_url = "";//base_url();
        
        $q = "SELECT p.id, p.price, ps.post_title,ps.url_slug,ROUND(IFNULL((p.rating / p.rater),0),1)as rating, ";
        $q.=" CONCAT('".$base_url."', ps.post_image) as post_image, CONCAT('".$base_url."', ps.post_image_thumbs) as post_image_thumbs, ";
        $q.= "IFNULL(pdis.discount_persen,0) as discount_persen, IFNULL(pdis.discount_price,0) as discount_price,";
        $q.= "IFNULL(pdis.star_date,0) as star_date, IFNULL(pdis.end_date,0) as end_date ";
        $q.= "FROM tbl_product p ";
        $q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id ";
        $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."')";
        $q.= " as pdis ON pdis.product_id = p.id ";
        $q.= "ORDER BY p.id DESC LIMIT 8";
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function getProduct($id){
        $q = "SELECT p.post_title as product_name, pd.id, pd.price,p.post_image_thumbs,pd.weight,pd.weight_in, ";
        $q.= "IFNULL(pdis.discount_persen,0) as discount_persen, IFNULL(pdis.discount_price,0) as discount_price,";
        $q.= "IFNULL(pdis.star_date,0) as star_date, IFNULL(pdis.end_date,0) as end_date ";
        $q.= "FROM tbl_post p ";
        $q.= "LEFT JOIN tbl_product pd ON pd.post_id = p.id ";
        $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."')";
        $q.= " as pdis ON pdis.product_id = pd.id ";
        $q.= "WHERE pd.id='".$id."' AND p.post_type='product'";
      
        $res = $this->db->query($q);
    
        return $res->row();
    }
    
    public function getLastSeenProduk($userId){
        $q = "SELECT  p.id,ps.post_title,ps.url_slug,ps.post_image_thumbs,ps.post_image,p.price FROM tbl_user_product up ";
        $q.= "LEFT JOIN tbl_product p ON p.id = up.product_id ";
        $q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id ";
        $q.= "WHERE up.user_id='".$userId."'";
        
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function login($email,$password){
        $q = "SELECT * FROM tbl_users ";
        $q.= "WHERE (email='".$email."' OR username='".$email."' )AND password='".$password."' AND 	status='1'";
        $res = $this->db->query($q);
      
        if ( $res ){
            return $res->row();
        }
        
        return false;
    }
    
    public function checkEmail($email){
        $q = "SELECT email,username FROM tbl_users WHERE email='".$email."' OR username='".$email."'";
        $res = $this->db->query($q);
        return $res->row();
    }
    
    public function register($data = array()){
        $this->db->trans_begin();
        
        
        if ($this->db->insert( 'tbl_users', $data)){
            $geneCode = MD5(MD5($data['password']));
            $id = $this->db->insert_id();
            
            $q = "UPDATE tbl_users SET activated_key='".$geneCode."' WHERE id='".$id."'";
            $this->db->query($q);            
        }
                
        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                $response['error']    = true;
                $response['genecode'] = '';
        }
        else
        {
                $this->db->trans_commit();
                $response['error']    = false;
                $response['genecode'] = $geneCode;
                
        }  
            
        return $response;
    }
    public function updatePassword($email){
        $this->db->trans_begin();
        $pass = random_string('alnum', 6);
        $npass = md5($pass);
        
        $q = "UPDATE tbl_users SET password='".$npass."' WHERE email='".$email."'";
        
        $this->db->query($q);
        
        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                $response['error']    = true;
                $response['genecode'] = '';
        }
        else
        {
                $this->db->trans_commit();
                $response['error']    = false;
                $response['genecode'] = $pass;
                
        }  
            
        return $response;
    }
    /*
    Wishlist
    */
    
    public function countWishList($userId){
        $q = "SELECT count(w.id) as total FROM tbl_wishlist w WHERE w.user_id='".$userId."'";
        $res = $this->db->query($q);
        $res = $res->row();
        
        return $res;
    }
    public function getWishList($userId){
        
        if (!empty($userId)){
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='".$userId."' AND product_id=p.id),-1) as mywish ";
        }else{
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='-1' AND product_id=p.id),-1) as mywish ";
        }
        
        
        $q = "SELECT w.id as wishId, w.product_id, ps.post_title,ps.url_slug,ps.post_image_thumbs,p.price, ";
        $q.= " IFNULL(pd.discount_persen,0) as discount_persen, IFNULL(pd.discount_price,0) as discount_price,";
        $q.= " IFNULL(pd.star_date,0) as star_date, IFNULL(pd.end_date,0) as end_date ";
        $q.= $qW;
        $q.= "FROM tbl_wishlist w ";
        $q.= "LEFT JOIN tbl_product p ON p.id=w.product_id ";
        $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."' ORDER BY id DESC LIMIT 1)";
        $q.= " as pd ON pd.product_id = p.id ";
        $q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id WHERE w.user_id='".$userId."'";
        $res = $this->db->query($q);
        $res = $res->result();
        
        return $res;
    }
    public function addWishList($data= array()){
        
        $productId = $data['product_id'];
        $userId = $data['user_id'];
        
        $q = "SELECT * FROM tbl_wishlist WHERE user_id='".$userId."' AND product_id='".$productId."'";
        $res = $this->db->query($q);
        $res = $res->row();
        
        if ($res){
            $q = "DELETE FROM tbl_wishlist WHERE id='".$res->id."'";
            $this->db->query($q);
            if ( $this->db->affected_rows() ){
                return "-1";
            }else{
                return "2";
            }
        }else{
            if ( $this->db->insert('tbl_wishlist',$data)){
                return "1";
            }else{
                return "2";
            }
        }
        
        return "2";
    }
    public function deleteWishList($wishId,$userId){
        $q = "DELETE FROM tbl_wishlist WHERE id='".$wishId."' AND user_id='".$userId."'";
        if ( $this->db->query($q)){
            return true;
        }
        return false;
    }
    
    public function userLogin($usernama,$password){
        $q = "SELECT u.* FROM tbl_users u LEFT JOIN ";
        $q.= "tbl_level l ON l.id = u.level_id ";
        $q.= "WHERE u.username='".$usernama."' AND u.password='".$password."' AND u.status='1'";
        
        $res = $this->db->query($q);
        return $res->row();
    }
    
    /* Address */
    public function listAddress($userId){
        $q = "SELECT * FROM tbl_user_address WHERE user_id='".$userId."'";
        $res = $this->db->query($q);
        return $res->result();
    }
    
    public function getAddresDetail($id){
        $q = "SELECT * FROM tbl_user_address WHERE id='".$id."'";
        $res = $this->db->query($q);
        return $res->row();
    }
    
    public function getDefaultAddress($userId){
        $q = "SELECT * FROM tbl_user_address WHERE user_id='".$userId."' AND is_default='1'";
        $res = $this->db->query($q);
        return $res->row();
    }
    
    public function getKurir(){
        $q = "SELECT * FROM tbl_kurir";
        $res = $this->db->query($q);
        return $res->result();
    }
    
    public function getListPembayaran($userId){
        $q = "SELECT o.*,s.*, l.bank_name,l.image, b.nama_pembayaran FROM tbl_orders o ";
        $q.= "LEFT JOIN tbl_status s ON s.id = o.status_id ";
        $q.= "LEFT JOIN tbl_list_payment l ON l.id = o.list_payment_id ";
        $q.= "LEFT JOIN tbl_methode_bayar b ON b.id = o.methode_bayar_id ";        
        $q.= "WHERE o.user_id='".$userId."' ";
        $q.= "ORDER BY o.id DESC";
        
        $res = $this->db->query($q);
        return $res->result();
    }
    
    public function getListBank(){
        $q = "SELECT * FROM tbl_list_payment";
        $res = $this->db->query($q);
        return $res->result();
    }
    public function getTransaction($noorder){
        $q = "SELECT o.*,b.nama_pembayaran,p.bank_name, p.image as bank_image,u.full_name,"; 
        $q.= "u.phone_number as phone_number_b,u.provinsi, u.kota, u.address as address_b, u.postal_code as postal_code_b,";
        $q.= "ua.recipient, ua.phone_number, ua.address, ua.postal_code,ua.province ,ua.city FROM tbl_orders o ";
        $q.= "LEFT JOIN tbl_users u ON u.id = o.user_id ";
        $q.= "LEFT JOIN tbl_user_address ua ON ua.id = o.address_id ";
        $q.= "LEFT JOIN tbl_methode_bayar b ON b.id = o.methode_bayar_id ";
        $q.= "LEFT JOIN tbl_list_payment p ON p.id = o.list_payment_id";
        
        $q.= " WHERE no_order='".$noorder."'";
        
        $res = $this->db->query($q);
        $res = $res->row();
        
        if ($res){
            $q = "SELECT * FROM tbl_order_detail WHERE order_id='".$res->id."'";
            $res2 = $this->db->query($q);
            $res2 = $res2->result();
            
            $q = "SELECT * FROM tbl_order_detail2 WHERE order_id='".$res->id."'";
            $res3 = $this->db->query($q);
            $res3 = $res3->result();
            
            $response['ordersum'] = $res;
            $response['orderdet1'] = $res2;
            $response['orderdet2'] = $res3;
            
            return $response;
        }else{
            return false;
        }
    }
    
    public function confirmPayment($data= array()){
        $orderId = $data['orderId'];  
        $methode_bayar_id = $data['methode_bayar_id'];
        $payment_id = $data['payment_id'];
        
        $q = "UPDATE tbl_orders SET methode_bayar_id='".$methode_bayar_id."',";
        $q.= "list_payment_id='".$payment_id."' WHERE id='".$orderId."'";
        $res = $this->db->query($q);
        if ( $this->db->affected_rows() ){
            return true;
        }
        return false;

    }
    
    public function listPayment(){
        $q = "SELECT * FROM tbl_list_payment";
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function detailOrder($orderId){
        $q = "SELECT o.*, u.email,u.full_name, ua.recipient, ua.phone_number, ua.address, ua.postal_code ";
        $q.= ",ua.province ,ua.city,b.nama_pembayaran FROM tbl_orders o ";
        $q.= "LEFT JOIN tbl_users u ON u.id = o.user_id ";
        $q.= "LEFT JOIN tbl_user_address ua ON ua.id = o.address_id ";
        $q.= "LEFT JOIN tbl_methode_bayar b ON b.id = o.methode_bayar_id ";
        
        $q.= "WHERE o.id='".$orderId."'";
        
        $res = $this->db->query($q);        
        $res = $res->row();
        
        if ($res){
            $q = "SELECT * FROM tbl_order_detail WHERE order_id='".$orderId."'";
            $orderDetail = $this->db->query($q); 
            $orderDetail = $orderDetail->result();
            
            $q = "SELECT * FROM tbl_order_detail2 WHERE order_id='".$orderId."'";
            $orderDetail2 = $this->db->query($q); 
            $orderDetail2 = $orderDetail2->result();
            
            $infoOrder = array(
                        'orders'      => $res,
                        'orderDetail' => $orderDetail,
                        'orderDetail2'=> $orderDetail2,
                        );
            
            return $infoOrder;
        }
        
        return 0;
    }
    
    public function getDeskripsiHome(){
        $q = "SELECT title, deskripsi FROM tbl_setting LIMIT 1";
        $res = $this->db->query($q);        
        $res = $res->row();
        return $res;
    }
    
    public function getSlider(){
        $q = "SELECT * FROM tbl_slider WHERE status='1'";
        $res = $this->db->query($q);        
        $res = $res->result();
        return $res;
    }
    
    public function getListBanner(){
        $q = "SELECT b.id as group_id, b.title, b.banner_mobile as main_banner,c.category_name,c.slug,c.image_big, c.image FROM tbl_banner_promo b ";
        $q.= "LEFT JOIN tbl_banner_promo_category bp ON bp.banner_promo_id = b.id ";
        $q.= "LEFT JOIN tbl_category c ON c.id = bp.category_id ";
        $q.= "WHERE status='1'";
        $res = $this->db->query($q);        
        $res = $res->result();
        
        return $res;
    }
    public function getBannerDetail($id){
        $q = "SELECT * FROM tbl_banner_promo WHERE id='".$id."'";
        $res = $this->db->query($q);        
        $res = $res->row();
        
        if ($res){
            $q = "SELECT ps.post_title,ps.url_slug,ps.post_image,ps.post_image_thumbs, p.price, p.id,";
            $q.= "ROUND(IFNULL((p.rating / p.rater),0),1)as rating,p.rater, ";
            $q.= " IFNULL(pd.discount_persen,0) as discount_persen, IFNULL(pd.discount_price,0) as discount_price,";
            $q.= " IFNULL(pd.star_date,0) as star_date, IFNULL(pd.end_date,0) as end_date ";
            $q.= "FROM tbl_banner_promo_category bc ";
        	$q.= "LEFT JOIN tbl_product_category pc ON pc.category_id = bc.category_id ";
        	$q.= "LEFT JOIN tbl_product p ON p.id = pc.product_id ";
            $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."' ORDER BY id DESC LIMIT 1)";
            $q.= " as pd ON pd.product_id = p.id ";
        	$q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id WHERE bc.banner_promo_id = '".$res->id."' HAVING p.id > 0";
            $pro = $this->db->query($q);        
            $pro = $pro->result();
            $respon['detailBanner'] = $res;
            $respon['product']      = $pro;
        }else{
            return false;
        }
        
        return $respon;
    }
    
    public function getListSlider(){
        $q = "SELECT id,title,IFNULL(image_mobile,image) as image,thumbs,link_target,`desc` FROM tbl_slider WHERE status='1'";
        $res = $this->db->query($q);        
        $res = $res->result();
        
        return $res;
    }
    public function getSliderDetail($id){
        $q = "SELECT id,title,image,thumbs,link_target,`desc` FROM tbl_slider WHERE id='".$id."'";
        $res = $this->db->query($q);        
        $res = $res->row();
        
        if ($res){
            $q = "SELECT ps.post_title,ps.url_slug,ps.post_image,ps.post_image_thumbs, p.price, p.id, ";
            $q.= " IFNULL(pd.discount_persen,0) as discount_persen, IFNULL(pd.discount_price,0) as discount_price,";
            $q.= " IFNULL(pd.star_date,0) as star_date, IFNULL(pd.end_date,0) as end_date ";
            $q.= "FROM tbl_slider_category sc ";
        	$q.= "LEFT JOIN tbl_product_category pc ON pc.category_id = sc.category_id ";
        	$q.= "LEFT JOIN tbl_product p ON p.id = pc.product_id ";
            $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."' ORDER BY id DESC LIMIT 1)";
            $q.= " as pd ON pd.product_id = p.id ";
        	$q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id WHERE sc.slider_id = '".$res->id."' HAVING p.id > 0";
            $pro = $this->db->query($q);        
            $pro = $pro->result();
            $respon['detailBanner'] = $res;
            $respon['product']      = $pro;
        }else{
            return false;
        }
        
        return $respon;
    }
    
    public function getStatusInfo($userId){
        $q = "SELECT oh.id, oh.comment, oh.created_date,o.no_order,s.nama_status FROM tbl_order_history oh ";
        $q.= "LEFT JOIN tbl_orders o ON o.id = oh.order_id ";
        $q.= "LEFT JOIN tbl_status s ON s.id = oh.status_id WHERE o.user_id='".$userId."' ORDER BY id DESC";
        
        $pro = $this->db->query($q);        
        $pro = $pro->result();
        
        return $pro;
    }
    public function getKategory($tipe = '1' ){
        
        if ($tipe == 3){
            $WHERE = "";
        }else{
            $WHERE = " WHERE category_type='".$tipe."'";
        }
        
        $q = "SELECT id,category_name,slug,IFNULL(image,'') as image ";
        $q.= "FROM tbl_category ".$WHERE." ORDER BY category_name " ;
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function searchProduk($key){
        $base_url = "";//base_url();
       
        if (!empty($userId)){
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='".$userId."' AND product_id=p.id),-1) as mywish ";
        }else{
            $qW = ", IFNULL( (SELECT product_id FROM tbl_wishlist w WHERE w.user_id='-1' AND product_id=p.id),-1) as mywish ";
        }
        
        $q = "SELECT p.id, p.price, ps.post_title,ps.url_slug,";
        $q.= " CONCAT('".$base_url."', ps.post_image) as post_image, CONCAT('".$base_url."', ps.post_image_thumbs) as post_image_thumbs, ";
        $q.= " IFNULL(pd.discount_persen,0) as discount_persen, IFNULL(pd.discount_price,0) as discount_price,";
        $q.= " IFNULL(pd.star_date,0) as star_date, IFNULL(pd.end_date,0) as end_date ";
        $q.= $qW;
        $q.= "FROM tbl_product p ";
        $q.= "LEFT JOIN tbl_post ps ON ps.id = p.post_id ";
        
        $q.= "LEFT JOIN (SELECT * FROM tbl_product_discount WHERE level_id = '".$this->getLevel()."' ORDER BY id DESC LIMIT 1)";
        $q.= " as pd ON pd.product_id = p.id ";
        $q.= "WHERE ps.post_title LIKE '%".$key."%'";
     
        $res = $this->db->query($q);
        
        return $res->result();
    }
    public function getVoucher($code){
        $q = "SELECT * FROM tbl_coupon c WHERE c.`code` = '".$code."' AND (CURRENT_DATE() BETWEEN c.star_date AND c.end_date) AND c.isactive = '1'";
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    public function listPostNews(){
        $q = "SELECT * FROM tbl_post WHERE post_type='post' ORDER BY id DESC";
        $res = $this->db->query($q);
        
        return $res->result();
    }
    public function getListToUlas($userId){
        $q = "SELECT o.no_order,od.product_id,ps.post_title as nama_produk, ps.post_image as image, ROUND(IFNULL((p.rating / p.rater),0),1)as rating, ";
        $q.= "IFNULL((SELECT count(id) FROM tbl_comments_order c WHERE c.no_order = o.no_order AND c.product_id=od.product_id AND c.user_id = o.user_id),0) as has_review ";
        $q.= "FROM tbl_orders o LEFT JOIN ";
        $q.= "tbl_order_detail od ON od.order_id=o.id LEFT JOIN ";
        $q.= "tbl_product p ON p.id = od.product_id LEFT JOIN ";
        $q.= "tbl_post ps ON ps.id = p.post_id ";
        
        $q.= "WHERE o.user_id='".$userId."'";
        
        $res = $this->db->query($q);
        
        return $res->result();
    }
    public function giveUlasan($data){ 
        $userId     = $data['user_id'];
        $product_id = $data['product_id'];
        $no_order   = $data['no_order'];
        $rating     = $data['rating'];
        $ulasan     = $data['ulasan'];
        
        
        $insert = array(
                    'product_id'    => $product_id,
                    'rating'        => $rating,
                    'created_at'    => $date ,
                    );
       
        
        $this->db->insert("tbl_product_rating",$insert);
        
        $insert = array(
                    'product_id'    => $product_id,
                    'rating'        => $rating,
                    'created_at'    => $date ,
                    );
       
        
        $this->db->insert("tbl_product_rating",$insert);
    }
    
    public function getLatestUlasan($productId){
        $q = "SELECT co.*, u.full_name,";
        $q.= "(SELECT rating FROM tbl_product_rating WHERE user_id= co.user_id AND product_id = co.product_id ORDER BY id DESC LIMIT 1 ) as rating ";
        $q.= ", DATEDIFF(CURRENT_DATE, co.created_date) as lama_ulasan ";
        $q.= "FROM tbl_comments_order co ";
        $q.= "LEFT JOIN tbl_users u ON u.id = co.user_id ";
        $q.= "WHERE co.product_id = '".$productId."' ORDER BY co.id DESC LIMIT 1";
        
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    public function getLatestComment($productId,$limit='1'){
        $result = array();
        
        $q = "SELECT co.id,co.parent_id,co.message,co.created_date, IFNULL(u.full_name,'Animious') as poster_name, u.avatar_thumbs FROM ";
    	$q.= "tbl_comments co ";
    	$q.= "LEFT JOIN tbl_post p ON p.id = co.post_id ";
    	$q.= "LEFT JOIN tbl_product po ON po.post_id = p.id ";
    	$q.= "LEFT JOIN tbl_users u ON u.id = co.user_id WHERE po.id = '".$productId."' AND co.parent_id < 1 ";
        $q.= "ORDER BY co.id DESC LIMIT ".$limit;
        
        $res = $this->db->query($q);
        $res = $res->result();
        if ($res){
            foreach($res as $r){
                $q = "SELECT co.id,co.parent_id,co.message,co.created_date, IFNULL(u.full_name,'Animious') as poster_name,u.avatar_thumbs ";
                $q.= "FROM tbl_comments co ";
                $q.= "LEFT JOIN tbl_users u ON u.id = co.user_id ";
                $q.= "WHERE co.parent_id = '".$r->id."' ORDER BY co.id ASC ";
                
                $res = $this->db->query($q);
                $res = $res->result();
                
                $result[] = $r;
             
                if ($res){
                    $result = array_merge($result, $res);    
                }
                
               
            }
        }
        
        return $result;
    }
    
    public function getListReview($productId,$limit='1'){
        $result = array();
        
       
        $q = "SELECT co.*, u.full_name,";
        $q.= "(SELECT rating FROM tbl_product_rating WHERE user_id= co.user_id AND product_id = co.product_id ORDER BY id DESC LIMIT 1 ) as rating ";
        $q.= ", DATEDIFF(CURRENT_DATE, co.created_date) as lama_ulasan ";
        $q.= "FROM tbl_comments_order co ";
        $q.= "LEFT JOIN tbl_users u ON u.id = co.user_id ";
        $q.= "WHERE co.product_id = '".$productId."' ORDER BY co.id DESC LIMIT 1";
        
        $res = $this->db->query($q);
        $res = $res->result();
        if ($res){
            foreach($res as $r){
                $q = "SELECT co.*, u.full_name,";
                $q.= "(SELECT rating FROM tbl_product_rating WHERE user_id= co.user_id AND product_id = co.product_id ORDER BY id DESC LIMIT 1 ) as rating ";
                $q.= ", DATEDIFF(CURRENT_DATE, co.created_date) as lama_ulasan ";
                $q.= "FROM tbl_comments_order co ";
                $q.= "LEFT JOIN tbl_users u ON u.id = co.user_id ";
                $q.= "WHERE co.parent_id = '".$r->id."' ORDER BY co.id ASC ";
                
                $res = $this->db->query($q);
                $res = $res->result();
                
                $result[] = $r;
             
                if ($res){
                    $result = array_merge($result, $res);    
                }
                
               
            }
        }
        
        return $result;
    }
    
    public function getVideoRandom(){
        $q = "SELECT * FROM tbl_product_video ORDER BY RAND() LIMIT 3";
        $res = $this->db->query($q);
        $res = $res->result();
        
        return $res;
    }
}