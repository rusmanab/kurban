<?php

class Kirimemail {

	protected $_ci;

    

    

	function __construct(){

		$this->_ci = & get_instance();

		$this->_ci->load->library('email');

	}	

	

	function kirim($view='',$data='',$absolutePath=false){

	    

        $from = "no-reply@excellent-scale.com";

        

		$config['mailtype']     = 'html';

        $config['wordwrap']     = TRUE;

        $config['newline']      = "\r\n";

        /*$config['smtp_host']    = 'ssl://smtp.excellent-scale.com';  */

        $config['smtp_host']    = 'ssl://mail.excellent-scale.com';

        $config['smtp_port']    = '465';

        $config['smtp_timeout'] = '30';

        $config['smtp_user']    = 'no-reply@excellent-scale.com';

        $config['smtp_pass']    = 'Tdg=IIu?Az~0';

        //$config['charset']      = 'utf-8';

        $config['protocol']     = 'smtp';

       

        //$config['validation'] = FALSE;

        

        

        

        /*$config['protocol'] = 'sendmail';

        $config['mailpath'] = '/usr/sbin/sendmail';

        $config['charset'] = 'iso-8859-1';*/

        $config['wordwrap'] = TRUE;

        

        $subject                = "[Excellentscale] " .$data['subject'];

        $email                  = $data['email'];

        

      

        $this->_ci->email->initialize($config);

        $this->_ci->email->from($from, "Excellent Scale");

        $this->_ci->email->to($email); 

        $this->_ci->email->subject($subject);



        if (!$absolutePath){

            $mail = "mail/" . $view;

        }else{

            $mail =  $view;

        }
		
        $message = $this->_ci->load->view($mail, $data, true);

       



        $this->_ci->email->message($message);

        if(!$this->_ci->email->send(false)) //FALSE

        {
            $response['error']      = true;
        }else{
            $response['error']      = false;
        }

        //echo $this->_ci->email->print_debugger(array('headers'));

        //exit;

        return $response;

        

	}	

    

    function kirim2($view='',$data='',$absolutePath=false){

	    

        $from = "no-reply@excellent-scale.com";

        

		$config['mailtype']     = 'html';

        $config['wordwrap']     = TRUE;

        $config['newline']      = "\r\n";

        /*$config['smtp_host']    = 'ssl://smtp.excellent-scale.com';  */

        $config['smtp_host']    = 'ssl://mail.excellent-scale.com';

        $config['smtp_port']    = '465';

        $config['smtp_timeout'] = '30';

        $config['smtp_user']    = 'no-reply@excellent-scale.com';

        $config['smtp_pass']    = 'Tdg=IIu?Az~0';

        //$config['charset']      = 'utf-8';

        $config['protocol']     = 'smtp';

       

        //$config['validation'] = FALSE;

        

        

        

        /*$config['protocol'] = 'sendmail';

        $config['mailpath'] = '/usr/sbin/sendmail';

        $config['charset'] = 'iso-8859-1';*/

        $config['wordwrap'] = TRUE;

        

        $subject                = "[Excellentscale] " .$data['subject'];

        $email                  = $data['email'];

        

      

        $this->_ci->email->initialize($config);

        $this->_ci->email->from($from, "excellent-scale.com");

        $this->_ci->email->to($email); 

        $this->_ci->email->subject($subject);



        if (!$absolutePath){

            $mail = "mail/" . $view;

        }else{

            $mail =  $view;

        }

        $message = $this->_ci->load->view($mail, $data, true);

       



        $this->_ci->email->message($message);

        if(!$this->_ci->email->send(false)) //FALSE

        {

            

            $response['error']      = true;

        }

        else{

            $response['error']      = false;

        }

        echo $this->_ci->email->print_debugger(array('headers'));

        exit;

        return $response;

        

	}	

    

}
