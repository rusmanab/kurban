<?php
class Cart extends MY_Controller{
    
    private $_userId;
    
    public function __construct(){
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('mglobal');
        $this->_userId = $this->getUserid();
    }
    
    public function index(){
        $this->load->model('mcart');
        
        $regCss = array(                       
                        base_url('assets/themes/themesv1/css/cart.css'),
                        );       
                        
        $this->themes->registerCsshead($regCss);
        
        $regJs = 'javascript/cart';
        $this->themes->registerScript($regJs);
        
        $view = 'cart'; 
        $data['relatedProduk'] = $this->mglobal->getLatestProduk();
        $data['mcategoryHidden'] = true;
        
        $data['carts']            = $this->mcart->listCart($this->_userId); 
        $data['mcart']            = $this->mcart;
        
        $this->themes->display($view,$data);
    }
    public function checkVoucher(){

       
        $voucher    = $this->input->post('voucher', true);        

        $res    = $this->mglobal->getVoucher($voucher);
        if ($res){

           $error = false;
           $response['dataVoucher']= $res;
        }else{  
            $error = true;
            $response['dataVoucher']= array();
        }

        $response['error']  = $error;

        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }
    public function updateQty(){
        $id  = $this->input->post('rowId',TRUE);
        $qTy = $this->input->post('qty',TRUE);
        
        $res = $this->mcart->updateCart($id,$qTy,$this->_userId);
        
        echo json_encode( $res );
    }
    public function update_cart(){
        $id  = $this->input->post('id',TRUE);
        $qTy = $this->input->post('qty',TRUE);
        
        $c = count($id);
        for($i=0; $i < $c; $i++){
            $this->mcart->updateCart($id[$i],$qTy[$i],$this->_userId);
        }
        
        redirect('cart');
        
    }
    
    
    public function add($id = ''){
        $this->output->enable_profiler(true);
        if (empty($id)){
            $id  = $this->input->post('id',TRUE);    
        }
        
        $qTy = $this->input->post('qty',TRUE);
        if (!$qTy){
            $qTy = 1;
        }
        $res = $this->mglobal->getProduct($id);
      
        if ($res){
            
            $this->load->model('mcart');
            
            $product_name = preg_replace('/[^a-zA-Z0-9-_ \.]/','', $res->product_name);
            
            $weight =  $res->weight;
            
            if ( $res->weight_in == "kg" ){
                $weight =  $res->weight * 1000;
            }
            
            $data2 = array(
                    'user_id'       => $this->_userId,
                    'product_id'    => $id,
                    'qty'           => $qTy,
                    'price'         => $res->price,
                    'diskon_price'  => $res->discount_price,
                    'product_name'  => $product_name , //$res->product_name
                    'image'         => $res->post_image_thumbs,
                    'weight'        => $weight,
                    );
           
            $res = $this->mcart->add($data2);
            if ( $res ){
                redirect('/cart');
            }            
        }else{
            show_404();
        }
        
    }     
    
    public function remove($cartId){
        $this->load->model('mcart');
        
        $this->mcart->remove($cartId);
        redirect('/cart');
    }
   
    
    public function payment(){
        $order_id = $this->input->get_post("orderId", true);
        
        $listMethode            = $this->mglobal->getListMethodePayment();
        $listBank               = $this->mglobal->getListBank();
        $view                   = 'payment_confirm';
        
        $getTransaction         = $this->mglobal->getTransaction($order_id);
        
        if (!$getTransaction){
            
        }
        $data['classBody']      = 'cart';
        $data['mcategoryHidden']= true;
        $data['listBank']       = $listBank;
        $data['listMethode']    = $listMethode;
        $data['mglobal']        = $this->mglobal; 
        $data['orderSum']       = $getTransaction['ordersum'];
        $data['orderdet1']      = $getTransaction['orderdet1'];
        $data['orderdet2']      = $getTransaction['orderdet2'];
        $regJs = 'javascript/payment';
        $this->themes->registerScript($regJs);
        $this->themes->display($view,$data);
    }
    
    public function payment_confirm(){
        $this->load->library('kirimemail');
        
        $no_order           = $this->input->post("no_order", true);
        $orderId            = $this->input->post("orderId", true);
        $methode_bayar_id   = $this->input->post("methode_bayar_id", true);
        $payment_id         = $this->input->post("payment_id", true);
        
        $data = array(
                    'orderId'           => $orderId,
                    'methode_bayar_id'  => $methode_bayar_id,
                    'payment_id'        => $payment_id
                    );
        $res = $this->mglobal->confirmPayment($data);
        if (!$payment_id || !$methode_bayar_id || !$no_order || !$orderId){
            $this->session->set_userdata('payrequest', '<strong>Error!</strong> Silahkan pilih pembayaran.');
            $returnUrl = "/cart/payment?orderId=".$no_order;
            redirect($returnUrl);
        }
                    
        
        if ($res){
            
            $data['info'] = $this->mglobal->detailOrder($orderId);
            $data['listBank']= $this->mglobal->getListBank();   
            $viewMail = "email_order";
            $data['subject']= "Menunggu Pembayaran #".$no_order;
            $data['email']  = $data['info']['orders']->email;
            $status_id = 1;
            if ($methode_bayar_id == 4){
                $data['subject']= "Menunggu Verifikasi Pembayaran Tempo no order #".$no_order;
                $status_id = 11;
                //$viewMail = "email_order_tempo";
            }

            $orderHistory = array(
                            'order_id'          => $orderId,
                            'comment'           => $data['subject'],
                            'status_id'         => $status_id,
                            'customer_notif'    => $data['subject'],
                            'created_date'      => date("Y-m-d H:i:s")
                            );
            $this->db->insert('tbl_order_history', $orderHistory);
            
            $this->kirimemail->kirim($viewMail,$data);
        }
        
        redirect('cart/order_finish?orderId='.$no_order);
    }
    
    public function order_finish(){
        $order_id = $this->input->get_post("orderId", true);
        
      
        $view                   = 'order_finish';
        
        $getTransaction         = $this->mglobal->getTransaction($order_id);
        $listBank               = $this->mglobal->getListBank();
        
        $data['classBody']      = 'cart';
        $data['mcategoryHidden']= true;
        $data['orderSum']       = $getTransaction['ordersum'];
        $data['listBank']       = $listBank;
        
        $this->themes->display($view,$data);
    }
    
    public function order_confirm(){
        
        $userId         = $this->getUserid();
        $kupon          = $this->input->post("kupon", true);
        $address_id     = 0;//$this->input->post("address_id", true);
        $idCart         = $this->input->post("id", true);
        
        $date           = date('Y-m-d H:i:s');        
        $noorder        = date('Ymd');        
        $noorder        = $userId . $noorder . substr(mt_rand(),0,4);       
        $ipnumber       = "";
        
        $newOrder = array(
                        'no_order'      => $noorder,
                        'user_id'       => $userId,
                        'ipnumber'      => $ipnumber,
                        'order_date'    => $date,
                        'address_id'    => $address_id
                    );
        $this->db->insert('tbl_orders', $newOrder);
        
        if ( $this->db->affected_rows() ){
            $order_Id = $this->db->insert_id();
            $grandTotal = 0;
            $grandWeight = 0;
            $total_diskon = 0;
            
            foreach($idCart as $p){
                $item = $this->mcart->getItem($p);
             
                $total      = $item->price  * $item->qty;
                $totalPrice = ($item->price - $item->diskon_price) * $item->qty;
                $totalW     = $item->weight * $item->qty;
                
                $insertDetail = array(
                                'order_id'      => $order_Id,
                                'product_id'    => $item->product_id,
                                'pruduct_name'  => $item->product_name,
                                'image'         => $item->image,
                                'qty'           => $item->qty,
                                'price'         => $item->price,
                                'diskon_price'  => $item->diskon_price,
                                'total_price'   => $totalPrice,
                                'weight'        => $totalW,
                                );
                $diskon_price = $item->qty * $item->diskon_price;
                $this->db->insert('tbl_order_detail', $insertDetail);
                if ( $this->db->affected_rows() ){
                    
                    $this->mcart->remove($p);
                    
                    $grandTotal+= $total;
                    $grandWeight+= $totalW;
                    $total_diskon+= $diskon_price;
                }
            }
            if ( $kupon ){
                $res    = $this->mglobal->getVoucher($kupon);
                if ($res){
                    
                    $insertCoupon = array(
                        'coupon_id' => $res->id,
                        'no_order' => $noorder,
                        'order_id'  => $order_Id,
                        'user_id' => $userId,
                        'amount' => $res->value,
                        'date_added' => $date
                    );   
                    if ( $this->db->insert('tbl_coupon_history', $insertCoupon)){
                        $total_diskon+= $res->value;
                        $total_diskon-= $res->value;
                    }
                }
            }

           $error = false;
            
            $dataUpdate = array(
                            'total_price' => $grandTotal,
                            'total_diskon'=> $total_diskon,
                            );
            $this->db->where('id', $order_Id);

            if ( $this->db->update('tbl_orders', $dataUpdate)){
                $error = false;
            }else{
                $error = true;
            }
            if (!$error){
                    // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = 'SB-Mid-server-zsFu-QLYAN7mWpAsUOapWgmF';
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;
                
                $userInfo = $this->mglobal->getUserInfo($userId);

                $params = array(
                    'transaction_details' => array(
                        'order_id' => $order_Id,
                        'gross_amount' => $grandTotal,
                    ),
                    'customer_details' => array(
                        'first_name' => $userInfo->full_name,
                        'last_name' => '',   
                        'email' => $userInfo->email,
                        'phone' => $userInfo->phone_number,
                    ),
                );
                
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                if ($snapToken ){
                    redirect('https://app.sandbox.midtrans.com/snap/v2/vtweb/'.$snapToken);
                }
            }
        }
       
    }
    

    public function testBayar()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-zsFu-QLYAN7mWpAsUOapWgmF';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 1250000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        var_dump($snapToken);
    }
}