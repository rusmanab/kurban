<?php
class Morders extends MY_Model{
    protected static $table	='tbl_orders';
	protected static $pid	='id';
    
    public function getDataTable(){
        
        $columns = array(
                    	array( 'db' => 'no_order', 'dt' => 0, 'suffix' =>'o',
                               'formatter' => function( $d, $row ) {
                    		
                                
                                return '<a href="'.site_url('orders/detail/'.$row["no_order"]).'" class="orderdetailx" data-url="'.site_url('orders/detail/'.$row["no_order"]).'" data-toggle>#'.$d.'</a>';
                    		  },
                                 
                              ),
                    	array( 'db' => 'full_name',  'dt' => 1, 'suffix' =>'u',),                
                    	array( 'db' => 'order_date',   'dt' => 2,'suffix' =>'o',
                                'formatter' => function( $d, $row ) {
                    			//return $d;
                                return date( 'd-m-Y H:i:s', strtotime($d));
                    		  } ),
                        array( 'db' => 'total_price',   'dt' => 3,'suffix' =>'o',
                                'formatter' => function( $d, $row ) {
                    			$total_price = "Rp " . number_format( $row['total_price']);
                                return $total_price;
                    		  } ),
                        array('db'=>'nama_status', 'dt'=>4,'suffix' =>'s',
                             'formatter' => function( $d, $row ){
                                    
                                    $status = '<span class="'.$row['label_color'].'"> '.$d.' </span>';
                                    if (empty($d)){
                                        $status = '<span class="label label-warning"> Unpaid </span>';
                                    }
                                    
                                    return $status;
                             })
                    );
        
       
        
        $q = "SELECT o.*,s.nama_status,s.label_color, u.full_name, u.email, u.phone_number FROM tbl_orders o 
            LEFT JOIN tbl_users u ON u.id = o.user_id 
            LEFT JOIN tbl_status s ON s.id = o.status_id";
        $result = $this->simple($_GET,self::$table,self::$pid,$columns,$q, "yes" );
        echo json_encode($result); 
        
    }
    
    public function getOrder($noorder){
        $q = "SELECT t.*,u.full_name,u.address, u.provinsi, u.kota, u.email,u.avatar_thumbs, 
              u.phone_number, u.postal_code, m.nama_pembayaran  FROM ".self::$table." t 
              LEFT JOIN tbl_users u ON u.id = t.user_id            
              LEFT JOIN tbl_methode_bayar m ON m.id = t.methode_bayar_id 
              WHERE t.no_order='".$noorder."'";
              
        $res = $this->db->query($q);
        
        return $res->row();
    }
    public function getOrderInfoDoku($noorder){
        $q = "SELECT t.total_price,t.no_order,u.full_name, u.phone_number, u.email,  
              u.provinsi_id, u.kota_id, u.address, u.postal_code, p.nama_provinsi,k.nama_kota, m.nama_pembayaran 
              FROM ".self::$table." t 
              LEFT JOIN tbl_users u ON u.id = t.user_id
              LEFT JOIN tbl_provinsi p ON p.id = u.provinsi_id
              LEFT JOIN tbl_kota k ON k.id = u.kota_id              
              LEFT JOIN tbl_methode_bayar m ON m.id = t.methode_bayar_id 
              WHERE t.no_order='".$noorder."'";
              
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    
    public function getOrderByStatus($memberId,$status=0){
        $q = "SELECT o.*,s.nama_status, s.label_color, m.nama_pembayaran FROM tbl_orders o 
              LEFT JOIN tbl_status s ON s.id = o.status_id 
              LEFT JOIN tbl_methode_bayar m ON m.id = o.methode_bayar_id
              WHERE user_id='".$memberId."' AND status_id !='7' ORDER by o.order_date DESC";//'".$status."'";
        
        $res = $this->db->query($q);
        
        return $res->result();
    }	
    
    /* API */
    
    public function listOrder($memberId,$param){
        
        $limit = 10; 
        $star = 0;
        $page = 1;
        if (!isset($param['pages'])){
            if ( $param['pages'] > 0 ){
                $star =  ($param['pages'] - 1) * $limit;    
                $page = $param['pages'];
            }
        }
        
        $q2 = "SELECT o.no_order FROM tbl_orders o WHERE o.user_id='".$memberId."' 
               AND o.status_id !='7' ORDER by o.order_date DESC";
        $res2 = $this->db->query($q2);
        
        $total = $res2->num_rows();
        
        $jumpage = ceil($total / $limit);
                
        $more = false;
        
        if ( $jumpage > $page ){
            $more = true;
        }
        
        $q = "SELECT o.*,s.nama_status, s.label_color, m.nama_pembayaran FROM tbl_orders o 
              LEFT JOIN tbl_status s ON s.id = o.status_id 
              LEFT JOIN tbl_methode_bayar m ON m.id = o.methode_bayar_id
              WHERE user_id='".$memberId."' AND status_id !='7' ORDER by o.order_date DESC LIMIT ".$star.",".$limit;//'".$status."'";
        
        $res = $this->db->query($q);
        $res = $res->result();
        
        $return = array(
                    'list'      => $res,
                    'paging'    => array(
                                        'currentpage'   => $page,
                                        'more'          => $more
                                        )
                    );
        return $return;
        
        //return $res->result();
    }
    
    public function getOrderDetail($noorder){
       
        
        $q = "SELECT t.*,u.full_name,u.address, u.email as pay_email,u.avatar_thumbs, u.phone_number, u.postal_code as pay_postal_code  
              , p.nama_provinsi,k.nama_kota, m.nama_pembayaran  FROM ".self::$table." t 
              LEFT JOIN tbl_users u ON u.id = t.user_id
              LEFT JOIN tbl_provinsi p ON p.id = u.provinsi_id
              LEFT JOIN tbl_kota k ON k.id = u.kota_id              
              LEFT JOIN tbl_methode_bayar m ON m.id = t.methode_bayar_id 
              WHERE t.no_order='".$noorder."'";
              
        $order = $this->db->query($q);
        $order = $order->row();
        $return = false;
        if ($order){
            $orderdetail        = array(
                                    'no_order'      => $order->no_order,
                                    'total_price'   => $order->total_price, 
                                    'order_date'    => $order->order_date,
                                    );
            $paymentAddress     = array(
                                    'pay_name'              => $order->full_name,
                                    'pay_alamat'            => $order->address . " ". $order->nama_kota. " ".$order->nama_provinsi,
                                    'pay_postal_code'       => $order->pay_postal_code,
                                    'pay_nomor_telepon'     => $order->phone_number,
                                    'pay_email'             => $order->pay_email,
                                    );
            $shippingAddress    = array(
                                    'shipp_name'            => $order->nama_pemesan,
                                    'shipp_address'         => $order->alamat,
                                    'shipp_postal_code'     => $order->postal_code,
                                    'shipp_nomor_telepon'   => $order->nomor_telepon,
                                    'shipp_email'           => $order->email,
                                    );
            
            $qorder = "SELECT od.qty, od.price, od.total_price FROM tbl_order_detail od 
                        LEFT JOIN tbl_product p ON p.id= od.product_id
                        LEFT JOIN tbl_post ps ON ps.id=p.post_id WHERE od.no_order='".$noorder."'";
            
            $orderList = $this->db->query($qorder);
            $orderList = $orderList->result();
            
            
            $Qorderhistory = "SELECT oh.created_date, s.nama_status, s.label_color FROM tbl_order_history oh 
                              LEFT JOIN tbl_status s ON s.id = oh.status_id WHERE oh.no_order='".$noorder."'";
            $orderHistory = $this->db->query($Qorderhistory);
            $orderHistory = $orderHistory->result();
            $return = array(
                        'order'             => $orderdetail,
                        'payment_address'   => $paymentAddress,
                        'shipping_address'  => $shippingAddress,
                        'order_detail'      => $orderList,
                        'order_history'     => $orderHistory
                        );
            
        }
        
        return $return;
    }
}