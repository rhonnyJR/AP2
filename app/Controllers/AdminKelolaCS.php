<?php

namespace App\Controllers;

class AdminKelolaCS extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Admin Cleaning Service',
            'sectionTitle'      => 'Data Cleaning Service',
            'linkBreadCrumb'    => route_to('cs-admin'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Master Data', 'Data Cleaning Service', ''
            ],
        ];
    }

    public function index()
    {
        $USER_DATA = $this->model->getAllDataArray('cleaning_service');
        $DATA = [
            'data' => $USER_DATA,
        ];
        return view('admin/kelola-cs', array_merge($this->arrayDefault(), $DATA));
    }

    public function addIndex()
    {
        $DATA = [
            'isBack'    => true,
        ];
        return view('admin/add/kelola-cs', array_merge($this->arrayDefault(), $DATA));
    }

    public function store()
    {
        $POST_DATA  = $this->request->getPost();
        $POST_DATA['ID_CLEANING_SERVICE']   = 'CSS-' . strtoupper(random_string('alnum', 11));
        unset($POST_DATA['csrf_test_name']);

        $this->model->insertData('cleaning_service', $POST_DATA);

        session()->setFlashData('pesan', 'Data berhasil disimpan!');
        return redirect()->to(route_to('cs-admin'));
    }

    public function editIndex($idCS)
    {
        $USER_DATA  = $this->model->getRowDataArray('cleaning_service', ['ID_CLEANING_SERVICE' => $idCS]);

        $DATA = [
            'isBack'    => true,
            'data'      => $USER_DATA,
        ];

        return view('admin/edit/kelola-cs', array_merge($this->arrayDefault(), $DATA));
    }

    public function update($idCS)
    {
        $POST_DATA  = $this->request->getPost();
        unset($POST_DATA['_method']);
        unset($POST_DATA['csrf_test_name']);

        $this->model->updateData('cleaning_service', $POST_DATA, ['ID_CLEANING_SERVICE' => $idCS]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(route_to('cs-admin'));
    }

    public function delete($idCS)
    {
        $this->model->deleteData('cleaning_service', ['ID_CLEANING_SERVICE' => $idCS]);
        session()->setFlashData('pesan', 'Data berhasil dihapus!');
        return redirect()->to(route_to('cs-admin'));
    }
}
