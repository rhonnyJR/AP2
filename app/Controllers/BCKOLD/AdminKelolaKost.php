<?php

namespace App\Controllers;

class AdminKelolaKost extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Admin Kost',
            'sectionTitle'      => 'Data Kost',
            'linkBreadCrumb'    => route_to('kost-admin'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Master Data', 'Data Kost', ''
            ],
        ];
    }

    public function index()
    {
        $USER_DATA = $this->model->getAllDataArray('KOST');
        $DATA = [
            'data' => $USER_DATA,
        ];
        return view('admin/kelola-kost', array_merge($this->arrayDefault(), $DATA));
    }

    public function addIndex()
    {
        $DATA = [
            'isBack'    => true,
        ];
        return view('admin/add/kelola-kost', array_merge($this->arrayDefault(), $DATA));
    }

    public function store()
    {
        $POST_DATA  = $this->request->getPost();
        $FILE       = $this->request->getFile('FOTO');
        unset($POST_DATA['csrf_test_name']);

        $POST_DATA['GAMBAR']    = time() . $FILE->getRandomName();
        $POST_DATA['ID_KOST']   = 'KST-' . strtoupper(random_string('alnum', 11));
        $FILE->move(ROOTPATH . 'public/assets/foto/', $POST_DATA['GAMBAR']);

        if(!isset($POST_DATA['REKOMENDASI'])) {
            $POST_DATA['REKOMENDASI'] = 'TIDAK';
        }

        $this->model->insertData('KOST', $POST_DATA);

        // return dd($POST_DATA);
        session()->setFlashData('pesan', 'Data berhasil disimpan!');
        return redirect()->to(route_to('kost-admin'));
    }

    public function editIndex($idKost)
    {
        $USER_DATA  = $this->model->getRowDataArray('KOST', ['ID_KOST' => $idKost]);

        $DATA = [
            'isBack'    => true,
            'data'      => $USER_DATA,
        ];

        return view('admin/edit/kelola-kost', array_merge($this->arrayDefault(), $DATA));
    }

    public function update($idKost)
    {
        $POST_DATA  = $this->request->getPost();
        $FILE       = $this->request->getFile('FOTO');
        unset($POST_DATA['_method']);
        unset($POST_DATA['csrf_test_name']);

        if (!empty($FILE->getName('GAMBAR'))) {
            $POST_DATA['GAMBAR']    = time() . $FILE->getRandomName();
            $FILE->move(ROOTPATH . 'public/assets/foto/', $POST_DATA['GAMBAR']);
        }

        if(!isset($POST_DATA['REKOMENDASI'])) {
            $POST_DATA['REKOMENDASI'] = 'TIDAK';
        }

        $this->model->updateData('KOST', $POST_DATA, ['ID_KOST' => $idKost]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(route_to('kost-admin'));
    }

    public function delete($idKost)
    {
        $this->model->deleteData('KOST', ['ID_KOST' => $idKost]);
        session()->setFlashData('pesan', 'Data berhasil dihapus!');
        return redirect()->to(route_to('kost-admin'));
    }
}
