<?php

class Api extends API_Controller{

    public function __construct(){	
        parent::__construct();     
        $this->load->model(array('mglobal','moauth'));
        $this->mglobal->setLevel($this->getLevel());

    }


    public function login(){
        $email      = $this->input->post('email', true);
        $password   = $this->input->post('password', true);
        $fcmToken   = $this->input->post('fcmToken', TRUE);

        $res = $this->mglobal->login($email,MD5($password));
		
        if ($res){
			if ( $res->status == '1' ){
				$res->fcmToken = $fcmToken;

				$token = $this->moauth->saveToken($res,"1");

				$errSts = 200;
				$response['error']      = false;
				$response['error_msg']  = "";
				$response['userInfo']   = $res;
				$response['token']      = $token;
			}elseif ( $res->status == '2' ){
				$errSts = 200;
				$response['error']      = true;
				$response['error_msg']  = "Akun anda belum aktif, silakan aktivasi melalui email yang kami kirim, atau lakukan pendaftaran ulang.";
				$response['userInfo']   = "";
			}else{
				$errSts = 200;
				$response['error']      = true;
				$response['error_msg']  = "Login gagal, akses di tolak";
				$response['userInfo']   = "";
			}
        }else{
            $errSts = 200;
            $response['error']      = true;
            $response['error_msg']  = "Login gagal, akses di tolak";
            $response['userInfo']   = "";
        }

        

        $this->output->set_status_header($errSts)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    

    public function resetPass(){

        $email = $this->input->get_post("email", true);    
        $this->load->helper('string');
        $cekEmail = $this->mglobal->checkEmail($email);

        if (!$cekEmail){
            $response['error']      = true;
            $response['error_msg']  = "Reset password gagal, email belum terdaftar.";
            $errSts = 200;

        }else{
			if ( $cekEmail->status == '1' ){
				$res = $this->mglobal->updatePassword($email);
				$error = $res['error'];
				$genecode = $res['genecode'];  
	
				if (!$error){
					$errSts = 200;
					$response['error']      = false;
					$response['error_msg']  = "";
					$register['subject']    = "Permintaan mengatur ulang kata sandi."; 
					$register['genecode']   = $genecode; 
					$register['email']      = $email;                                
					$view                   = "reset_pass";
	
					$this->kirimEmail($view,$register);
	
					unset($register['genecode'] );
	
				}else{	
					$errSts = 200;
					$response['error']      = true;
					$response['error_msg']  = "Permintaan mengatur ulang kata sandi akun gagal";
	
				}
			}elseif ( $cekEmail->status == '2' ){
				$errSts = 200;
				$response['error']      = true;
				$response['error_msg']  = "Akun anda belum aktif, silakan aktivasi melalui email yang kami kirim, atau lakukan pendaftaran ulang.";
				$response['userInfo']   = "";
			}else{
				$errSts = 200 ;
				$response['error']      = true;
				$response['error_msg']  = "Permintaan mengatur ulang kata sandi akun gagal";
			}           

        }
       

        $this->output->set_status_header($errSts)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }



    public function changePassword(){
        $email = $this->input->get_post("email", true);    
        $password = $this->input->get_post("passBaru", true);    
        $cekEmail = $this->mglobal->checkEmail($email);

        if (!$cekEmail){
            $response['error']      = true;
            $response['error_msg']  = "Ubah sandi gagal, email belum terdaftar.";
            $errSts = 200;

        }else{

            $res = $this->mglobal->changePassword($email,$password);
            $error = $res['error'];

            if (!$error){
                $errSts = 200;
                $response['error']      = false;
                $response['error_msg']  = "";
                $register['subject']    = "Ubah kata sandi berhasil."; 

            }else{

                $errSts = 304 ;
                $response['error']      = true;
                $response['error_msg']  = "Ubah kata sandi gagal";

            }

        }


        $this->output->set_status_header($errSts)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }



    public function register(){

        $full_name = $this->input->get_post('full_name', true);
        $phone_number = $this->input->get_post('phone_number', true);
        $email = $this->input->get_post('email', true);

        //$username = $this->input->get_post('username', true);
        $password = $this->input->get_post('password', true);
        //full_name,phone_number,email,password

        $register = array(
                    'full_name'     => $full_name,
                    'phone_number'  => $phone_number,
                    'email'         => $email,
                    'username'      => $email,
                    'password'      => MD5($password),
                    'date_created'  => date('Y-m-d H:i:s')
                    );

        $cekEmail = $this->mglobal->checkEmail($email);

        if ($cekEmail){
			
            $errSts = 200;
			if ( $cekEmail->status == '2' ){
				$geneCode = $cekEmail->activated_key;
				$this->load->library('kirimemail');
            
				$register['subject']    = "Aktivasi Akun Kurbandipelosok.com"; 
				$register['genecode']   = $geneCode;
				
				$view                   = "email_register";
				$res = $this->kirimemail->kirim($view,$register);
				$response['error']      = true;
				$response['email']      = $res ;
            	$response['error_msg']  = "Email sudah terdaftar. Silakan cek email anda, untuk melakukan aktifvasi.";
			}else{
				$response['error']      = true;
            	$response['error_msg']  = "Email sudah terdaftar. Silakan login";
			}
        }else{

            $res = $this->mglobal->register($register);
            $error = $res['error'];
            $genecode = $res['genecode'];  

            if (!$error){
                $errSts = 200;
                $response['error']      = false;
                $response['error_msg']  = "";
                $register['subject']    = "Aktivasi Akun Kurbandipelosok.com"; 
                $register['genecode']   = $genecode;

                $view                   = "email_register";

                $this->kirimEmail($view,$register);

                unset($register['genecode'] );

            }else{

                $errSts = 304 ;

                $response['error']      = true;

                $response['error_msg']  = "Pendaftaran akun gagal";

            }

        }


        $this->output->set_status_header($errSts)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    

    

    public function kirimEmail($view,$data){
		$this->load->library('kirimemail');
		$response = $this->kirimemail->kirim($view,$data);
        return $response;

    }

    public function listCart(){

        //$this->output->enable_profiler(true);

        $this->load->model('mcart');

        

        $userId = $this->getUserid();

        

        if ($userId){

            $param['where'] = array('user_id'=> $userId);

            $this->mcart->setParam($param);

            $cart = $this->mcart->getData();

            if ( $cart ){

                $response['error']      = false;

                $response['cart']       = $cart;

                $response['error_msg']  = "";

            }else{

                $response['error']      = true;

                $response['error_msg']  = "Keranjang kosong";

            }

        }

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    

    public function addCart(){

        $id  = $this->input->post('product_id',TRUE);

        $qTy = $this->input->post('qty',TRUE);

        

        $res = $this->mglobal->getProduct($id);

        $userId = $this->getUserid();

        if ($userId){

            if ($res){

                $this->load->model('mcart');

                $success = false;

                

                $product_name = preg_replace('/[^a-zA-Z0-9-_ \.]/','', $res->product_name);

                

                $q = "SELECT * FROM tbl_cart WHERE user_id='".$userId."' AND product_id='".$id."'";

                

                $isAva = $this->db->query($q);

                $isAva = $isAva->row();

                

                $weight = $qTy * $res->weight;            

                if ( $res->weight_in == "kg" ){

                    $weight = $qTy * $res->weight * 1000;

                }

                if ($isAva){

                    $qTy = ($isAva->qty + $qTy);

                    $weight = $qTy * $res->weight;            

                    if ( $res->weight_in == "kg" ){

                        $weight = $qTy * $res->weight * 1000;

                    }



                    $q = "UPDATE tbl_cart SET qty='".$qTy."',price='".$res->price."',diskon_price= '".$res->discount_price."',";

                    $q.= "product_name='".$product_name."',image='".$res->post_image_thumbs."', ";

                    $q.= "weight='".$weight."' WHERE id='".$isAva->id."'";

                    

                    

                    $this->db->query($q);

                    if ( $this->db->affected_rows() ){

                        $success = true;

                    }

                }else{

                    

                    $data2 = array(

                        'user_id'       => $userId,

                        'product_id'    => $id,

                        'qty'           => $qTy,

                        'price'         => $res->price,

                        'diskon_price'  => $res->discount_price,

                        'product_name'  => $product_name , //$res->product_name

                        'image'         => $res->post_image_thumbs,

                        'weight'        => $weight,

                          //'options' => array('Size' => 'L', 'Color' => 'Red')

                        );

                    $this->mcart->setData($data2);

                    if ( $this->mcart->save() ){

                        $success = true;

                    }

                }

                

                

                

                if ( $success ){

                   

                    $response['error']      = false;

                    $response['error_msg']  = "Menambahkan produk ke kerangjang berhasil";

                }else{

                    

                    $response['error']      = true;

                    $response['error_msg']  = "Menambahkan produk ke kerangjang gagal";

                }   

            }else{

               

                $response['error']      = true;

                $response['error_msg']  = "Produk tidak ada";

            }

        }else{

            

            $response['error']      = true;

            $response['error_msg']  = "Pengguna tidak valid";

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

        

    }

    

    public function deleteCart(){

        $id  = $this->input->post('cartId',TRUE);

        

        if ($id){

            $this->load->model('mcart');

            

            $where['where'] = array('id' => $id);

            $this->mcart->setParam($where);

            if ( $this->mcart->delete() ){

                $response['error']      = false;

                $response['error_msg']  = "Hapus  item berhasil";

            }else{

                $response['error']      = true;

                $response['error_msg']  = "Hapus  item gagal";

            }

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Produk tidak ada";

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

        

    }

    

    public function updateCart(){

        $id  = $this->input->post('cartId',TRUE);

        $qTy = $this->input->post('qty',TRUE);

        

        if ($id){

            $this->load->model('mcart');

            

            $where['where'] = array('id' => $id);

            $this->mcart->setParam($where);

            

            $data = array('qty' => $qTy);

            $this->mcart->setData($data);

            if ( $this->mcart->save() ){

                $response['error']      = false;

                $response['error_msg']  = "Perbahrui item berhasil";

            }else{

                $response['error']      = true;

                $response['error_msg']  = "Perbahrui item gagal";

            }

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Produk tidak ada";

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

        

    }

    

    public function order_confirm(){

        $userId         = $this->getUserid();

        $address_id     = $this->input->post("address_id", true);

        $idCart         = $this->input->post("idcart", true);

        $kurir          = $this->input->post("kurir", true);

        $infokurir      = $this->input->post("infokurir", true);

        $priceShip      = $this->input->post("priceShip", true);

        

        $date = date('Y-m-d H:i:s');

        

        $noorder = date('Ymd');

        

        $noorder = $userId . $noorder . substr(mt_rand(),0,4);

       

        $ipnumber = "";

        

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

                

                $totalW = $item->weight * $item->qty;

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

            $weigthKg = $grandWeight / 1000;

            

            $insertAny = array(

                            'order_id'      => $order_Id,

                            'keterangan'    => $kurir . " " . $infokurir . " / " . $weigthKg . " Kg",

                            'price'         => $priceShip,                           

                            );

            $this->db->insert('tbl_order_detail2', $insertAny);

            if ( $this->db->affected_rows() ){

                $grandTotal+= $priceShip;

            }

            

            // voucher

            $voucher = $this->input->post("voucher", true);

            $res    = $this->mglobal->getVoucher($voucher);

            

            if ($res){

                if ( $res->coupon_type == "1"){

                    $potongan = ($res->value / 100) * $grandTotal;

                    $descDiskon = "Diskon ".$res->value."% (Rp ". number_format($potongan) .")";

                    //$grandTotal = $grandTotal - $potongan;

                }

                if ( $res->coupon_type == "2"){

                    $potongan = $res->value;

                    // = $grandTotal - $res->value;

                    $descDiskon = "Diskon ".$res->value;

                }

                $total_diskon+= $potongan;

                //$dataUpdate['total_diskon'] = $potongan;

                

                $insertAny = array(

                            'order_id'      => $order_Id,

                            'keterangan'    => "Kode voucher " . $voucher . $descDiskon,

                            'price'         => "-".$potongan,                           

                            );

                $this->db->insert('tbl_order_detail2', $insertAny);

                

            }

            

            $dataUpdate = array(

                            'total_price' => $grandTotal,

                            'total_diskon'=> $total_diskon

                            );

            

            $this->db->where('id', $order_Id);

            $this->db->update('tbl_orders', $dataUpdate);

            

            if($this->db->affected_rows()){

                $response['error']      = false;

                $response['error_msg']  = "Berhasil";

                $response['orderId']    = $order_Id;

                $response['no_order']   = $noorder;

            }else{

                $response['error']      = true;

                $response['error_msg']  = "Pembelian gagal";

            }

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    

    public function payment_confirm(){

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

        if($res){

            $this->load->model('mglobal');

            

            $data['info'] = $this->mglobal->detailOrder($orderId);

            $data['listBank']= $this->mglobal->getListBank();   

            $view           = "email_order";

            $data['subject']= "Menunggu Pembayaran #".$no_order;

            $data['email']  = $data['info']['orders']->email;

            

             $orderHistory = array(

                            'order_id'          => $orderId,

                            'comment'           => $data['subject'],

                            'status_id'         => '1',

                            'customer_notif'    => $data['subject'],

                            'created_date'      => date("Y-m-d H:i:s")

                            );

            $this->db->insert('tbl_order_history', $orderHistory);

            

            $this->kirimEmail($view,$data);
            

            $response['error']      = false;

            $response['error_msg']  = "Konfirmasi pembelian berhasil, silahkan selesaikan pembayaran anda";

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Pembelian gagal";

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    

    /*

    Wishlist

    */

    public function listWishlist(){

      

        $userId = $this->getUserid();

        

        $isOk = $this->mglobal->getWishList($userId);

        if ($isOk){

            $response['error']      = false;

            $response['listWisht']  = $isOk;

            $response['error_msg']  = "";

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Wish list kosong";

            $response['listWisht']  = array();

        }

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }



    public function addWishlist(){

        $product_id  = $this->input->post('product_id',TRUE);

        $userId = $this->getUserid();

        

        $data = array(

                'product_id' => $product_id,

                'user_id'    => $userId,

                'add_date'   => date('Y-m-d H:i:s')

                );

                

        $isOk = $this->mglobal->addWishList($data);

        

        if ($isOk != '2'){

            if ( $isOk == "-1" ){

                $msg = "Produk berhasil di hapus dari wish list";

            }elseif ( $isOk == "1" ){

                $msg = "Produk berhasil di tambahankan ke wish list";

            }  

            $response['error']      = false;

            $response['error_msg']  = $msg;

            $response['error_no']  = $isOk;

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Produk gagal di tambahankan ke wish list";

        }

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }



    public function deleteWishlist(){

        $wishlistId  = $this->input->post('wishId',TRUE);

        $userId = $this->getUserid();

        

        if ($wishlistId && $userId){

            $isOk = $this->mglobal->deleteWishList($wishlistId,$userId);

            if ($isOk){

                $response['error']      = false;

                $response['error_msg']  = "Hapus Produk dari wish list berhasil";

            }else{

                $response['error']      = true;

                $response['error_msg']  = "Hapus Produk dari wish list gagal";

            }

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Invalid parameter";

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    

    /* Last Seen Produk */

    

    public function lastseenProduk(){

        $userId         =  $this->getUserid();

        $lastSeenProduk = $this->mglobal->getLastSeenProduk($userId);

        

        if ($lastSeenProduk){

            $response['error']          = false;

            $response['lastSeenProduk'] = $lastSeenProduk;

            $response['error_msg']      = "";

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Kosong";

            $response['listWisht']  = array();

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    

    /* End */

    

    /* List Payment */

    public function listTransaksi(){

        $userId          = $this->getUserid();

        

        $transaksi = $this->mglobal->getListPembayaran($userId);

        if ($transaksi){

            $response['error']          = false;

            $response['listTransaksi']  = $transaksi;

            $response['error_msg']      = "";

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Tidak ada transaksi";

            $response['listWisht']  = array();

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    /* End */

    /* Address */

    

    public function setDefaultAddress(){

        $userId = $this->getUserid();

        $idAddress = $this->input->post('address_id', TRUE);

        

        if ( $userId && $idAddress){

            $update = array('is_default'=>'0');

            $this->db->update('tbl_user_address',$update,array('user_id' => $userId));

            

            $update = array('is_default'=>'1');

            $this->db->update('tbl_user_address',$update,array('id' => $idAddress));

            

            if ($this->db->affected_rows()){

                $response['error']      = false;

                $response['error_msg']  = "";

                

            }else{

                $response['error']      = true;

                $response['error_msg']  = "";

                

            }

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Invalid parameter";

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    

    public function listAddress(){

        $userId = $this->getUserid();

        

        

        if ( $userId){

            $list = $this->mglobal->listAddress($userId);

            if ($list){

                $response['error']      = false;

                $response['error_msg']  = "";

                $response['listAddress'] = $list;

            }else{

                $response['error']      = true;

                $response['error_msg']  = "List address kosong";

                $response['listAddress'] = array();

            }

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Invalid parameter";

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    

    

    public function getAddress(){

        $userId = $this->getUserid();

        $idAddress = $this->input->post('address_id', TRUE);

        

        if ( $userId && $idAddress){

          

            $res = $this->db->get_where('tbl_user_address', array('id' => $idAddress));

            $res = $res->row();

            if ($res){

                $response['error']      = false;

                $response['error_msg']  = "";

                $response['dataAddress']= $res;

            }else{

                $response['error']      = true;

                $response['error_msg']  = "";

                $response['dataAddress']= array();

            }

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Invalid parameter";

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    

    public function saveAddress(){

        $userId = $this->getUserid();

        $idAddress = $this->input->post('address_id', TRUE);

        

        if ( $userId){

            

            $nama_alamat     = $this->input->post('nama_alamat', true);

            $recipient       = $this->input->post('recipient', true);

            $phone_number    = $this->input->post('phone_number', true);

            $province_id     = $this->input->post('province_id', true);

            $city_id         = $this->input->post('city_id', true);

            $postal_code     = $this->input->post('postal_code', true);

            $address         = $this->input->post('address', true);

            $province        = $this->input->post('province', true);

            $city            = $this->input->post('city', true);

            $is_default      = $this->input->post('is_default', true);

            

            $alamat = array(

                            'nama_alamat'   => $nama_alamat,

                            'user_id'       => $userId,

                            'recipient'     => $recipient,

                        	'phone_number'  => $phone_number,

                        	'province_id'   => $province_id,

                            'province'      => $province,

                        	'city_id'       => $city_id,

                            'city'          => $city,

                        	'postal_code'   => $postal_code,

                        	'address'       => $address,

                            'is_default'    => $is_default

                        );

            if ( $idAddress ){

                $this->db->where('id', $idAddress);

                $this->db->update('tbl_user_address',$alamat);

            }else{

                $this->db->insert('tbl_user_address',$alamat);    

            }

            

            

            if ($this->db->affected_rows()){

                $response['error']      = false;

                $response['error_msg']  = "Simpan alamat berhasil";;

            }else{

                $response['error']      = true;

                $response['error_msg']  = "Simpan alamat gagal.";

            }

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Invalid parameter";

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    

    public function deleteAddress(){

        $userId = $this->getUserid();

        $idAddress = $this->input->post('address_id', TRUE);

        

        if ( $userId && $idAddress){

            $this->db->where('id', $idAddress);

            $this->db->delete('tbl_user_address');

            

            if ($this->db->affected_rows()){

                $response['error']      = false;

                $response['error_msg']  = "Hapus alamat berhasil.";;

            }else{

                $response['error']      = true;

                $response['error_msg']  = "Hapus alamat gagal.";

            }

        }else{

            $response['error']      = true;

            $response['error_msg']  = "Invalid parameter";

        }

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    public function getProvince(){

        $id = $this->input->post('id', true);

        

        $this->load->library('rajaongkir');

        $province = $this->rajaongkir->province($id);

        $province = json_decode($province);

        

        $province = json_encode($province->rajaongkir);

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output($province);

         

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

        $origin          = '456'; //$this->input->post('origin', true);

        $destination     = $this->input->post('destination', true);

        $weight          = $this->input->post('weight', true);

        $courier         = $this->input->post('courier', true);

        

        $cost = $this->rajaongkir->cost($origin, $destination, $weight,$courier);

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output($cost);

    }

    

    public function updatePass(){

        $origin          = '456'; //$this->input->post('origin', true);

        $destination     = $this->input->post('destination', true);

        $weight          = $this->input->post('weight', true);

        $courier         = $this->input->post('courier', true);

        

        $cost = $this->rajaongkir->cost($origin, $destination, $weight,$courier);

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output($cost);

    }

    

    public function statusOrder(){

        $userId = $this->getUserid();

        $res    = $this->mglobal->getStatusInfo($userId);

        

        if ($res){

           $error = false;

           $response['inbox']= $res;

        }else{  

            $error = true;

            $response['inbox']= array();

        }

        

        $response['error']  = $error;

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    

    public function checkVoucher(){

        $userId     = $this->getUserid();

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

    

    public function listUlasan(){

        $userId     = $this->getUserid();

        $res    = $this->mglobal->getListToUlas($userId);

        if ($res){

           $error = false;

           $response['data']= $res;

        }else{  

            $error = true;

            $response['data']= array();

        }

        

        $response['error']  = $error;

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    

    public function ulasProduct(){

        $userId     = $this->getUserid();

        $error      = false;

        

        $product_id = $this->input->post('product_id', true);

        $no_order   = $this->input->post('no_order', true);        

        $rating     = $this->input->post('rating', true);

        $comment    = $this->input->post('ulasan', true);

        $date       = date('Y-m-d H:i:s');

        

        $image_att = "";

        if (!empty($_FILES["foto"]["size"])){

            $this->load->library('upload');

            

            $setting = array(

    				"upload_path"	=> "assets/images/ulasan",

                    "allowed_types" => "gif|jpg|png|jpeg|swf",

                    "encrypt_name"  => true,

                    "max_size"	    => '2048',

                    "remove_spaces" => true

    			);

            $this->upload->initialize($setting);

    		

            //exit();

            

            if($this->upload->do_upload('foto')){

                $dataFile = $this->upload->data();

                $data     =  array('upload_data' => $this->upload->data());

                $dir      = $setting['upload_path'];

                $path     = $dir."/".$data['upload_data']['file_name'];

                $image_att = $path;

            }

        }

        $this->db->trans_start();

        $q = "INSERT INTO tbl_product_rating(user_id,product_id,rating,created_at) VALUE ('".$userId."','".$product_id."', '".$rating."','".$date."')";

        $this->db->query($q);

        



        $q = "INSERT INTO tbl_comments_order(user_id,product_id,no_order,image_att,comment,created_date,isread)";

        $q.= " VALUE ('".$userId."','".$product_id."','".$no_order."','".$image_att."','".$comment."','".$date."','0')";

        $this->db->query($q);

        $this->db->trans_complete();

        

        if ($this->db->trans_status() === FALSE)

        {

                // generate an error... or use the log_message() function to log your error

            $error = true;

            

        }

        $response['error']  = $error;

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }

    



    public function uploadAvatar(){

        $userId     = $this->getUserid();

        $error      = false;

        

        $email = $this->input->post('email', true);

        $image_att = "";



        if (!empty($_FILES["foto"]["size"])){

            $this->load->library('upload');

            

            $setting = array(

    				"upload_path"	=> "assets/images/avatar",

                    "allowed_types" => "gif|jpg|png|jpeg|swf",

                    "encrypt_name"  => true,

                    "max_size"	    => '2048',

                    "remove_spaces" => true

    			);

            $this->upload->initialize($setting);

    		

            if($this->upload->do_upload('foto')){

                $dataFile = $this->upload->data();

                $data     =  array('upload_data' => $this->upload->data());

                $dir      = $setting['upload_path'];

                $path     = $dir."/".$data['upload_data']['file_name'];

                $image_att = $path;

            }



            $q = "UPDATE tbl_users SET avatar ='".$image_att."' WHERE id ='".$userId."'";

        	$this->db->query($q);

        }



        $response['error']  = $error;

        $response['avatar']  = $image_att;

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($response));

    }



    public function getProfile(){
    	$userId     = $this->getUserid();
        $error      = false;
    	$hasil = $this->db->get_where("tbl_users", array('id'=>$userId))->result();

    	$response['error']  = $error;
        $response['data']  = $hasil;

        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }
   


    public function order_detail(){

        

        $orderNo = $this->input->post('noorder', true);

        $view = 'order_detail';

        $userId   = $this->getUserid();

        /*$userInfo = $this->mglobal->getUserInfo($userId);

        $data['userInfo']    = $userInfo;*/

        

        $listBank               = $this->mglobal->getListBank();

        $getTransaction         = $this->mglobal->getTransaction($orderNo);

        

        if (!$getTransaction){

            $data['true']          = false;

        }else{

            $data['error']          = false;

            $data['listBank']       = $listBank;

            $data['orderSum']       = $getTransaction['ordersum'];

            $data['orderdet1']      = $getTransaction['orderdet1'];

            $data['orderdet2']      = $getTransaction['orderdet2'];

        }

        

        

        

        $this->output->set_status_header(200)

            ->set_content_type('application/json')

            ->set_output(json_encode($data));

	}
	
	public function updateProfile(){
		$userId     = $this->getUserid();
		$error      = false;
		$error_msg	= "Update Profile Gagal";

		$nama = $this->input->get_post("nama", true); 
		$phone = $this->input->get_post("phone", true);
		$email = $this->input->get_post("email", true);
		$data = array(
				'full_name' => $nama,
				'phone_number' => $phone,
				'email' => $email
		);
		
		$this->db->where('id', $userId);
		$this->db->update('tbl_users', $data);
		if ($this->db->affected_rows()){
			$error = true;
			$error_msg = "Update Profile Berhasil";
		}
    	$response['error']  	= $error;
		$response['error_msg']  = $error_msg;

        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
	}
	
}
