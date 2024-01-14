<?php

namespace App\Controllers;

class UserTransaksiLaundry extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Daftar Transaksi Laundry',
            'sectionTitle'      => 'Daftar Transaksi Laundry',
            'linkBreadCrumb'    => route_to('tr-laundry-user'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Transaksi', 'Daftar Transaksi Laundry', ''
            ],
        ];
    }

    public function index()
    {
        $DATA_TRANSAKSI = $this->model->queryArray("SELECT * FROM transaksi_laundry AS A LEFT JOIN laundry AS B ON(A.ID_LAUNDRY = B.ID_LAUNDRY) WHERE A.ID_USER ='" . session('ID_USER') . "'");
        $DATA = [
            'data'    => $DATA_TRANSAKSI,
        ];
        return view('home/user-transaksi-laundry', array_merge($this->arrayDefault(), $DATA));
    }

    public function indexDetailTransaksi($idTransaksi)
    {
        $DATA_TRANSAKSI = $this->model->getRowDataArray('transaksi_laundry', ['ID_TRANSAKSI' => $idTransaksi]);
        $DATA_LAUNDRY        = $this->model->getRowDataArray('laundry', ['ID_LAUNDRY' => $DATA_TRANSAKSI['ID_LAUNDRY']]);
        $DATA = [
            'dataTR'    => $DATA_TRANSAKSI,
            'dataLaundry'    => $DATA_LAUNDRY,
            'isBack'    => true
        ];
        return view('home/user-detail-transaksi-laundry', array_merge($this->arrayDefault(), $DATA));
    }

    public function updateBuktiPembayaran($idTransaksi)
    {
        $FILE       = $this->request->getFile('FOTO');

        $POST_DATA['BUKTI_PEMBAYARAN']  = time() . $FILE->getRandomName();
        $POST_DATA['STATUS_PEMBAYARAN'] = 'MENUNGGU KONFIRMASI';
        $FILE->move(ROOTPATH . 'public/assets/foto/', $POST_DATA['BUKTI_PEMBAYARAN']);

        $this->model->updateData('transaksi_laundry', $POST_DATA, ['ID_TRANSAKSI' => $idTransaksi]);

        session()->setFlashData('pesan', 'Bukti pembayaran berhasil di upload, tunggu sampai admin memvalidasi!');
        return redirect()->to(route_to('tr-laundry-user-detail', $idTransaksi));
    }


    public function store()
    {
        $POST_DATA  = $this->request->getPost();
        $POST_DATA['ID_TRANSAKSI']          = 'TRX-' . strtoupper(random_string('alnum', 16));
        unset($POST_DATA['csrf_test_name']);

        $this->model->insertData('transaksi_laundry', $POST_DATA);


        session()->setFlashData('pesan', 'Transaksi berhasil dibuat, silahkan lakukan pembayaran!');
        return redirect()->to(route_to('tr-laundry-user-detail', $POST_DATA['ID_TRANSAKSI']));
    }
}
