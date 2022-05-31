<?php

class Themes {

	protected $_ci;

	protected $_regCssHead;

    protected $_regCssHead2;

    

    protected $_regjsClosing;

    protected $_regjsClosing2;

    protected $_regAddJs;

    

    

	function __construct(){

		$this->_ci = & get_instance();

		$this->_ci->load->library(array('session'));

        $this->_ci->load->model(array('mtemplate','mcart'));

	}	

	

	function display($template='',$data='',$dir='',$addJs=''){

	    

        $templateDir = "kurban";

        

		if (empty($dir)){

		      $dir			= $this->_ci->uri->segment(1);  

		}

        if (empty($data)){

            $data = array();

        }

        $data['urlBase']	= $this->_ci->uri->segment(1);

		$data['url']		= $this->_ci->uri->segment(2);

        $data['jsclosing']  = "";

        $data['jsclosing2'] = "";

        $data['csshead']    = "";

        $data['csshead2']   = "";

        $data['addjs']      = "";

        

        $data['categories'] = $this->_ci->mtemplate->getKategory();

        $data['webinfo']    = $this->_ci->mtemplate->getWebsiteInfo();

        $data['cart']       = $this->_ci->mcart; 

        $data['headerMenu'] = $this->_ci->mtemplate->getMenu(1);

        $data['catalogMode']= 0;

                    

        if (!empty($this->_regjsClosing))

        {

            $data['jsclosing'] = $this->_regjsClosing;

        }

        if (!empty($this->_regjsClosing2))

        {

            $data['jsclosing2'] = $this->_regjsClosing2;

        }

        if (!empty($this->_regCssHead))

        {

            $data['csshead'] = $this->_regCssHead;

        }

        if (!empty($this->_regCssHead2))

        {

            //var_dump($this->_regCssHead2);

            //exit();

            $data['csshead2'] = $this->_regCssHead2;

        }

        

        

        if (!empty($this->_regAddJs))

        {

            $data['addjs'] = $this->_ci->load->view($this->_regAddJs,$data,TRUE);

        }

        

	    

		$data['header']			= $this->_ci->load->view('templates/'.$templateDir.'/header',$data,TRUE);

        $data['navigation']		= $this->_ci->load->view('templates/'.$templateDir.'/navigation',$data,TRUE);

		$data['footer']	 	    = $this->_ci->load->view('templates/'.$templateDir.'/footer',$data,TRUE);

        $data['maincontent']	= $this->_ci->load->view('pages/'.$template,$data,TRUE);

       

		

		$this->_ci->load->view('templates/'.$templateDir.'/main',$data);

	}	

    

    function userdisplay($template='',$data='',$dir=''){

	    

        $templateDir = "themesv2";

        

		if (empty($dir)){

		      $dir			= $this->_ci->uri->segment(1);  

		}

        $data['urlBase']	= $this->_ci->uri->segment(1);

		$data['url']		= $this->_ci->uri->segment(2);

        $data['jsclosing']  = "";

        $data['jsclosing2'] = "";

        $data['csshead']    = "";

        $data['csshead2']   = "";

        $data['addjs']      = "";

        

        

        $data['categories'] = $this->_ci->mtemplate->getKategory();

        $data['webinfo']    = $this->_ci->mtemplate->getWebsiteInfo();

        $data['cart']       = $this->_ci->mcart; 

        $data['headerMenu'] = $this->_ci->mtemplate->getMenu(1);

        $data['catalogMode']= 0;

        

        if (!empty($this->_regjsClosing))

        {

            $data['jsclosing'] = $this->_regjsClosing;

        }

        if (!empty($this->_regjsClosing2))

        {

            $data['jsclosing2'] = $this->_regjsClosing2;

        }

        if (!empty($this->_regCssHead))

        {

            $data['csshead'] = $this->_regCssHead;

        }

        if (!empty($this->_regCssHead2))

        {

            //var_dump($this->_regCssHead2);

            //exit();

            $data['csshead2'] = $this->_regCssHead2;

        }

        

        

        if (!empty($this->_regAddJs))

        {

            $data['addjs'] = $this->_ci->load->view($this->_regAddJs,$data,TRUE);

        }

        

	    
		$data['header']			= $this->_ci->load->view('templates/'.$templateDir.'/header',$data,TRUE);

        $data['navigation']		= $this->_ci->load->view('templates/'.$templateDir.'/navigation',$data,TRUE);

		$data['footer']	 	    = $this->_ci->load->view('templates/'.$templateDir.'/footer',$data,TRUE);

        $data['maincontent']	= $this->_ci->load->view('pages/'.$template,$data,TRUE);

        

        // $data['footer']			= $this->_ci->load->view('theme/'.$templateDir.'/footer',$data,TRUE);

		

		

		

		$this->_ci->load->view('templates/'.$templateDir.'/usermain',$data);

	}

	

    function displayFooter($template='',$data='',$dir=''){

	    

        $templateDir = "themesv1";

        

		if (empty($dir)){

		      $dir			= $this->_ci->uri->segment(1);  

		}

        $data['urlBase']	= $this->_ci->uri->segment(1);

		$data['url']		= $this->_ci->uri->segment(2);

        $data['jsclosing']  = "";

        $data['jsclosing2'] = "";

        $data['csshead']    = "";

        $data['csshead2']   = "";

        $data['addjs']      = "";

        

        $data['categories'] = $this->_ci->mtemplate->getKategory();

        $data['cart']       = $this->_ci->mcart;

        

        if (!empty($this->_regjsClosing))

        {

            $data['jsclosing'] = $this->_regjsClosing;

        }

        if (!empty($this->_regjsClosing2))

        {

            $data['jsclosing2'] = $this->_regjsClosing2;

        }

        if (!empty($this->_regCssHead))

        {

            $data['csshead'] = $this->_regCssHead;

        }

        if (!empty($this->_regCssHead2))

        {

            //var_dump($this->_regCssHead2);

            //exit();

            $data['csshead2'] = $this->_regCssHead2;

        }

        

        

        if (!empty($this->_regAddJs))

        {

            $data['addjs'] = $this->_ci->load->view($this->_regAddJs,$data,TRUE);

        }

        

	    

		//$data['header']			= $this->_ci->load->view('templates/'.$templateDir.'/header',$data,TRUE);

        //$data['navigation']		= $this->_ci->load->view('templates/'.$templateDir.'/navigation',$data,TRUE);

		$data['footer']	 	    = $this->_ci->load->view('templates/'.$templateDir.'/footer',$data,TRUE);

        $data['maincontent']	= $this->_ci->load->view('pages/'.$template,$data,TRUE);

        // $data['footer']			= $this->_ci->load->view('theme/'.$templateDir.'/footer',$data,TRUE);

		

		

		

		$this->_ci->load->view('templates/'.$templateDir.'/main3',$data);

	}

    

    function registerCsshead($CSS,$p=1)

    {

        $css = "";

        if (is_array($CSS))

        {

            

            foreach($CSS as $csscript =>$key)

            {

               

                $styleLink = '<link href="'.$key.'" rel="stylesheet" type="text/css"/>';

                

                $css.= "\n".$styleLink;

            }

        }

        //var_dump($css);

        if ($p==1){

            $this->_regCssHead = $css;

        }else{

            $this->_regCssHead2 = $css;

        }

        

    }

    

    function regsiterJsClosing($jScript,$t=1)

    {

        $js = "";

        if (is_array($jScript))

        {

            

            foreach($jScript as $jscript =>$key)

            {

               

                $j = '<script src="'.$key.'"></script>';

                

                $js.= "\n".$j;

            }

        }

        $js.= "\n";

        

        if ($t==1){

            $this->_regjsClosing = $js;

        }elseif ($t==2){

            $this->_regjsClosing2 = $js;

        }

        

    }

    

    function registerScript($view)

    {

        $this->_regAddJs = $view;

    }

}
