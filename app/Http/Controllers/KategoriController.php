<?php

namespace App\Http\Controllers;
use App\Models\ModelUser;
use App\Models\ModelBahasa;
use App\Models\ModelKategori;
use GuzzleHttp\Psr7\Request;

class KategoriController
{

    protected $UserModel;
    protected $session;
    protected $BahasaModel;
    protected $KategoriModel;

    public function __construct()
    {   
        
        $this->UserModel = new ModelUser();
        $this->BahasaModel = new ModelBahasa();
        $this->KategoriModel = new ModelKategori(); 
    }

    public function index(){

        $user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }

            $data = array(
                'body' => 'Admin.Kategori.list',
                'data' => $this->KategoriModel->getKategori()
            );
        return view("template", $data);
    }


    public function insert_kategori()
    {
        $user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }



        $kategori = Request('kategori');
       
        $data = array(

            'kategori' => $kategori,
        );


        if ($this->KategoriModel->insertKategori($data)) {

            session()->Flash('success', 'Berhasil Menambahkan Data');

            return redirect()->to('/kategori/list');
        } else {
            session()->Flash('error', 'Gagal Menambahkan Data');
            return redirect()->to('/kategori/list');
        }
    }

    public function update($id)
    {

        $user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }


        $data = [
            'kategori' => Request('kategori')
        ];
    
        $result = $this->KategoriModel->where('id', $id)->update($data);
    
        if ($result) {
            return redirect()->to('kategori/list')->with('success', 'Data Updated Successfully');
        } else {
            return redirect()->to('kategori/edit/')->with('error', 'Data Update Failed');
        }
    }
    




    public function delete($id)
    {
        $user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }


        $this->KategoriModel->where('id', $id)->delete();
        return redirect()->to('kategori/list')->with('success', 'Data Deleted Successfully');
    }
    
    
}
