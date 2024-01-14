<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $KOST_DATA = $this->model->getDataWhereArray('kost', ['REKOMENDASI' => 'YA']);
        $DATA = [
            'data' => $KOST_DATA,
        ];
        // return dd($DATA);
        return view('home/index', $DATA);
    }

    public function indexDaftarKost()
    {
        $KOST_DATA = $this->model->getAllDataArray('kost');
        $DATA = [
            'data' => $KOST_DATA,
        ];
        // return dd($DATA);
        return view('home/daftar-kost', $DATA);
    }

    public function indexDaftarCatering()
    {
        $KOST_DATA = $this->model->getAllDataArray('catering');
        $DATA = [
            'data' => $KOST_DATA,
        ];
        // return dd($DATA);
        return view('home/daftar-catering', $DATA);
    }

    public function indexDaftarCS()
    {
        $KOST_DATA = $this->model->getAllDataArray('cleaning_service');
        $DATA = [
            'data' => $KOST_DATA,
        ];
        // return dd($DATA);
        return view('home/daftar-cs', $DATA);
    }

    public function indexDaftarLaundry()
    {
        $KOST_DATA = $this->model->getAllDataArray('laundry');
        $DATA = [
            'data' => $KOST_DATA,
        ];
        // return dd($DATA);
        return view('home/daftar-laundry', $DATA);
    }

    public function detailKost($idKost)
    {
        $KOST_DATA = $this->model->getRowDataArray('kost', ['ID_KOST' => $idKost]);

        $DATA = [
            'data' => $KOST_DATA,
        ];
        return view('home/detail-kost', $DATA);
    }

    public function detailCatering($idCatering)
    {
        $KOST_DATA = $this->model->getRowDataArray('catering', ['ID_CATERING' => $idCatering]);

        $DATA = [
            'data' => $KOST_DATA,
        ];
        return view('home/detail-catering', $DATA);
    }

    public function detailCS($idCS)
    {
        $KOST_DATA = $this->model->getRowDataArray('cleaning_service', ['ID_CLEANING_SERVICE' => $idCS]);

        $DATA = [
            'data' => $KOST_DATA,
        ];
        return view('home/detail-cs', $DATA);
    }

    public function detailLaundry($idLaundry)
    {
        $KOST_DATA = $this->model->getRowDataArray('laundry', ['ID_LAUNDRY' => $idLaundry]);

        $DATA = [
            'data' => $KOST_DATA,
        ];
        return view('home/detail-laundry', $DATA);
    }

    public function auth()
    {
        return view('home/auth');
    }

    public function register()
    {
        return view('home/register');
    }
}
