<?php
class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('mglobal'));
    }
    
    public function index(){
        
        $slug = $this->uri->segment(1);
        if (!empty($slug) && strtolower($slug) !='home'){
           
            $this->getPost($slug);
        }else{
            //$this->output->enable_profiler(true);
            $this->load->model(array('mglobal'));
        
            $view = 'home';
            $data['metadata']           = $this->mglobal->getDeskripsiHome();
            
            $data['latestProduk']       = $this->mglobal->getLatestProduk();
            $data['mostviewedProduk']   = $this->mglobal->getSpecialProduct();
            $data['bestSellest']        = $this->mglobal->getBestProduct();
            $data['feautereProduct']    = $this->mglobal->getFeaturedProduct();
            $data['slider']             = $this->mglobal->getSlider();            
            $data['banner']             = $this->mglobal->getMainBanner();
            $data['listBrand']          = $this->mglobal->getBrand();
            $data['subBanner']          = $this->mglobal;
            
            $this->themes->display($view,$data);
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
    public function news(){
        $view                   = 'news_articles';
        
        $res = $this->mglobal->listPostNews();
        if (!$res){
            show_404();
        }
        $bestPost           = $this->mglobal->getBestPost();
        
        $data['data']      = $res;
        $data['bestPost']      = $bestPost;
        $this->themes->display($view,$data);
    }
    
    
    public function guarantee_submit(){
      
        $name            = $this->input->post("name", true);
        $email           = $this->input->post("email", true);
        $address1        = $this->input->post("address1", true);
        $address2        = $this->input->post("address2", true);
        $provinsi        = $this->input->post("provinsi", true);
        $kode_pos        = $this->input->post("kode_pos", true);
        $notelp          = $this->input->post("notelp", true);
        $tipe_unit       = $this->input->post("tipe_unit", true);
        $date_buying     = $this->input->post("date_buying", true);
        $serial_number   = $this->input->post("serial_number", true);
        $model           = $this->input->post("model", true);
        $outlet          = $this->input->post("outlet", true);
        $created_date    = date('Y-m-d H:i:s');

        $data           = array(
                            'name'          => $name,
                            'email'         => $email,
                            'address1'      => $address1,
                            'address2'      => $address2,   
                            'provinsi'      => $provinsi,
                            'kode_pos'      => $kode_pos,
                            'notelp'        => $notelp,
                            'tipe_unit'     => $tipe_unit,
                            'date_buying'   => $date_buying,
                            'serial_number' => $serial_number,
                            'model'         => $model,
                            'outlet'        => $outlet,
                            'created_date'  => $created_date,
                        );
        $this->db->insert('tbl_guarantee', $data);
        
        if ( $this->db->affected_rows() ){
            $this->session->set_flashdata('success', 'Your Guarantee submit Success');
        }else{
            $this->session->set_flashdata('error', 'Your Guarantee submit Failed');
        }
        redirect('guarantee');
    }
    
    // public function guarantee(){
    //     $this->load->model('mtemplate');
    //     $data['headerMenu'] = $this->mtemplate->getMenu(1);
       
    //     $this->load->view("pages/guarantee",$data);
    // }
    
    public function guarantee(){
        $view = 'guarantee';
        $data = "";
        $this->themes->display($view,$data);
    }
    
    public function getPost($slug){
        $res = $this->mglobal->getPost($slug);
        if (!$res){
            show_404();
        }
        $view                   = 'pages';
        if ($res->post_type == "post"){
            $bestPost           = $this->mglobal->getBestPost();
            $data['bestPost']  = $bestPost;
            $view               = 'news_articles_detail';
        }
        $data['data']      = $res;
       
        $this->themes->display($view,$data);
    }
    
    public function email_verification(){
        $code = $this->input->get_post("code", true);
        $res = $this->mglobal->activitedAccount($code);
        
        $view                   = 'message';
		$data['mcategoryHidden'] = true;
		if ( !$res['error'] ){
			$user = $res['data'];
			$this->load->library('kirimemail');
            
			$register = array(
				'subject'		=> "Selamat Datang di Excellent Scale",
				'full_name'     => $user->full_name,
				'email'         => $user->email,
				);
			$viewEmail           = "email_welcome";
			$this->kirimemail->kirim($viewEmail,$register);
		}
        $data['data']      = $res;
        $this->themes->display($view,$data);
    }
    
    public function register_status(){        
        $flasMsg = $this->session->flashdata('error_msg');
        if (!$flasMsg){
            redirect('home');
        }
        $view                   = 'flash_message';
        $data['mcategoryHidden'] = true;
        $this->themes->display($view,$data);
    }

    public function login($var=""){
        $view = 'login';
        $isLogin = $this->session->userdata('f_userid'); //$this->cekOauth();  
                    
        if ($isLogin){
            redirect('home');
        }
        //$data['latestProduk'] = $this->mglobal->getLatestProduk();
        //$data["test"] = "ok";
        //$this->load->view($view,$data);

        $this->themes->display($view);
    }
    
    
    public function login_submit(){
        //$this->output->enable_profiler(true);
        $this->load->library('cart');
        
        $username = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        
        $haslogin = $this->useraccess->Login($username, $password);
       
        if ( $haslogin ){
            if ( $this->cart->total() > 0 ){
                
                
              
            }
            $this->load->model('mcart');
                
            $userId = $this->session->userdata('f_userid');
            redirect('home');
        }else{
            $info = array(
                'error' => 'danger',
                'info' => "Gagal melakukan proses autentikasi. Mohon untuk mengisi email & password dengan benar."
            );     
            $this->session->set_flashdata($info);
            redirect('login');       
        }
        
        //redirect('home');
    }
    
    public function logout(){
        $this->useraccess->Logout();
        redirect('home');
    }
    
    public function register($var=""){
        $view = 'register';
        //$data['latestProduk'] = $this->mglobal->getLatestProduk();
        $data = "";
        $this->themes->display($view,$data);
        
    }
    
    public function register2($var=""){
        $view = 'register';
        //$data['latestProduk'] = $this->mglobal->getLatestProduk();
        $data = "";
        $data['classBody']      = 'cart'; 
        $data['mcategoryHidden'] = true;
        $this->themes->display($view,$data);
        
	}
	
    public function register_submit(){
        $this->load->model(array('mglobal'));
		$this->load->library('form_validation');
		
        $full_name   = $this->input->post('full_name',TRUE);
        $email       = $this->input->post('email',TRUE);
        $ponsel      = $this->input->post('ponsel',TRUE);
        $password    = $this->input->post('password',TRUE);
		
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('ponsel', 'Phone', 'callback_phone_check');
		$this->form_validation->set_rules('password', 'Full Name', 'required');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

        if ($this->form_validation->run() == FALSE)
        {           
            $this->register();
           
        }else{
		
		/*$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
        $userIp=$this->input->ip_address();*/
			$secret='6LcXXD4aAAAAAOVsSBMUnEomyv6BCrfPB_jrQwV3'; // ini adalah Secret key yang didapat dari google, silahkan disesuaikan
			$credential = array(
				'secret' => $secret,
				'response' => $this->input->post('g-recaptcha-response')
			);
			$verify = curl_init();
			curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($verify, CURLOPT_POST, true);
			curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
			curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($verify);

			$status= json_decode($response, true);
			
			if($status['success']){ 
				$q = "SELECT activated_key,status,email FROm tbl_users WHERE email='".$email."'";
				$res = $this->db->query($q);
				$hasEmail = $res->row();
				$register = array(
					'full_name'     => $full_name,
					'phone_number'  => $ponsel,
					'email'         => $email,
					'username'      => $email,
					'password'      => MD5($password),
					'date_created'  => date('Y-m-d H:i:s')
					);

				if ($hasEmail){
					if ( $hasEmail->status == '2' ){
						$this->session->set_flashdata('error', 'Email sudah terdaftar. Silakan cek email anda, untuk melakukan aktifvasi.');
						$geneCode = $hasEmail->activated_key;
						$this->load->library('kirimemail');
					
						$register['subject']    = "Aktivasi Akun Excellent Scale"; 
						$register['genecode']   = $geneCode;
						
						$view                   = "email_register";
						$this->kirimemail->kirim($view,$register);
					}else{
						$this->session->set_flashdata('error', 'Email Anda Telah Terdaftar.');
					}
					
					redirect('register');
				}
				
				$res = $this->mglobal->register($register);
				$error = $res['error'];
				$genecode = $res['genecode'];  
				$ucode = md5(md5($genecode));     
				
				if (!$error){
					$this->load->library('kirimemail');
					
					$register['subject']    = "Aktivasi Akun Excellent Scale"; 
					$register['genecode']   = $genecode;
					
					$view                   = "email_register";
					$this->kirimemail->kirim($view,$register);
					//exit;
					unset($register['genecode'] );
					//$data['error']          = false;
					$this->session->set_flashdata('code', $ucode); 
					$this->session->set_flashdata('error', 'success'); 
					$this->session->set_flashdata('error_msg', 'Pendaftaran akun berhasil, Silahkan cek email di kotak masuk atau spam anda, untuk melakukan aktivasi. Terima Kasih');
					$this->session->set_flashdata('success', 'Register Success.');
				}else{
					//$data['error']          = true;
					$this->session->set_flashdata('code', $ucode); 
					$this->session->set_flashdata('error', 'danger'); 
					$this->session->set_flashdata('error_msg', 'Pendaftaran akun gagal');
					$this->session->set_flashdata('success', 'Register Failed.');
				}
									
				redirect('register_status');
			}else{
				$this->session->set_flashdata('error', 'Sorry Google Recaptcha Unsuccessful!!');
			}
			redirect('register');
		}
    }
	
	public function phone_check($str)
    {
       
        $jumPhone = strlen($str);
        if ( $jumPhone < 5 ){
            $this->form_validation->set_message('phone_check', 'Minimum 5 digits telephone number');
            return FALSE;
        }
        if ( $jumPhone > 13 ){
            $this->form_validation->set_message('phone_check', 'Maximum 5 digits telephone number');
            return FALSE;
        }
        $isValid = $this->cekFormatPhone($str);
        if (!$isValid){          
            $this->form_validation->set_message('phone_check', 'Telephone number must start with 0');
            return FALSE;
        }

        return TRUE;
	}
	public function cekFormatPhone($phone){        
		$pattern = "/0\d/";
		$pattern = '/0[0-9]{5,13}$/';
		if (preg_match($pattern, $phone)){
			return true;
		}else{
			return false;
		}
	}
    public function message(){
        $session = $this->input->post_get('session', true);
        
        $view = 'register_info';
        $data['latestProduk'] = "";//$this->mglobal->getLatestProduk();
        $data['mcategoryHidden'] = true;
        $data['classBody'] = "cart";
        
        $code       = $this->session->flashdata('code');
        $error      = $this->session->flashdata('error');
        $error_msg  = $this->session->flashdata('error_msg');
        
        if ( $code != $session){
            //redirect('/home');
        }
        
        $data['error']      = $error;
        $data['error_msg']  = $error_msg;
        
        $this->themes->display($view,$data);
    }
    
    public function contact($var=""){
        $view = 'contact';
        //$data['latestProduk'] = $this->mglobal->getLatestProduk();
        $data = "";
        //$this->load->view($view,$data);
        $this->themes->display($view,$data);
    }
    
    public function garansi(){
        $view = 'garansi';
        $data['latestProduk'] = "";//$this->mglobal->getLatestProduk();
        $data['mcategoryHidden'] = true;
        $data['classBody'] = "cart";
        $this->themes->displayFooter($view,$data);
    }
    
    public function videox(){
        $view              = 'videos';
      
        $res = $this->mglobal->getListVideo();
        if (!$res){
            show_404();
        }
        $data['data']      = $res;
        
        $this->themes->display($view,$data);
    }
    public function account_reset(){
        $code = $this->input->get_post("code", true);
        
        $view                   = 'reset_pass';
        $data['mcategoryHidden'] = true;
        $data['data']      = $code;
        $this->themes->display($view,$data);
    }
    public function forgot_password(){
        $this->load->library('session');
        $code = $this->input->get_post("code", true);
        
        $view                   = 'reset_pass';
        $data['mcategoryHidden'] = true;
        $data['data']      = $code;
        $this->themes->display($view,$data);
    }

    public function reset_password_sub(){
        $this->load->library('session');
        $email = $this->input->get_post("email", true);    
        $this->load->helper('string');
		$cekEmail = $this->mglobal->checkEmail($email);
		
        if (!$cekEmail){
            $info = array(
                'error' => 'danger',
                'info' => "Reset password gagal, email belum terdaftar."
            );
            redirect('home');
        }else{
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
                $info = array(
                    'error' => 'success',
                    'info' => "Kata sandi sudah di koreksi, Silakan cek email anda."
                );
            }else{
                $errSts = 304 ;
                $response['error']      = true;
                $response['error_msg']  = "Pendaftaran akun gagal";
			}
		
		}
		
        $this->session->set_flashdata($info);
        redirect('forgot_password');

    }
    public function kirimEmail($view,$data){
		$this->load->library('kirimemail');
		$response = $this->kirimemail->kirim($view,$data);
	
        //echo $this->email->print_debugger(array('headers'));
        return $response;
    }
}
