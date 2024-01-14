<?php

namespace App\Controllers;

class UserTransaksiKost extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Daftar Transaksi Kost',
            'sectionTitle'      => 'Daftar Transaksi Kost',
            'linkBreadCrumb'    => route_to('tr-kost-user'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Transaksi', 'Daftar Transaksi Kost', ''
            ],
        ];
    }

    public function index()
    {
        $DATA_TRANSAKSI = $this->model->queryArray("SELECT * FROM TRANSAKSI_KOST AS A LEFT JOIN KOST AS B ON(A.ID_KOST = B.ID_KOST)");
        $DATA = [
            'data'    => $DATA_TRANSAKSI,
        ];
        return view('home/user-transaksi-kost', array_merge($this->arrayDefault(), $DATA));
    }

    public function indexDetailTransaksi($idTransaksi)
    {
        $DATA_TRANSAKSI = $this->model->getRowDataArray('TRANSAKSI_KOST', ['ID_TRANSAKSI' => $idTransaksi]);
        $DATA_KOST      = $this->model->getRowDataArray('KOST', ['ID_KOST' => $DATA_TRANSAKSI['ID_KOST']]);
        $DATA = [
            'dataTR'    => $DATA_TRANSAKSI,
            'dataKost'  => $DATA_KOST,
            'isBack'    => true
        ];
        return view('home/user-detail-transaksi-kost', array_merge($this->arrayDefault(), $DATA));
    }

    public function updateBuktiPembayaran($idTransaksi)
    {
        $FILE       = $this->request->getFile('FOTO');

        $POST_DATA['BUKTI_PEMBAYARAN']  = time() . $FILE->getRandomName();
        $POST_DATA['STATUS_PEMBAYARAN'] = 'MENUNGGU KONFIRMASI';
        $FILE->move(ROOTPATH . 'public/assets/foto/', $POST_DATA['BUKTI_PEMBAYARAN']);

        $this->model->updateData('TRANSAKSI_KOST', $POST_DATA, ['ID_TRANSAKSI' => $idTransaksi]);

        session()->setFlashData('pesan', 'Bukti pembayaran berhasil di upload, tunggu sampai admin memvalidasi!');
        return redirect()->to(route_to('tr-kost-user-detail', $idTransaksi));
    }


    public function store()
    {
        $POST_DATA  = $this->request->getPost();
        $POST_DATA['ID_TRANSAKSI']          = 'TRX-' . strtoupper(random_string('alnum', 16));
        $POST_DATA['TANGGAL_AWAL_MASUK']    = implode("-", array_reverse(explode("/", $POST_DATA['TANGGAL_AWAL_MASUK'])));
        unset($POST_DATA['csrf_test_name']);

        $CEK_DATA = $this->model->getRowDataArray('KOST', ['ID_KOST' => $POST_DATA['ID_KOST']]);
        if ($CEK_DATA['TERSEDIA'] < 1) {
            session()->setFlashData('pesan', 'Mohon maaf kamar sudah penuh semua');
            return redirect()->back();
        }

        $this->model->updateData('KOST', ['TERSEDIA' => ($CEK_DATA['TERSEDIA'] - 1)], ['ID_KOST' => $POST_DATA['ID_KOST']]);
        $this->model->insertData('TRANSAKSI_KOST', $POST_DATA);


        session()->setFlashData('pesan', 'Transaksi berhasil dibuat, silahkan lakukan pembayaran!');
        return redirect()->to(route_to('tr-kost-user-detail', $POST_DATA['ID_TRANSAKSI']));
    }
}
