<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenerbitModel;
use Config\Services;

class PenerbitController extends BaseController
{

    public function index(){
        return view('penerbit/table', [
            'daftar_penerbit' => (new PenerbitModel())->findAll()
        ]);
    }

    private function terimaFile($id){
        $icon = request()->getFile('icon');
     
        if($icon->isFile()){
            $target = WRITEPATH . '/uploads';
            $icon->move($target, $id.".png", true);   
        }
    }

    private function cek_validasi(){
        $rules = [
            'penerbit' => 'required|min_length[3]',
            'kota'     => 'required|min_length[4]'
        ];

        $msg = [
            'penerbit' => [
                'required' => 'Penerbit harus diisikan',
                'min_length' => 'Nama Penerbit Minimal harus 3 karakter'
            ],
            'kota' => [
                'required' => 'Nama Kota penerbit harus diisikan',
                'min_length' => 'Nama kota Penerbit Minimal harus 4 karakter'
            ],
        ];
        return Services::validation()
                    ->setRules($rules, $msg)
                    ->withRequest(request())->run();
    }

    public function create()
    {
        $data = [
            'penerbit' => $this->request->getPost('penerbit'),
            'kota'         => $this->request->getPost('kota')
        ]; 

        $model = new PenerbitModel();
        $id = (int)$this->request->getPost('id');

        if($this->cek_validasi() == false){
            session()->setFlashdata('validation', Services::validation());
            
            if($id > 0){
                return redirect()->to(base_url('penerbit/edit/'.$id)); 
            }else{    
                return redirect()
                        ->with('data', $data)
                        ->to(base_url('penerbit/form'));
            }
        }


        if($id > 0){
           $hasil = $model->update($id, $data);
        }else{
           $hasil = $model->insert($data);
           $id = $hasil;
        }

        if( $hasil == false){
            return redirect()->to(base_url('penerbit/form'));
        }else{
            $this->terimaFile($id);
            return redirect()->to(base_url('penerbit'));
        }
       
    }

    public function form(){
        return view('penerbit/form', [
            'data' => session('data'),
            'validation' => session('validation')
        ]);
    }

    public function edit($id){
        $r = (new PenerbitModel())->where('id', $id)->first();
        return view('penerbit/form', [
            'data' => $r,
            'validation' => session('validation')
        ]);
    }

    public function hapus(){
        $id = $this->request->getPost('id');
        $m = new PenerbitModel();
        $m->delete($id);
        return redirect()->to(base_url('penerbit'));
    }

    public function tampilicon( $id){
        $target = WRITEPATH . "/uploads/";
        return response()
            ->setHeader('Content-type', 'image/png')
            ->setBody(
                file_get_contents($target . $id . '.png')
            );
    }


}
