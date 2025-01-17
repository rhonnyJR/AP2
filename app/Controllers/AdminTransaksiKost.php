<?php

namespace App\Controllers;

class AdminTransaksiKost extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Admin Transaksi Kost',
            'sectionTitle'      => 'Data Transaksi Kost',
            'linkBreadCrumb'    => route_to('tr-kost-admin'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Transaksi', 'Transaksi Kost', ''
            ],
        ];
    }

    public function index()
    {
        $DATA_TRANSAKSI = $this->model->queryArray("SELECT * FROM transaksi_kost AS A LEFT JOIN kost AS B ON(A.ID_KOST = B.ID_KOST) LEFT JOIN user AS C ON(A.ID_USER = C.ID_USER)");
        $DATA = [
            'data'    => $DATA_TRANSAKSI,
        ];
        return view('admin/transaksi-kost', array_merge($this->arrayDefault(), $DATA));
    }

    public function updateStatus($idTransaksi)
    {
        $POST_DATA = $this->request->getPost();
        unset($POST_DATA['csrf_test_name']);
        unset($POST_DATA['_method']);

        $this->model->updateData('transaksi_kost', $POST_DATA, ['ID_TRANSAKSI' => $idTransaksi]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(route_to('tr-kost-admin'));
    }

    public function delete($idUser)
    {
        $this->model->deleteData('user', ['ID_USER' => $idUser]);
        session()->setFlashData('pesan', 'Data berhasil dihapus!');
        return redirect()->to(route_to('users-admin'));
    }
}
