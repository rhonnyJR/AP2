<?php

namespace App\Controllers;

class UserFormTransaksi extends BaseController
{

    public function cekUserLogin($idService, $route)
    {
        if (!session('IS_LOGIN')) {
            session()->setFlashData('status', 'danger');
            session()->setFlashData('pesan', 'Mohon masuk terlebih dahulu!');
            return redirect()->to(route_to('auth-user-view'));
        }

        return redirect()->to(route_to($route, $idService));
    }


    public function cekAuthKost($idKost)
    {
        return $this->cekUserLogin($idKost, 'form-tr-kost');
    }

    public function cekAuthCatering($idCatering)
    {
        return $this->cekUserLogin($idCatering, 'form-tr-catering');
    }

    public function cekAuthCS($idCS)
    {
        return $this->cekUserLogin($idCS, 'form-tr-cs');
    }

    public function cekAuthLaundry($idLaundry)
    {
        return $this->cekUserLogin($idLaundry, 'form-tr-laundry');
    }

    public function indexFormKost($idKost)
    {
        $DATA['data']   = $this->model->getRowDataArray('KOST', ['ID_KOST' => $idKost]);
        return view('home/transaksi-kost', $DATA);
    }

    public function indexFormCatering($idCatering)
    {
        $DATA['data']   = $this->model->getRowDataArray('CATERING', ['ID_CATERING' => $idCatering]);
        return view('home/transaksi-catering', $DATA);
    }

    public function indexFormCS($idCS)
    {
        $DATA['data']   = $this->model->getRowDataArray('CLEANING_SERVICE', ['ID_CLEANING_SERVICE' => $idCS]);
        return view('home/transaksi-cs', $DATA);
    }

    public function indexFormLaundry($idLaundry)
    {
        $DATA['data']   = $this->model->getRowDataArray('LAUNDRY', ['ID_LAUNDRY' => $idLaundry]);
        return view('home/transaksi-laundry', $DATA);
    }

}
