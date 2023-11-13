<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\KoleksiBuku;
use App\Models\PeminjamanModel;

class PeminjamanController extends BaseController
{
    public function index()
    {
        $pm = new PeminjamanModel();
        return view('peminjaman/table', [
            'daftar_peminjaman' => $pm->view()
        ]);
    }

    public function form($data=[]) {
        $agt = new AnggotaModel();
        $kol = new KoleksiBuku();

        return view('peminjaman/form', [
            'data' => $data,
            'daftar_anggota' => $agt->findAll(),
            'daftar_koleksi' => $kol->view()
        ]);
    }

    public function edit($id){
        $p = new PeminjamanModel();
        $data = $p->find($id);
        if($data != null){
            return $this->form($data);
        }else{
            return response()
                    ->setStatusCode(404)->setBody('Tidak ditemukan');
        }
    }

    public function simpan(){
        $data = [
            'tgl_peminjaman' => request()->getPost('tgl_peminjaman'),
            'tb_pengguna_id_peminjaman' => session('pengguna')['id'],
            'tb_anggota_id' => request()->getPost('tb_anggota_id'),
            'tb_koleksibuku_id' => request()->getPost('tb_koleksibuku_id')
        ];

        $p = new PeminjamanModel();
        $id = (int)request()->getPost('id');

        if($id > 0 ){
            $hasil = $p->update($id, $data);
        }else{
            $id = $p->insert($data);
            $hasil = $id != false;
        }
        
        if($hasil == true){
            return redirect()->to(base_url('/peminjaman'));
        }else{
            if($id > 0){
                return redirect()->to(base_url('peminjaman/edit/'.$id));
            }else{
                return redirect()->to(base_url('peminjaman/form'));    
            }
        }
    }
}
