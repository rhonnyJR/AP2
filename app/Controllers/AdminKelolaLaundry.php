<?php

namespace App\Controllers;

class AdminKelolaLaundry extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Admin Laundry',
            'sectionTitle'      => 'Data Laundry',
            'linkBreadCrumb'    => route_to('laundry-admin'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Master Data', 'Data Laundry', ''
            ],
        ];
    }

    public function index()
    {
        $USER_DATA = $this->model->getAllDataArray('laundry');
        $DATA = [
            'data' => $USER_DATA,
        ];
        return view('admin/kelola-laundry', array_merge($this->arrayDefault(), $DATA));
    }

    public function addIndex()
    {
        $DATA = [
            'isBack'    => true,
        ];
        return view('admin/add/kelola-laundry', array_merge($this->arrayDefault(), $DATA));
    }

    public function store()
    {
        $POST_DATA  = $this->request->getPost();
        $POST_DATA['ID_LAUNDRY']   = 'LRY-' . strtoupper(random_string('alnum', 11));
        unset($POST_DATA['csrf_test_name']);

        $this->model->insertData('laundry', $POST_DATA);

        session()->setFlashData('pesan', 'Data berhasil disimpan!');
        return redirect()->to(route_to('laundry-admin'));
    }

    public function editIndex($idLaundry)
    {
        $USER_DATA  = $this->model->getRowDataArray('laundry', ['ID_LAUNDRY' => $idLaundry]);

        $DATA = [
            'isBack'    => true,
            'data'      => $USER_DATA,
        ];

        return view('admin/edit/kelola-laundry', array_merge($this->arrayDefault(), $DATA));
    }

    public function update($idLaundry)
    {
        $POST_DATA  = $this->request->getPost();
        unset($POST_DATA['_method']);
        unset($POST_DATA['csrf_test_name']);

        $this->model->updateData('laundry', $POST_DATA, ['ID_LAUNDRY' => $idLaundry]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(route_to('laundry-admin'));
    }

    public function delete($idLaundry)
    {
        $this->model->deleteData('laundry', ['ID_LAUNDRY' => $idLaundry]);
        session()->setFlashData('pesan', 'Data berhasil dihapus!');
        return redirect()->to(route_to('laundry-admin'));
    }
}
