<?php

namespace App\Http\Controllers;
use App\Models\ModelUser;
use App\Models\ModelBahasa;
use App\Models\ModelKategori;
use App\Models\ModelKelas;
use App\Models\ModelModul;

class CekController
{

    protected $UserModel;
    protected $session;
    protected $BahasaModel;
    protected $KategoriModel;
    protected $KelasModel;
    protected $ModulModel;
    protected $QuizModel;

    public function __construct()
    {   
        
        $this->UserModel = new ModelUser(); 
        $this->BahasaModel = new ModelBahasa();
        $this->KategoriModel = new ModelKategori();
        $this->KelasModel = new ModelKelas();
        $this->ModulModel = new ModelModul();
    }

    public function index(){
            $data = array(
                
                'data' => $this->UserModel->getById(session('id')),
                'jumlah_user' => $this->UserModel->countUsersByRole(),
                'jumlah_kelas' => $this->KelasModel->countKelas(),
                'jumlah_modul' => $this->ModulModel->countModul() 
            );
        return view("hakakses", $data);
        
    }

    public function landingpage(){
        return view('index');
    }
    

    public function errorpage(){

        return view('galat');
    }
    
    
}
