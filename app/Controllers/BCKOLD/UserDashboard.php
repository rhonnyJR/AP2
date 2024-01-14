<?php

namespace App\Controllers;

class UserDashboard extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Dashboard',
            'sectionTitle'      => 'Dashboard',
            'linkBreadCrumb'    => route_to('dashboard-user'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Dashboard', 'Dashboard', ''
            ],
        ];
    }

    public function index()
    {
        $COUNT_TR_KOST      = $this->model->getDataCount('TRANSAKSI_KOST', 'ID_TRANSAKSI');
        $COUNT_TR_CATERING  = $this->model->getDataCount('TRANSAKSI_CATERING', 'ID_TRANSAKSI');
        $COUNT_TR_CS        = $this->model->getDataCount('TRANSAKSI_CS', 'ID_TRANSAKSI');
        $COUNT_TR_LAUNDRY   = $this->model->getDataCount('TRANSAKSI_LAUNDRY', 'ID_TRANSAKSI');
        $dataset = [
            'countTrKost'       => $COUNT_TR_KOST['ID_TRANSAKSI'],
            'countTrCatering'   => $COUNT_TR_CATERING['ID_TRANSAKSI'],
            'countTrCS'         => $COUNT_TR_CS['ID_TRANSAKSI'],
            'countTrLaundry'    => $COUNT_TR_LAUNDRY['ID_TRANSAKSI'],
        ];

        return view('home/user-dashboard', array_merge($this->arrayDefault(), $dataset));
    }
}
