<?php

namespace App\Controllers;

class AdminTransaksiCatering extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Admin Transaksi Catering',
            'sectionTitle'      => 'Data Transaksi Catering',
            'linkBreadCrumb'    => route_to('tr-catering-admin'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Transaksi', 'Transaksi Catering', ''
            ],
        ];
    }

    public function index()
    {
        $DATA_TRANSAKSI = $this->model->queryArray("SELECT * FROM TRANSAKSI_CATERING AS A LEFT JOIN CATERING AS B ON(A.ID_CATERING = B.ID_CATERING) LEFT JOIN USER AS C ON(A.ID_USER = C.ID_USER)");
        $DATA = [
            'data'    => $DATA_TRANSAKSI,
        ];
        return view('admin/transaksi-catering', array_merge($this->arrayDefault(), $DATA));
    }

    public function updateStatus($idTransaksi)
    {
        $POST_DATA = $this->request->getPost();
        unset($POST_DATA['csrf_test_name']);
        unset($POST_DATA['_method']);

        $this->model->updateData('TRANSAKSI_CATERING', $POST_DATA, ['ID_TRANSAKSI' => $idTransaksi]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(route_to('tr-catering-admin'));
    }

}
