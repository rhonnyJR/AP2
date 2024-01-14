<?php

namespace App\Controllers;

class AdminKelolaUser extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Admin Pengguna',
            'sectionTitle'      => 'Data Pengguna',
            'linkBreadCrumb'    => route_to('users-admin'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Master Data', 'Data Pengguna', ''
            ],
        ];
    }

    public function index()
    {
        $USER_DATA = $this->model->getDataWhereArray('USER', ['LEVEL' => 'USER']);
        $DATA = [
            'data' => $USER_DATA,
        ];
        return view('admin/kelola-user', array_merge($this->arrayDefault(), $DATA));
    }

    public function editIndex($idUser)
    {
        $USER_DATA  = $this->model->getRowDataArray('USER', ['ID_USER' => $idUser]);

        $DATA = [
            'isBack'    => true,
            'data'      => $USER_DATA,
        ];

        return view('admin/edit/kelola-user', array_merge($this->arrayDefault(), $DATA));
    }

    public function update($idUser)
    {
        $POST_DATA = $this->request->getPost();

        unset($POST_DATA['csrf_test_name']);
        unset($POST_DATA['_method']);

        $this->model->updateData('USER', $POST_DATA, ['ID_USER' => $idUser]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(route_to('users-admin'));
    }

    public function delete($idUser)
    {
        $this->model->deleteData('USER', ['ID_USER' => $idUser]);
        session()->setFlashData('pesan', 'Data berhasil dihapus!');
        return redirect()->to(route_to('users-admin'));
    }
}
