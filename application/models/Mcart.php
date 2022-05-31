<?php
class Mcart extends MY_Model{
    
    protected static $pid='id';
	protected static $table='tbl_cart';
    
    
    public function __construct(){
        parent::__construct();
    }
    
    public function updateCart($id,$qty,$userId){
        $q = "UPDATE tbl_cart SET qty= ".$qty." ";
        $q.= "WHERE id='".$id."' AND user_id='".$userId."'";
        
        $this->db->query($q);
        $newTotal = $this->totalPrice($userId);
        
        $response['new_total'] = number_format($newTotal) ;
        if ( $this->db->affected_rows() ){
            $error = true;
        }else{
            $error = false;
        }
        $response['error'] = $error;
        
        return $response;
    }
    
    public function add($data= array()){
        $userId         = $data['user_id'];
        $product_id     = $data['product_id'];
        $qty            = $data['qty'];
        $price          = $data['price'];
        $product_name   = $data['product_name'];
        $diskon_price   = $data['diskon_price'];
        $image          = $data['image'];
        $weight         = $qty * $data['weight'];
        
        $q = "SELECT * FROM tbl_cart WHERE user_id='".$userId."' AND product_id='".$product_id."'";
                
        $isAva = $this->db->query($q);
        $isAva = $isAva->row();
        
        if ($isAva){
            $q = "UPDATE tbl_cart SET qty= qty + ".$qty.",price='".$price."', ";
            $q.= "product_name='".$product_name."',image='".$image."',weight ='".$weight."',diskon_price='".$diskon_price."' ";
            $q.= "WHERE id='".$isAva->id."'";
            
            $this->db->query($q);
            if ( $this->db->affected_rows() ){
                $success = true;
            }else{
                $success = false;
            }
        }else{
            $data2 = array(
                'user_id'       => $userId,
                'product_id'    => $product_id,
                'qty'           => $qty,
                'price'         => $price,
                'diskon_price'  => $diskon_price,
                'product_name'  => $product_name , //$res->product_name
                'image'         => $image,
                'weight'        => $weight,
                  //'options' => array('Size' => 'L', 'Color' => 'Red')
                );
            $this->db->insert('tbl_cart',$data2);
            if ( $this->db->affected_rows() ){
                $success = true;
            }else{
                $success = false;
            }
        }
        
        return $success;
    }
    
    public function remove($id){
        $q = "DELETE FROM tbl_cart WHERE id='".$id."'";
        $this->db->query($q);
        if ( $this->db->affected_rows() ){
            $success = true;
        }else{
            $success = false;
        }
        return $success;
    }
    public function listCart($userId){
        $q = "SELECT * FROM tbl_cart WHERE user_id='".$userId."'";
        $res= $this->db->query($q);
        return $res->result();
    }
    
    public function totalPrice($userId){
        $q = "SELECT SUM(qty * price) as grand_total FROM tbl_cart WHERE user_id='".$userId."'";
        $res= $this->db->query($q);
        $res = $res->row();
        
        if ( $res ){
            return $res->grand_total;
        }
        return 0;
    }
    
    public function totalOrder($userId){
        $q = "SELECT SUM(qty) as totalQty,SUM(qty * (price-diskon_price)) as grand_total FROM tbl_cart WHERE user_id='".$userId."'";
        $res= $this->db->query($q);
        $res = $res->row();
        
        if ( $res ){
            return $res;
        }
        return 0;
    }
    
    public function totalWeight($userId){
        $q = "SELECT IFNULL(SUM(qty * weight),0) as total_weight FROM tbl_cart WHERE user_id='".$userId."'";
        $res= $this->db->query($q);
        $res = $res->row();
        
        if ( $res ){
            return $res->total_weight;
        }
        return "0";
    }
    
    public function getItem($id){
        $q = "SELECT * FROM tbl_cart WHERE id='".$id."'";
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
}
