<?php

namespace App\Controllers;

class AdminAuth extends BaseController
{
    public function index()
    {
        return view('admin/auth');
    }

    public function auth()
    {
        $DATA               = $this->request->getVar();
        $CEK_USERNAME       = $this->model->getRowDataArray('USER', ['USERNAME' => $DATA['USERNAME']]);

        $VALIDASI = is_null($CEK_USERNAME) ? true : (!hash_equals($CEK_USERNAME['PASSWORD'], $DATA['PASSWORD']) ? true : !hash_equals($CEK_USERNAME['LEVEL'], $DATA['USERNAME']));
        if ($VALIDASI) {
            session()->setFlashData('status', 'danger');
            session()->setFlashData('pesan', 'Username atau password anda salah!');
            return redirect()->back();
        }

        session()->set([
            'IS_LOGIN_ADMIN'        => 1,
            'LEVEL_ADMIN'           => $CEK_USERNAME['LEVEL'],
            'NAMA_LENGKAP_ADMIN'    => ucfirst(strtolower($CEK_USERNAME['NAMA_LENGKAP']))
        ]);
        return redirect()->to(route_to('dashboard-admin'));
    }

    public function logout()
    {
        session()->remove('IS_LOGIN_ADMIN');
        session()->remove('LEVEL_ADMIN');
        session()->remove('NAMA_LENGKAP_ADMIN');
        return redirect()->to(route_to('auth-admin-view'));
    }
}
