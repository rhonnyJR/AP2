<?php

namespace App\Controllers;

class UserTransaksiCatering extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Daftar Transaksi Catering',
            'sectionTitle'      => 'Daftar Transaksi Catering',
            'linkBreadCrumb'    => route_to('tr-catering-user'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Transaksi', 'Daftar Transaksi Catering', ''
            ],
        ];
    }

    public function index()
    {
        $DATA_TRANSAKSI = $this->model->queryArray("SELECT * FROM TRANSAKSI_CATERING AS A LEFT JOIN CATERING AS B ON(A.ID_CATERING = B.ID_CATERING)");
        $DATA = [
            'data'    => $DATA_TRANSAKSI,
        ];
        return view('home/user-transaksi-catering', array_merge($this->arrayDefault(), $DATA));
    }

    public function indexDetailTransaksi($idTransaksi)
    {
        $DATA_TRANSAKSI = $this->model->getRowDataArray('TRANSAKSI_CATERING', ['ID_TRANSAKSI' => $idTransaksi]);
        $DATA_CATERING      = $this->model->getRowDataArray('CATERING', ['ID_CATERING' => $DATA_TRANSAKSI['ID_CATERING']]);
        $DATA = [
            'dataTR'    => $DATA_TRANSAKSI,
            'dataCatering'  => $DATA_CATERING,
            'isBack'    => true
        ];
        return view('home/user-detail-transaksi-catering', array_merge($this->arrayDefault(), $DATA));
    }

    public function updateBuktiPembayaran($idTransaksi)
    {
        $FILE       = $this->request->getFile('FOTO');

        $POST_DATA['BUKTI_PEMBAYARAN']  = time() . $FILE->getRandomName();
        $POST_DATA['STATUS_PEMBAYARAN'] = 'MENUNGGU KONFIRMASI';
        $FILE->move(ROOTPATH . 'public/assets/foto/', $POST_DATA['BUKTI_PEMBAYARAN']);

        $this->model->updateData('TRANSAKSI_CATERING', $POST_DATA, ['ID_TRANSAKSI' => $idTransaksi]);

        session()->setFlashData('pesan', 'Bukti pembayaran berhasil di upload, tunggu sampai admin memvalidasi!');
        return redirect()->to(route_to('tr-catering-user-detail', $idTransaksi));
    }


    public function store()
    {
        $POST_DATA  = $this->request->getPost();
        $POST_DATA['ID_TRANSAKSI']          = 'TRX-' . strtoupper(random_string('alnum', 16));
        $POST_DATA['TANGGAL_PENGIRIMAN']    = implode("-", array_reverse(explode("/", $POST_DATA['TANGGAL_PENGIRIMAN'])));
        unset($POST_DATA['csrf_test_name']);

        $this->model->insertData('TRANSAKSI_CATERING', $POST_DATA);


        session()->setFlashData('pesan', 'Transaksi berhasil dibuat, silahkan lakukan pembayaran!');
        return redirect()->to(route_to('tr-catering-user-detail', $POST_DATA['ID_TRANSAKSI']));
    }
}
