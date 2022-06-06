<?php 
class Payment extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mglobal');
    }
    public function index(){
        \Midtrans\Config::$serverKey = 'SB-Mid-server-zsFu-QLYAN7mWpAsUOapWgmF';
              
        //$notif = new \Midtrans\Notification();
        $notif = json_decode(file_get_contents('php://input'), true);
        $date = date('Y-m-d H:i:s');

        $data = [
            'order_id'    => $notif->order_id,
            'value'       => json_encode($notif),
            'created_date'=> $date 
        ];
        
        $this->db->insert('webhook_midtrans',$data);
        if ( $notif ){
            $transaction = $notif->transaction_status;
            $fraud = $notif->fraud_status;
    
            /*$data = [
                'value'       => json_encode($notif),
                'created_date'=> $date 
            ];
            
            $this->db->insert('webhook_midtrans',$data);*/
            //error_log("Order ID $notif->order_id: "."transaction status = $transaction, fraud staus = $fraud");
            
            if ($transaction == 'capture') {
                if ($fraud == 'challenge') {
                  // TODO Set payment status in merchant's database to 'challenge'
                  $status = 2;
                }
                else if ($fraud == 'accept') {
                  // TODO Set payment status in merchant's database to 'success'
                  $status = 3;
                }
            }
            else if ($transaction == 'cancel') {
                if ($fraud == 'challenge') {
                  // TODO Set payment status in merchant's database to 'failure'
                  $status = 12;
                }
                else if ($fraud == 'accept') {
                  // TODO Set payment status in merchant's database to 'failure'
                  $status = 12;
                }
            }
            else if ($transaction == 'deny') {
                  // TODO Set payment status in merchant's database to 'failure'
                  $status = 12;
            }
    
            $detailOrder = $this->mglobal->detailOrder($notif->order_id);
            $noorder     = $detailOrder->no_order;
    
            $dataUpdate = array(
                'status_id'   => $status
                );
            $this->db->where('id', $notif->order_id);
            
    
            if ( $this->db->update('tbl_orders', $dataUpdate)){
              
                if ( $status = 3 ){
                    $comment = "Pembayaran sudah diterima";
                }elseif($status = 2 ){
                    $comment ="Pembayaran menuggu diverifikasi";
                }else{
                    $comment = "Pembayaran Gagal";
                }
                $tbl_order_history = [
                    'no_order'      => $noorder,
                    'order_id'      => $notif->order_id,
                    'comment'       => $comment,
                    'status_id'     => $status,
                    'customer_notif'=> $comment,
                    'created_date'  => $date,
                ];
    
                $this->db->insert('tbl_order_history', $tbl_order_history);
            }

        }
    }

    public function success()
    {
        $order_id = $this->input->get_post('order_id', true);
        $status_code = $this->input->get_post('status_code', true);
        $transaction = $this->input->get_post('transaction_status', true);
        $statusPay = false;
        if ( $transaction == 'capture' || $transaction == 'settlement' ){
            $statusPay = true;
        }
        $detailOrder = $this->mglobal->detailOrder($order_id);
        $fraud = 'challenge';
        if ($transaction == 'capture') {
            if ($fraud == 'challenge') {
              // TODO Set payment status in merchant's database to 'challenge'
              $status = 2;
              $statusPay = true;
            }
            else if ($fraud == 'accept') {
              // TODO Set payment status in merchant's database to 'success'
              $statusPay = true;
              $status = 3;
            }
        }
        else if ($transaction == 'cancel') {
            if ($fraud == 'challenge') {
              // TODO Set payment status in merchant's database to 'failure'
              $status = 12;
            }
            else if ($fraud == 'accept') {
              // TODO Set payment status in merchant's database to 'failure'
              $status = 12;
            }
        }
        else if ($transaction == 'deny') {
              // TODO Set payment status in merchant's database to 'failure'
              $status = 12;
        }
        $date = date('Y-m-d H:i:s');
        
       
        if (!$detailOrder['orders']){
            $this->themes->display('ordernotfound');
         
        }else{
            if ( $detailOrder['orders']->status_id != 3 ){
                $noorder     = $detailOrder['orders']->no_order;
        
                $dataUpdate = array(
                    'status_id'   => $status
                    );
                $this->db->where('id', $order_id);
        
                if ( $this->db->update('tbl_orders', $dataUpdate)){
                    if ( $status = 3 ){
                        $comment = "Pembayaran sudah diterima";
                    }elseif($status = 2 ){
                        $comment ="Pembayaran menuggu diverifikasi";
                    }else{
                        $comment = "Pembayaran Gagal";
                    }
                    $tbl_order_history = [
                        'no_order'      => $noorder,
                        'order_id'      => $order_id,
                        'comment'       => $comment,
                        'status_id'     => $status,
                        'customer_notif'=> $comment,
                        'created_date'  => $date,
                    ];
        
                    $this->db->insert('tbl_order_history', $tbl_order_history);
                }
            }
    
            $data['statusPay'] = $statusPay;
            $this->themes->display('payment_notif',$data);
        }        
    }
    public function failed(){

    }
    public function error()
    {

    }

    public function recurring()
    {

    }
    public function notification()
    {

    }
}
