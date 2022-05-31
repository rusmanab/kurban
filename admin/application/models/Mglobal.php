<?php
class Mglobal extends CI_Model{
    
    public function getTopSelling(){
        $query = "SELECT ";    
    }
    
    public function getMostViewed(){
        $q = "SELECT ps.post_title, ps.viewed, p.price FROM tbl_product p 
              LEFT JOIN tbl_post ps ON ps.id=p.post_id WHERE ps.viewed > 0 ORDER BY ps.viewed DESC LIMIT 6 ";
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function getNewCustomer(){
        
    }
    
    public function getNewOrder(){
        $q = "SELECT u.full_name,u.username, o.order_date, o.total_price,o.total_diskon, 
              o.methode_bayar_id,m.nama_pembayaran, o.status_id, o.no_order, s.nama_status, s.label_color 
              FROM tbl_orders o
              LEFT JOIN tbl_users u ON u.id = o.user_id 
              LEFT JOIN tbl_status s ON s.id = o.status_id
              LEFT JOIN tbl_methode_bayar m ON m.id = o.methode_bayar_id
              ORDER BY o.id DESC LIMIT 6 ";
        
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
   
    public function getMember($userid){
        $q = "SELECT * FROM tbl_users WHERE id='".$userid."' AND status='1'";
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    public function loadStatistik($userid){
        $q = "SELECT * FROM tbl_job_statistic WHERE user_id='".$userid."'";
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    public function getTempoBayar($orderId){
        $q = "SELECT * FROM tbl_order_payment_tempo WHERE order_id=".$orderId;
        $res = $this->db->query($q);
        $res = $res->row();
        return $res;
    }
    
    
}