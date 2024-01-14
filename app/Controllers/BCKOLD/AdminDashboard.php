<?php

namespace App\Controllers;

class AdminDashboard extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Admin Dashboard',
            'sectionTitle'      => 'Dashboard',
            'linkBreadCrumb'    => route_to('adminDash'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Dashboard', 'Admin Dashboard', ''
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
        return view('admin/dashboard', array_merge($this->arrayDefault(), $dataset));
    }
}
