<?php 
class Payment extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mglobal');
    }
    public function index(){
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;
        $date = date('Y-m-d H:i:s');

        $data = [
            'value'       => json_encode($notif),
            'created_date'=> $date 
        ];
        
        $this->db->insert('webhook_midtrans',$data);
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
            $tbl_order_history = [
                'no_order'      => $noorder,
                'order_id'      => $notif->order_id,
                'comment'       => "Pembayaran menuggu diverifikasi",
                'status_id'     => 2,
                'customer_notif'=> "Pembayaran menuggu diverifikasi",
                'created_date'  => $date,
            ];

            $this->db->insert('tbl_order_history', $tbl_order_history);
        }
    }

    public function failed(){

    }
    public function finish()
    {

    }
}
