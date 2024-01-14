<?php

namespace App\Controllers;

class PaymentGateway extends BaseController
{
    public function index()
    {

    }

    public function hookDurianPay()
    {
        $timenow = date("Y-m-d H:i:s");
        
        $vars = file_get_contents('php://input');
        $dataxx = json_decode($vars, true);
        $event = $dataxx['event'];
        $status = '';
        if($event == 'payment.completed'){
            $trxid = $dataxx['data']['order_ref_id'];

            if($status == ''){
                $jualcek = $this->model->cektransaksi('transaksi_catering',$trxid);
                if(count($jualcek) > 0){
                    $status = 'DIKONFIRMASI';
                    $this->model->changetrxstatus('transaksi_catering',$trxid,'DIKONFIRMASI',$vars);
                }
            }
            if($status == ''){
                $jualcek = $this->model->cektransaksi('transaksi_cs',$trxid);
                if(count($jualcek) > 0){
                    $status = 'DIKONFIRMASI';
                    $this->model->changetrxstatus('transaksi_cs',$trxid,'DIKONFIRMASI',$vars);
                }
            }
            if($status == ''){
                $jualcek = $this->model->cektransaksi('transaksi_kost',$trxid);
                if(count($jualcek) > 0){
                    $status = 'DIKONFIRMASI';
                    $this->model->changetrxstatus('transaksi_kost',$trxid,'DIKONFIRMASI',$vars);
                }
            }
            if($status == ''){
                $jualcek = $this->model->cektransaksi('transaksi_laundry',$trxid);
                if(count($jualcek) > 0){
                    $status = 'DIKONFIRMASI';
                    $this->model->changetrxstatus('transaksi_laundry',$trxid,'DIKONFIRMASI',$vars);
                }
            }

            if($status == ''){
                $status = 'TRX TIDAK DITEMUKAN';
            }
        }else{
            $trxid = '0';
            $status = $dataxx['data']['id']."|".$event;
        }
        
        $mode = $this->config->item('paygatemode');
        $midtrs = $this->model->paygatelogadd('durianpay',$mode,$trxid,$status,$timenow,$vars);
        echo $midtrs;
    }


    public function checkoutDurianPay($layanan,$trxid)
    {
        //$jualid,$layananid,$qty,$jmlbayar,$nama,$email
        $status = '';
        if($layanan == 'catering'){
            $tables = 'catering';
            $tablename = 'transaksi_catering';
            $layananindex = 'ID_CATERING';
            $layanannamaindex = 'NAMA_MENU';
        }else if($layanan == 'cleaning_service'){
            $tables = 'cleaning_service';
            $tablename = 'transaksi_cs';
            $layananindex = 'ID_CLEANING_SERVICE';
            $layanannamaindex = 'NAMA_SERVICE';
            $defaultimage= 'cs_image.jpg';
        }else if($layanan == 'kost'){
            $tables = 'kost';
            $tablename = 'transaksi_kost';
            $layananindex = 'ID_KOST';
            $layanannamaindex = 'NAMA_KOST';
        }else if($layanan == 'laundry'){
            $tables = 'laundry';
            $tablename = 'transaksi_laundry';
            $layananindex = 'ID_LAUNDRY';
            $layanannamaindex = 'NAMA_PAKET';
            $defaultimage= 'laundry_image.jpg';
        }else{
            echo "Mohon ma'af, saat ini layanan sedang tidak tersedia";
            exit;
        }

        $jualcek = $this->model->cektransaksi($tablename,$trxid);
        if(count($jualcek) > 0){
            $layananid = $jualcek[0][$layananindex];
            $jmlbayar = $jualcek[0]['TOTAL'];
            $nama = session('NAMA_LENGKAP');
            if (array_key_exists('QUANTITY', $jualcek[0])){
                $qty = $jualcek[0]['QUANTITY'];
            }else{
                $qty = "1";
            }
        }else{
            echo "Mohon ma'af, transaksi tidak dapat ditemukan";
            exit;
        }

        $url='https://api.durianpay.id/v1/orders';
        

        $produk = $this->model->getRowDataArray($tables, [$layananindex => $layananid]);
        $prod[0]['name'] = $produk[$layanannamaindex];
        $prod[0]['qty'] = (int)$qty;
        $prod[0]['price'] = $produk['HARGA'];
        if (array_key_exists('GAMBAR', $produk)){
            $prod[0]['logo'] = base_url()."/assets/foto/".$produk['GAMBAR'];
        }else{
            $prod[0]['logo'] = base_url()."/assets/foto/".$defaultimage;
        }
        
        $data = array(
            'amount' => $jmlbayar.'',
            "payment_option" => "full_payment",
            'currency' => 'IDR',
            'order_ref_id' => $trxid.'',
            'is_payment_link' => true,
            'redirect_url' => "https://merchant.com/redirect",
            'customer' => array(
                "customer_ref_id" => "komaha_".session('ID_USER'),
                "id" => "komaha_".session('ID_USER'),
                'given_name' => $nama,
            ),
            'items' => $prod,
        );
            
        $data_string = json_encode($data);

        // echo $data_string;
        // exit;
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 360);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'Authorization: Basic '.base64_encode('dp_test_FIbLugc9vgsoQAdc'.":"))
        );
        $res=curl_exec($ch);
        curl_close($ch);
        //echo $res;
        if (strpos($res, 'access_token') !== false && strpos($res, '"data"') !== false && strpos($res, '"payment_link_url"') !== false) {
            $dtmid = json_decode($res, true);
            return redirect()->to('https://links.durianpay.id/payment/'.$dtmid['data']['payment_link_url'].'');
        }else{
            return redirect()->to(base_url());
        }
    }

}
