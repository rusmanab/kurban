<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct(){
        parent::__construct();
    }
	public function index()
	{
	   
		$this->load->view('welcome_message');
	}
	
	public function registermail(){
		$register = array(
			'full_name'     => "Rusmana",
			'phone_number'  => "087851979669",
			'email'         => "rusmanab@gmail.com",
			'username'      => "rusmanab@gmail.com",
			'password'      => MD5('123123'),
		);
		$register['subject']    = "Verifikasi Alamat Email Kamu di Kurbandipelosok.com"; 
		$register['genecode']   = "sdfsdf";
		
		$view                   = "email_register";
		$this->load->view('mail/'.$view,$register);  
	}

	public function testKirim(){
		$this->load->library('kirimemail');
		$register = array(
			'full_name'     => "Rusmana",
			'phone_number'  => "087851979669",
			'email'         => "rusmanab@gmail.com",
			'username'      => "rusmanab@gmail.com",
			'password'      => MD5('123123'),
		);
		$register['subject']    = "Aktivasi Akun Kurbandipelosok.com"; 
		$register['genecode']   = "sdfsdf";
		
		$view                   = "email_register";
		//$this->load->view('mail/email_register_2',$register);    
		$this->kirimemail->kirim2($view,$register);
	}
	
    public function mailPesanan($noorder){
        $this->load->model('mglobal');
        
        $data['info'] = $this->mglobal->detailOrder($noorder);
        
        $this->load->view('mail/checkout',$data);        
	}
	
	public function kirimEmailAll(){
		$q = "SELECT * FROM tbl_users WHERE status = '2' ORDER BY id DESC LIMIT 10";
        $res = $this->db->query($q);
		$hasEmail = $res->result();
		
		foreach($hasEmail as $h){

			$q = "UPDATE tbl_users set jobdesc_status=1 WHERE id=".$h->id;
			$this->db->query($q);
			 
		}

        
	}
}
