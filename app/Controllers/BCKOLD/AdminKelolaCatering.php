<?php

namespace App\Controllers;

class AdminKelolaCatering extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Admin Catering',
            'sectionTitle'      => 'Data Catering',
            'linkBreadCrumb'    => route_to('catering-admin'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Master Data', 'Data Catering', ''
            ],
        ];
    }

    public function index()
    {
        $USER_DATA = $this->model->getAllDataArray('CATERING');
        $DATA = [
            'data' => $USER_DATA,
        ];
        return view('admin/kelola-catering', array_merge($this->arrayDefault(), $DATA));
    }

    public function addIndex()
    {
        $DATA = [
            'isBack'    => true,
        ];
        return view('admin/add/kelola-catering', array_merge($this->arrayDefault(), $DATA));
    }

    public function store()
    {
        $POST_DATA  = $this->request->getPost();
        $FILE       = $this->request->getFile('FOTO');
        unset($POST_DATA['csrf_test_name']);

        $POST_DATA['GAMBAR']    = time() . $FILE->getRandomName();
        $POST_DATA['ID_CATERING']   = 'CTR-' . strtoupper(random_string('alnum', 11));
        $FILE->move(ROOTPATH . 'public/assets/foto/', $POST_DATA['GAMBAR']);

        $this->model->insertData('CATERING', $POST_DATA);

        // return dd($POST_DATA);
        session()->setFlashData('pesan', 'Data berhasil disimpan!');
        return redirect()->to(route_to('catering-admin'));
    }

    public function editIndex($idCatering)
    {
        $USER_DATA  = $this->model->getRowDataArray('CATERING', ['ID_CATERING' => $idCatering]);

        $DATA = [
            'isBack'    => true,
            'data'      => $USER_DATA,
        ];

        return view('admin/edit/kelola-catering', array_merge($this->arrayDefault(), $DATA));
    }

    public function update($idCatering)
    {
        $POST_DATA  = $this->request->getPost();
        $FILE       = $this->request->getFile('FOTO');
        unset($POST_DATA['_method']);
        unset($POST_DATA['csrf_test_name']);

        if (!empty($FILE->getName('GAMBAR'))) {
            $POST_DATA['GAMBAR']    = time() . $FILE->getRandomName();
            $FILE->move(ROOTPATH . 'public/assets/foto/', $POST_DATA['GAMBAR']);
        }

        $this->model->updateData('CATERING', $POST_DATA, ['ID_CATERING' => $idCatering]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(route_to('catering-admin'));
    }

    public function delete($idCatering)
    {
        $this->model->deleteData('CATERING', ['ID_CATERING' => $idCatering]);
        session()->setFlashData('pesan', 'Data berhasil dihapus!');
        return redirect()->to(route_to('catering-admin'));
    }
}
