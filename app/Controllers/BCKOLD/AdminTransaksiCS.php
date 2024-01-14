<?php

namespace App\Controllers;

class AdminTransaksiCS extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Admin Transaksi CS',
            'sectionTitle'      => 'Data Transaksi CS',
            'linkBreadCrumb'    => route_to('tr-cs-admin'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Transaksi', 'Transaksi CS', ''
            ],
        ];
    }

    public function index()
    {
        $DATA_TRANSAKSI = $this->model->queryArray("SELECT * FROM TRANSAKSI_CS AS A LEFT JOIN CLEANING_SERVICE AS B ON(A.ID_CLEANING_SERVICE = B.ID_CLEANING_SERVICE) LEFT JOIN USER AS C ON(A.ID_USER = C.ID_USER)");
        $DATA = [
            'data'    => $DATA_TRANSAKSI,
        ];
        return view('admin/transaksi-cs', array_merge($this->arrayDefault(), $DATA));
    }

    public function updateStatus($idTransaksi)
    {
        $POST_DATA = $this->request->getPost();
        unset($POST_DATA['csrf_test_name']);
        unset($POST_DATA['_method']);

        $this->model->updateData('TRANSAKSI_CS', $POST_DATA, ['ID_TRANSAKSI' => $idTransaksi]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(route_to('tr-cs-admin'));
    }

}
