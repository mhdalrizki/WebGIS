<?php

namespace App\Controllers;

class Penduduk extends BaseController
{
    public $title = 'Penduduk';
    public $url = 'penduduk';

    public function index()
    {
        $data['title'] = $this->title;
        $data['url'] = $this->url;
        $data['page'] = 'Data ' . $this->title;
        $PendudukModel = new \App\Models\PendudukModel();
        $data['getData'] = $PendudukModel->orderBy('id', 'ANC')
            ->findAll();
        // $data['getData'] = $PendudukModel->orderBy('updated_at', 'DESC')

        return view('Penduduk/IndexView', $data);
    }



    public function form($id = '') //termasuk edit data
    {
        $PendudukModel = new \App\Models\PendudukModel();
        $data['title'] = $this->title;
        $data['url'] = $this->url;
        if ($id != '') {
            $getData = $PendudukModel->where('id', $id)->get()->getRowArray();
            // $getData = $PendudukModel->asArray()->find($id);
        } else {
            $getData = null;
        }
        $data['getData'] = $getData;
        $data['page'] = 'Form ' . $this->title;
        return view('Penduduk/FormView', $data);
    }

    public function save()
    {
        $PendudukModel = new \App\Models\PendudukModel();
        $data = $this->request->getPost();

        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/penduduk', $newName);
            $data['foto'] = $newName;
        }


        $save = $PendudukModel->save($data);
        if ($save) {
            session()->setFlashData(['info' => 'success', 'message' => 'Sukses disimpan']);
            return redirect()->to($this->url);
        } else {
            session()->setFlashdata('hasForm', $this->request->getPost());
            session()->setFlashdata('validation', $PendudukModel->errors());
            return redirect()->to($this->url . '/form/' . $this->request->getPost('id'));
        }
    }

    public function delete($id = '')
    {
        $PendudukModel = new \App\Models\PendudukModel();
        $PendudukModel->delete($id);
        session()->setFlashData(['info' => 'success', 'message' => 'Sukses dihapus']);
        return redirect()->to($this->url);
    }

    public function check_kk($nokk, $id = '')
    {
        $PendudukModel = new \App\Models\PendudukModel();
        $checkUser = $PendudukModel->where('nokk', $nokk);
        if ($id != '') {
            $checkUser->where('id!=', $id);
        }

        if ($checkUser->first() == null) {
            $status = true;
        } else {
            $status = false;
        }
        return $this->response->setJson(['status' => $status]);
    }
}
