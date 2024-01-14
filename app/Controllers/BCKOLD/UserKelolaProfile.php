<?php

namespace App\Controllers;

class UserKelolaProfile extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Ubah Pengguna',
            'sectionTitle'      => 'Data Pengguna',
            'linkBreadCrumb'    => route_to('users-profile'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Master Data', 'Data Pengguna', ''
            ],
        ];
    }

    public function editIndex($idUser)
    {
        $USER_DATA  = $this->model->getRowDataArray('USER', ['ID_USER' => $idUser]);

        $DATA = [
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
        return redirect()->to(route_to('users-update-profile', $idUser));
    }

}
