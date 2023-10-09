<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenerbitModel;

class PenerbitController extends BaseController
{

    public function index(){
        return view('penerbit/table', [
            'daftar_penerbit' => (new PenerbitModel())->findAll()
        ]);
    }

    public function create()
    {
        $data = [
            'penerbit' => $this->request->getPost('penerbit'),
            'kota'         => $this->request->getPost('kota')
        ]; 

        $model = new PenerbitModel();
        $id = (int)$this->request->getPost('id');

        if($id > 0){
            $model->update($id, $data);
        }else{
            $model->insert($data);
        }

        return redirect()->to(base_url('penerbit'));
    }

    public function form(){
        return view('penerbit/form');
    }

    public function edit($id){
        $r = (new PenerbitModel())->where('id', $id)->first();
        return view('penerbit/form', [
            'data' => $r
        ]);
    }

    public function hapus(){
        $id = $this->request->getPost('id');
        $m = new PenerbitModel();
        $m->delete($id);
        return redirect()->to(base_url('penerbit'));
    }
}
