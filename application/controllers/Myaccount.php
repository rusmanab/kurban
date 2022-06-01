<?php
class Myaccount extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mglobal');
    }
    
    public function index(){        
        $view = 'userdashboard';
        $data['relatedProduk'] = $this->mglobal->getLatestProduk();
        $userId   = $this->getUserid();
        $userInfo = $this->mglobal->getUserInfo($userId);
        
        $data['historyProduct'] = $this->mglobal->getLastSeenProduk($userId);
        $data['userInfo']       = $userInfo;
        
        $data['countTagihan']   = $this->mglobal->countTagihan($userId);
        $data['countTransaksi'] = $this->mglobal->countTransaksi($userId);
        $data['countWishList']  = $this->mglobal->countWishList($userId);
        $this->themes->display($view,$data);
    }
    
    public function _remap($method,$params=array())
    {       
        //$method = 'process_'.$method;
        if (method_exists($this, $method))
        {
            //echo $method;
           //$this->$method();
           return call_user_func_array(array($this, $method), $params);
        }else{
           $this->index();
        }
       
    }
    
    public function profile_edit(){
        $view = 'profile_edit';
        $userId   = $this->getUserid();
        $userInfo = $this->mglobal->getUserInfo($userId);
       
        $data['userInfo']    = $userInfo;
        $data['listAddress'] = $this->mglobal->listAddress($userId);
        $this->load->library('rajaongkir');
        $provinces = $this->rajaongkir->province();
       
        $result = json_decode($provinces) ;
        if (!$result){
            
            show_error("Oops Maaf terjadi kesalahan di penghitungan ongkir, mungkin server bermasalah.",500,'Error Api Ongkir');
        }
        $propinsi = $result->rajaongkir->results;
        
        $data['provinces'] = $propinsi ;
        
        $regJs = 'javascript/profile_edit';
        $this->themes->registerScript($regJs);
        
        
        
        $this->themes->userdisplay($view,$data);
    }

    public function profile_update(){
        
        $id              = $this->input->post("id", true); 
        $full_name       = $this->input->post("full_name", true);
        $phone_number    = $this->input->post("mobile", true);
        $email           = $this->input->post("email", true);        
        $province_id     = $this->input->post("province_id", true);
        $province        = $this->input->post("province", true);
        $city_id         = $this->input->post("city_id", true);
        $city            = $this->input->post("city", true);
        $postal_code     = $this->input->post("postal_code", true);
        $address         = $this->input->post("address", true);
        
        $data = array(
                    'full_name'     => $full_name,
                    'phone_number'  => $phone_number,
                    'email'         => $email,
                    'provinsi_id'   => $province_id,
                    'provinsi'      => $province,
                    'kota_id'       => $city_id,
                    'kota'          => $city,
                    'postal_code'   => $postal_code,
                    'address'       => $address,
                    );
        
        $this->db->update('tbl_users',$data,array('id' => $id));
        if ($this->db->affected_rows()){
            $add = $this->mglobal->listAddress($id);
            $c = count($add);
            if ( $c < 1 ){
                $newData = array(
                            'user_id'       => $id,
                            'nama_alamat'   => $full_name,
                            'recipient'     => $full_name,
                            'phone_number'  => $phone_number,
                            'address'       => $address,
                            'postal_code'   => $postal_code,
                            'province_id'   => $province_id,
                            'province'      => $province,
                            'city_id'       => $city_id,
                            'city'          => $city,
                            'email'         => $email,
                            'is_default'    => '1'
                            );
                $this->db->insert('tbl_user_address', $newData);
            }
            
        }else{
            
        }
        
        redirect('myaccount/profile_edit');
    }
    
    public function order_detail($orderNo){
        if (!$orderNo){
            
        }
        
        $view = 'order_detail';
        $userId   = $this->getUserid();
        $userInfo = $this->mglobal->getUserInfo($userId);
        $data['userInfo']    = $userInfo;
        
        $listBank               = $this->mglobal->getListBank();
        $getTransaction         = $this->mglobal->getTransaction($orderNo);
        
        if (!$getTransaction){
             show_404();
        }
        $data['listBank']       = $listBank;
        $data['orderSum']       = $getTransaction['ordersum'];
        $data['orderdet1']      = $getTransaction['orderdet1'];
        $data['orderdet2']      = $getTransaction['orderdet2'];
        
        
        $this->themes->userdisplay($view,$data);
    }
    
    public function payment_confirmation(){
        $view = 'konfirmasi_bayar';
        $userId   = $this->getUserid();
        $userInfo = $this->mglobal->getUserInfo($userId);
        $data['userInfo']    = $userInfo;
        
        $this->themes->userdisplay($view,$data);
    }
    
    public function submit_payment_confirmation(){
        $no_order        = $this->input->post("no_order",true); 
        $nama_pengirim   = $this->input->post("nama_pengirim",true); 
        $nominal         = $this->input->post("nominal",true); 
        $bank_pengirim   = $this->input->post("bank_pengirim",true); 
        $created_date    = date('Y-m-d H:i:s');
        
        $data = array(
                    'no_order'      => $no_order,
                    'nama_pengirim' => $nama_pengirim,
                    'nominal'       => $nominal,
                    'bank_pengirim' => $bank_pengirim,
                    'created_date'  => $created_date,      
                );
                
        if (!empty($_FILES["userfile"]["size"])){
		
    		$this->load->library('upload');
    		$img    = $this->uploadImage("bukti_transfer");
                              
    		$data['bukti_bayar']          = str_replace('../','',$img['image_path']);
            $data['bukti_thumbs']   = str_replace('../','', $img['thumb_path']);  
                
		}
        
        
        $this->db->insert('tbl_konfrmasi_pembayaran', $data);
        if ( $this->db->affected_rows()){
            $q = "UPDATE tbl_orders SET status_id='2' WHERE no_order='".$no_order."'";
            $this->db->query($q);
            
            $this->session->set_flashdata('success', 'Confirmation Payment Success');
        }
//
        redirect('myaccount/payment_confirmation');

    }
    
    public function address($param='',$id=''){      
        $view = 'address';
        
        $data['classBody'] = "cart";
        $data['menuactive'] = $view;
        $userId          = $this->getUserid();
        
        if ( $param == 'add' ){
            $this->load->library('rajaongkir');
            $provinces = $this->rajaongkir->province();
            $result = json_decode($provinces) ;
            
            $return_url = $this->input->get_post('return', true);
            if (!$return_url){
                $return_url = '';
            }
            $propinsi = $result->rajaongkir->results;
            
            $regJs = 'javascript/address';
            $this->themes->registerScript($regJs);
            $data['detail'] = "" ;
            $data['provinces']  = $propinsi ;
            $data['return_url'] = $return_url;
            $view = 'address_form';
        }elseif ( $param == 'edit' ){
            $this->load->library('rajaongkir');
            $provinces = $this->rajaongkir->province();
            $result = json_decode($provinces) ;
            
            $propinsi = $result->rajaongkir->results;
            
            $regJs = 'javascript/address';
            $this->themes->registerScript($regJs);
            
            $data['provinces'] = $propinsi ;
            
            $detail = $this->mglobal->getAddresDetail($id);
            $data['detail'] = $detail ;
            $view = 'address_form';
        }elseif ( $param == 'save' ){
            
            
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
            $return_url      = $this->input->get_post('return_url', true);
            
            
            $hasAddress      = $this->mglobal->getDefaultAddress($userId);
            if (!$hasAddress){
                $is_default  = '1';
            }
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
                        
            if ($this->db->insert('tbl_user_address',$alamat)){
                
            }
            $redirect = '/myaccount/address';
            if ($return_url){
                $redirect = $return_url;
            }
            redirect($redirect);
        }else{
            $data['listAddress'] =$this->mglobal->listAddress($userId);
        }
        
        $data['mcategoryHidden'] = true;
        $this->themes->userdisplay($view,$data);
    }
    
    public function changepassword($param=""){
        $view = "changepassword";
        
        $data['classBody'] = "cart";
        $data['menuactive']= $view;
        $userId            =  $this->getUserid();
        
        $data['mcategoryHidden'] = true;
        
        $this->themes->userdisplay($view,$data);
    }
    
    public function paymentlist(){
        $view = "paymentlist";
        
        $data['classBody'] = "cart";
        $data['menuactive'] = $view;
        $userId          = $this->getUserid();
        
        $data['mcategoryHidden'] = true;
        $data['transaksi'] = $this->mglobal->getListPembayaran($userId);
        
        $this->themes->userdisplay($view,$data);
    }
    // wishlist
    public function wishlist(){
        
        $view = "wishlist";
     
        $data['classBody'] = "cart";
        $data['menuactive']= $view;
        $userId            =  $this->getUserid();
        $data['WishList'] = $this->mglobal->getWishList($userId);
        $data['mcategoryHidden'] = true;
        
        $this->themes->userdisplay($view,$data);
    }
    
    public function addToWishlist(){
        $product_id = $this->input->post('productId',TRUE);
        $return_url = $this->input->get_post('return_url',TRUE);
        if (!$return_url){
            $return_url = 'home';
        }
        
        $userId = $this->getUserid();
        
        $data = array(
                'product_id' => $product_id,
                'user_id'    => $userId,
                'add_date'   => date('Y-m-d H:i:s')
                );
      
        $isOk = $this->mglobal->addWishList($data);
        if ($isOk){
            $response['error']      = false;
            $response['error_msg']  = "Produk berhasil di tambahankan ke wish list";
        }else{
            $response['error']      = true;
            $response['error_msg']  = "Produk gagal di tambahankan ke wish list";
        }
        
        redirect('myaccount/wishlist');
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
        if ($isOk){
            $response['error']      = false;
            $response['error_msg']  = "Produk berhasil di tambahankan ke wish list";
        }else{
            $response['error']      = true;
            $response['error_msg']  = "Produk gagal di tambahankan ke wish list";
        }
        $this->output->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    // end wishlist
    
    public function lastseen(){
        
        $view = "lastseen";
        
        $data['classBody'] = "cart";
        $data['menuactive']= $view;
        $userId            =  $this->getUserid();
        $data['lastProduk'] = $this->mglobal->getLastSeenProduk($userId);
        $data['mcategoryHidden'] = true;
        
        $this->themes->userdisplay($view,$data);
    }
    public function daftar_transaksi(){
        
        $view = "daftar_transaksi";
        
        $data['classBody'] = "cart";
        $data['menuactive']= $view;
        $userId            =  $this->getUserid();
        
        $data['mcategoryHidden'] = true;
        
        $this->themes->userdisplay($view,$data);
    }
     
    
    public function logout(){
        $this->useraccess->Logout();
        redirect('home');
    }
    
    public function uploadImage($directory, $fileinput="userfile", $thumbs = true,$width=120,$height=0, $unlink = false ){        
        
        $setting = array(
				"upload_path"	=> "assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR.$directory,
                "allowed_types" => "gif|jpg|png|jpeg|swf|webp",
                "encrypt_name"  => true,
                "max_size"	    => '2048',
                "remove_spaces" => true
			);
        
        $this->upload->initialize($setting);
	
        if($this->upload->do_upload($fileinput)){
		      $dataFile = $this->upload->data();
              $data     =  array('upload_data' => $this->upload->data());
              $dir      = "assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR.$directory;
              $path     = $dir.DIRECTORY_SEPARATOR.$data['upload_data']['file_name'];
              $dataImg  = array(
                                'error'=>false,   
                                );
              $file   = $setting['upload_path'].DIRECTORY_SEPARATOR.$data['upload_data']['file_name'];   
                               
              if ($thumbs){
                  $resize = $this->load->helper('image_lib');         
                    
                  $resize = new Image_lib($file);              
                                    
                  $thumb_namanya = "thumb_".$data['upload_data']['file_name'];
                  $newpath1        = $dir.DIRECTORY_SEPARATOR."thumbs".DIRECTORY_SEPARATOR.$thumb_namanya;
                  $resize = new Image_lib($file);
                  
                  if ($width > $height){
                     $mode = 'maxwidth';
                  }elseif ($width < $height){
                     $mode = 'maxheight';
                  }elseif( $width==$height){
                    $mode = 'exact';
                  }
                  
                  $resize->resizeTo($width,$height,$mode );
                  
                  $resize->saveImage($newpath1);
                  
                  $dataImg['thumb_path'] = str_replace("..".DIRECTORY_SEPARATOR,"", $newpath1);
              }  
              
              if ( $unlink ){
                  unlink($file);
              }else{
                  $dataImg['image_path'] = str_replace("..".DIRECTORY_SEPARATOR,"", $path);
              } 
                
              // unlink($file);
                
		}else{
		      $dataImg = array(
                            'error'=>true,
                            'errdata'=>$this->upload->display_errors()
                            );
		}
        return $dataImg;
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
        //var_dump($cost);
        $cost = json_decode($cost);       
        
        //exit();
        
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

    public function update_profile()
    {
        $full_name      = $this->input->post('full_name');
        $phone_number   = $this->input->post('phone_number');
        $email          = $this->input->post('email');
        $address        = $this->input->post('address');

                // var_dump($id_unique);
                // exit();

        $data_update    = array(
            'full_name'     => $full_name,
            'phone_number'  => $phone_number,
            'email'         => $email,
            'address'       => $address
        );

        $where          = array('phone_number' => $phone_number);
        $res            = $this->db->update('tbl_users',$data_update,$where);

        redirect('myaccount');

    }


}
