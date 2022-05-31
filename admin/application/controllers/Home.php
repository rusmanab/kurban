<?php
class Home extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    
    
    
    public function index(){
        //$this->output->enable_profiler(true);
        
        $this->load->model(array('mglobal','mjobdesc'));
        
        
        $data['title']     = $this->lang->line('dashboard');
        $data['subTitle']  = $this->lang->line('general_summary');
        
        $breadcrumb = array( 
                        array($this->lang->line('home') => '' ),
                            $data['title'],
                         );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $data['mostviewed']   = $this->mglobal->getMostViewed();
        $data['neworder']   = $this->mglobal->getNewOrder();
        
        $regJs = "";
        $addjs = "";
        
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/highcharts/js/highcharts.js'),
                        base_url('assets/themes/default/global/plugins/highcharts/js/highcharts-3d.js'),
                        base_url('assets/themes/default/global/plugins/highcharts/js/highcharts-more.js'),                      
                        );
        $addjs = "pages/home/js";
        
        if ( $this->level == 3 ){
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/highcharts/js/highcharts.js'),
                        base_url('assets/themes/default/global/plugins/highcharts/js/highcharts-3d.js'),
                        base_url('assets/themes/default/global/plugins/highcharts/js/highcharts-more.js'),                      
                        );
        $addjs = "pages/home/js";
        }elseif ( $this->level == 2  ){ // desainer
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/amcharts/amcharts/amcharts.js'),
                        base_url('assets/themes/default/global/plugins/amcharts/amcharts/serial.js'),
                        
                        base_url('assets/themes/default/global/plugins/amcharts/amcharts/pie.js'),  
                          
                        );
        $this->load->model('mcommentsorder');
        //$data['comments'] = $this->mcommentsorder->latestComment($this->userid);
        //$data['neworder'] = $this->mjobdesc->getOrderPerUser($this->userid);
        
        $addjs = "pages/home/js2";
       }
        
        $this->theme_admin->regsiterJsClosing($regJs);
        $this->theme_admin->registerScript($addjs);
       
        $view = 'home/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function statistik(){
        
        $jum = array('1200k','600k','1000k','100k','300k');
        $tgl = array('9 Maret','8 Maret', '7 Maret','6 Maret', '5 Maret');
        
        $data = array('jum'=>$jum,'tgl'=>$tgl);
        echo json_encode($data);
    }
    
    public function loadStatistik(){
        //$this->output->enable_profiler(true);
        
        $this->load->model(array('mglobal'));
        
        $userId = $this->input->post('userid', true);
        
        $res = $this->mglobal->loadStatistik($userId);
        
        echo json_encode($res);
        
    }
    
    public function getStream(){
        header("Content-Type: text/event-stream");        
        header("Cache-Control: no-cache");        
        header("Connection: keep-alive");
        
        
        $lastId = $_SERVER["HTTP_LAST_EVENT_ID"];
        // Get the current time on server
        
        $currentTime = date("h:i:s", time());
        
         
        
        // Send it in a message
        
        echo "data: " .$lastId."  // " . $currentTime . "\n\n";
        
        ob_flush();
        flush();
    }
    
}