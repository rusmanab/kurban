<?php 
class Payment extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mglobal');
    }
    public function index(){
        $midtrans_key = $this->config->item('midtrans_key');
        $midtrans_production = $this->config->item('midtrans_production');
        \Midtrans\Config::$serverKey = $midtrans_key;
              
        //$notif = new \Midtrans\Notification();
        $notif = json_decode(file_get_contents('php://input'), true);
        $date = date('Y-m-d H:i:s');
        $noorder = $notif->order_id;
        $detailOrder = $this->mglobal->detailOrderByNoOrder($noorder);

        $data = [
            'order_id'    => $detailOrder->id,
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
    
    
            $dataUpdate = array(
                'status_id'   => $status
                );
            $this->db->where('id', $detailOrder->id);
            
    
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
                    'order_id'      => $detailOrder->id,
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
        $noorder = $this->input->get_post('order_id', true);
        $status_code = $this->input->get_post('status_code', true);
        $transaction = $this->input->get_post('transaction_status', true);
        $statusPay = false;
        if ( $transaction == 'capture' || $transaction == 'settlement' ){
            $statusPay = true;
        }
        $detailOrder = $this->mglobal->detailOrderByNoOrder($noorder);
        $fraud = 'challenge';
        $status = 2;
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
        
       
        if (!$detailOrder){
            $this->themes->display('ordernotfound');
         
        }else{
            if ( $detailOrder->status_id != 3 ){
              
                $order_id    = $detailOrder->id;

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
