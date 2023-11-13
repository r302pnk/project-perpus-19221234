<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenerbitModel;
use Config\Services;

class PenerbitController extends BaseController
{

    public function index(){
        return view('penerbit/table', [
            'menupenerbit' =>'active',
            'penerbit' =>'menu-open',
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
 
    public function cekvalidasi(){
        $rules = [
            'penerbit' => 'required|alpha_numeric_space|min_length[5]|max_length[255]',
            'kota' => 'alpha_space'
        ];
        $msg   = [
            'penerbit' => [
                'required' => 'Nama penerbit harus diisikan',
                'alpha_numeric_space' => 'Nama penerbit harus berupa huruf dan angka ',
                'min_length' => 'Nama penerbit minimal 5 huruf',
                'max_length' => 'Nama penerbit maximal 255 huruf'
            ],
            'kota' => [
                'alpha_space' => 'Nama kota harus huruf'
            ]
        ];
        return Services::validation()
                ->withRequest(request())
                ->setRules($rules, $msg);
    }

    public function create()
    {
        $data = [
            'penerbit' => $this->request->getPost('penerbit'),
            'kota'         => $this->request->getPost('kota')
        ]; 

        if($this->cekvalidasi()->run() == false){
            session()->setFlashdata('validasi', Services::validation());
            
            return redirect()->to(base_url('penerbit/form'))
                             ->with('data', $data);
        }

        $model = new PenerbitModel();
        $id = (int)$this->request->getPost('id');
 
        if($id > 0){ 
           $hasil = $model->update($id, $data);
        }else{
           $hasil = $model->insert($data);
           $id = $hasil;
        }
return $id;
        if( $hasil == false){
            if($id > 0){
                return redirect()->to(base_url('penerbit/edit/'.$id))->with("error","Gagal ubah data");
            }else{
                return redirect()->to(base_url('penerbit/form'));
            }
        }else{
            $this->terimaFile($id);
            return redirect()->to(base_url('penerbit'));
        }
       
    }

    public function form(){
        $validasi = session('validasi');
      
        return view('penerbit/form', [
            'data' => session('data'), 
            'penerbit' =>'menu-open',
            'formpenerbit' => 'active',
            'validasi' => $validasi
        ]);
    }

    public function edit($id){
        $r = (new PenerbitModel())->where('id', $id)->first();
 
        return view('penerbit/form', [
            'data' => $r, 
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
