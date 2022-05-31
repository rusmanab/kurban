<?php
class Setting extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mpost','post');
        $this->load->model('msetting','setting');
    }
    
    public function index(){
        $this->load->helper('typography');
        
        $data['title']     = $this->lang->line('setting');
        $data['subTitle']  = $this->lang->line('configure_web');
        $data['formtitle'] = "";
        $data['icon']      = "list";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                            $data['title'],
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
       
        $regCss = array(                       
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/bootbox/bootbox.min.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'), 
                        base_url('assets/themes/default/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js '),
                                            
                        );
                        
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $where['where'] = array('id'=>'1');
        $this->setting->setParam($where);
        $settingWeb = $this->setting->getData();
        $data['web'] = $settingWeb;
        
        $addjs = "pages/setting/js";
        $this->theme_admin->registerScript($addjs);
       
        $view = 'setting/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
        $setting = array(
                    'address'       =>$this->db->escape_str(trim($this->input->post("address",true))),
                    'email'         =>$this->db->escape_str(trim($this->input->post("email",true))),  
                    'email_r'       =>$this->db->escape_str(trim($this->input->post("email_r",true))),
                    'ym'            =>$this->db->escape_str(trim($this->input->post("ym",true))), 
                    'phone'         =>$this->db->escape_str(trim($this->input->post("phone",true))),
                    'fax'           =>$this->db->escape_str(trim($this->input->post("fax",true)))
                    );
        $sosmed = array(
                    'instagram'   => $this->db->escape_str(trim($this->input->post("instagram",true))),
                    'facebook'    => $this->db->escape_str(trim($this->input->post("facebook",true))),
                    'twitter'     => $this->db->escape_str(trim($this->input->post("twitter",true))),
                    'google-plus' => $this->db->escape_str(trim($this->input->post("googleplus",true))),
                    'youtube'     => $this->db->escape_str(trim($this->input->post("youtube",true))),
                    'skype'       => $this->db->escape_str(trim($this->input->post("skype",true))),
                    
                    );
        $wiget = array(
                    'fbcode'      => $this->db->escape_str(trim($this->input->post("fbcode",true))),
                    'twcode'      => $this->db->escape_str(trim($this->input->post("twcode",true)))
                    );
            
        $data = array(
                    'title'       => $this->db->escape_str(trim($this->input->post("wname",true))),
                    'deskripsi'   => $this->db->escape_str(trim($this->input->post("deskripsi",true))),
                    'value'       => serialize($setting),
                    'sosmed'      => serialize($sosmed),
                    //'wiget'        => serialize($wiget),
                    'created_date'=> date('Y-m-d H:i:s'),
                    'uid'         => $this->userid
                    );
            
       	$this->setting->setData($data);
        $param['where'] = array('id' => '1');
        $this->setting->setParam($param);
        
        $issave = $this->setting->save();
           
        if ($issave){
            $message = array('msg_type'=>"success","msg_content"=>"Saving setting success.");
            //$this->session->set_flashdata($message);   
        }else{
            $message = array('msg_type'=>"error","msg_content"=> "Saving setting failed.");
            //$this->session->set_flashdata($message);                        
        }
        echo json_encode($message);
    }
}