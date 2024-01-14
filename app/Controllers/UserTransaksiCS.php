<?php

namespace App\Controllers;

class UserTransaksiCS extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Daftar Transaksi CS',
            'sectionTitle'      => 'Daftar Transaksi CS',
            'linkBreadCrumb'    => route_to('tr-cs-user'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Transaksi', 'Daftar Transaksi CS', ''
            ],
        ];
    }

    public function index()
    {
        $DATA_TRANSAKSI = $this->model->queryArray("SELECT * FROM transaksi_cs AS A LEFT JOIN cleaning_service AS B ON(A.ID_CLEANING_SERVICE = B.ID_CLEANING_SERVICE)WHERE A.ID_USER ='" . session('ID_USER') . "'");
        $DATA = [
            'data'    => $DATA_TRANSAKSI,
        ];
        return view('home/user-transaksi-cs', array_merge($this->arrayDefault(), $DATA));
    }

    public function indexDetailTransaksi($idTransaksi)
    {
        $DATA_TRANSAKSI = $this->model->getRowDataArray('transaksi_cs', ['ID_TRANSAKSI' => $idTransaksi]);
        $DATA_CS        = $this->model->getRowDataArray('cleaning_service', ['ID_CLEANING_SERVICE' => $DATA_TRANSAKSI['ID_CLEANING_SERVICE']]);
        $DATA = [
            'dataTR'    => $DATA_TRANSAKSI,
            'dataCS'    => $DATA_CS,
            'isBack'    => true
        ];
        return view('home/user-detail-transaksi-cs', array_merge($this->arrayDefault(), $DATA));
    }

    public function updateBuktiPembayaran($idTransaksi)
    {
        $FILE       = $this->request->getFile('FOTO');

        $POST_DATA['BUKTI_PEMBAYARAN']  = time() . $FILE->getRandomName();
        $POST_DATA['STATUS_PEMBAYARAN'] = 'MENUNGGU KONFIRMASI';
        $FILE->move(ROOTPATH . 'public/assets/foto/', $POST_DATA['BUKTI_PEMBAYARAN']);

        $this->model->updateData('transaksi_cs', $POST_DATA, ['ID_TRANSAKSI' => $idTransaksi]);

        session()->setFlashData('pesan', 'Bukti pembayaran berhasil di upload, tunggu sampai admin memvalidasi!');
        return redirect()->to(route_to('tr-cs-user-detail', $idTransaksi));
    }


    public function store()
    {
        $POST_DATA  = $this->request->getPost();
        $POST_DATA['ID_TRANSAKSI']          = 'TRX-' . strtoupper(random_string('alnum', 16));
        $POST_DATA['TANGGAL_BOOKING']    = implode("-", array_reverse(explode("/", $POST_DATA['TANGGAL_BOOKING'])));
        unset($POST_DATA['csrf_test_name']);

        $this->model->insertData('transaksi_cs', $POST_DATA);


        session()->setFlashData('pesan', 'Transaksi berhasil dibuat, silahkan lakukan pembayaran!');
        return redirect()->to(route_to('tr-cs-user-detail', $POST_DATA['ID_TRANSAKSI']));
    }
}
