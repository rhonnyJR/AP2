<?php

namespace App\Controllers;

class AdminTransaksiLaundry extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Admin Transaksi Laundry',
            'sectionTitle'      => 'Data Transaksi Laundry',
            'linkBreadCrumb'    => route_to('tr-laundry-admin'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Transaksi', 'Transaksi Laundry', ''
            ],
        ];
    }

    public function index()
    {
        $DATA_TRANSAKSI = $this->model->queryArray("SELECT * FROM transaksi_laundry AS A LEFT JOIN laundry AS B ON(A.ID_LAUNDRY = B.ID_LAUNDRY) LEFT JOIN user AS C ON(A.ID_USER = C.ID_USER)");
        $DATA = [
            'data'    => $DATA_TRANSAKSI,
        ];
        return view('admin/transaksi-laundry', array_merge($this->arrayDefault(), $DATA));
    }

    public function updateStatus($idTransaksi)
    {
        $POST_DATA = $this->request->getPost();
        unset($POST_DATA['csrf_test_name']);
        unset($POST_DATA['_method']);

        $this->model->updateData('transaksi_laundry', $POST_DATA, ['ID_TRANSAKSI' => $idTransaksi]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(route_to('tr-laundry-admin'));
    }

}
