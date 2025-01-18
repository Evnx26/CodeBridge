<?php

namespace App\Http\Controllers;
use App\Models\ModelUser;
use App\Models\ModelBahasa;
use GuzzleHttp\Psr7\Request;

class BahasaController
{

    protected $UserModel;
    protected $session;
    protected $BahasaModel;

    public function __construct()
    {   
        
        $this->UserModel = new ModelUser();
        $this->BahasaModel = new ModelBahasa(); 
    }

    public function index(){

        $user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }

            $data = array(
                'body' => 'Admin.Bahasa.list',
                'data' => $this->BahasaModel->getBahasa()
            );
        return view("template", $data);
    }


    public function insert_bahasa()
    {
        $user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }



        $bahasa = Request('bahasa');
       
        $data = array(

            'bahasa' => $bahasa,
        );


        if ($this->BahasaModel->insertBahasa($data)) {

            session()->Flash('success', 'Berhasil Menambahkan Data');

            return redirect()->to('/bahasa/list');
        } else {
            session()->Flash('error', 'Gagal Menambahkan Data');
            return redirect()->to('/bahasa/list');
        }
    }

    public function update($id)
    {
        $user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }

        $data = [
            'bahasa' => Request('bahasa')
        ];
    
        $result = $this->BahasaModel->where('id', $id)->update($data);
    
        if ($result) {
            return redirect()->to('bahasa/list')->with('success', 'Data Updated Successfully');
        } else {
            return redirect()->to('bahasa/edit/')->with('error', 'Data Update Failed');
        }
    }
    




    public function delete($id)
    {
        $user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }

        $this->BahasaModel->where('id', $id)->delete();
        return redirect()->to('bahasa/list')->with('success', 'Data Deleted Successfully');
    }
    
    
}
