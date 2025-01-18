<?php

namespace App\Http\Controllers;
use App\Models\ModelUser;
use App\Models\ModelBahasa;
use App\Models\ModelKategori;
use App\Models\ModelKelas;
use App\Models\ModelModul;
use App\Models\ModelQuiz;
use App\Models\ModelTransaksi;
use Illuminate\Http\Request;

class HomeController
{

    protected $UserModel;
    protected $session;
    protected $BahasaModel;
    protected $KategoriModel;
    protected $KelasModel;
    protected $ModulModel;
    protected $QuizModel;
    protected $TransaksiModel;

    public function __construct()
    {   
        
        $this->UserModel = new ModelUser(); 
        $this->BahasaModel = new ModelBahasa();
        $this->KategoriModel = new ModelKategori();
        $this->KelasModel = new ModelKelas();
        $this->ModulModel = new ModelModul();
        $this->QuizModel= new ModelQuiz();
        $this->TransaksiModel = new ModelTransaksi();
    }

    public function index(){
            $data = array(
                'body' => 'Admin.dashboard',
                'data' => $this->UserModel->getById(session('id')),
                'jumlah_user' => $this->UserModel->countUsersByRole(),
                'jumlah_kelas' => $this->KelasModel->countKelas(),
                'jumlah_modul' => $this->ModulModel->countModul() 
            );
        return view("template", $data);
        
    }
    
    
    //for user
    public function index_user(){

        $data = array(
            'body' => 'User.dashboard',
            'data' => $this->UserModel->getById(session('id')),
            'data_kelas' =>$this->KelasModel->getLimited(6),
        );

        return view('template_user', $data);

    }

    public function daftar_kelas(Request $request)
{
    $keyword = $request->input('keyword');
    $bahasa = $request->input('bahasa');
    $kategori = $request->input('kategori');

    $query = $this->KelasModel->query();

    // Filter berdasarkan keyword
    if ($keyword) {
        $query->where('nama', 'like', '%' . $keyword . '%')
              ->orWhere('bahasa', 'like', '%' . $keyword . '%')
              ->orWhere('kategori', 'like', '%' . $keyword . '%');
    }

    // Filter berdasarkan bahasa
    if ($bahasa) {
        $query->where('bahasa', $bahasa);
    }

    // Filter berdasarkan kategori
    if ($kategori) {
        $query->where('kategori', $kategori);
    }

    $data = array(
        'body' => 'User.daftar_kelas',
        'data' => $this->UserModel->getById(session('id')),
        'data_kelas' => $query->paginate(9)->appends($request->all()), // Tambahkan semua input ke pagination
        'list_bahasa' => $this->BahasaModel->getBahasa(), // Ambil data bahasa
        'list_kategori' => $this->KategoriModel->getKategori() // Ambil data kategori
    );

    return view('template_user', $data);
}

//user detail kelas
public function detail_kelas($id){

    $data = array(
        'body' => 'User.detail_kelas',
        'jumlah_modul' => $this->ModulModel->countByIdKelas($id),
        'jumlah_quiz' => $this->QuizModel->countByIdKelas($id),
        'data' => $this->KelasModel->getById($id),
        'user' => $this->UserModel->getById(session('id'))
    );
    return view('template_user', $data);
}

//
public function insert_beli_kelas(Request $request){

    $request->validate([
        'id_kelas' => 'required|string|max:255',
        'id_user' => 'required|string|max:255',
        'nama_kelas' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'nama_user' => 'required|string|max:255',
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);


    $newName = '';

    $idkelas = $request->input('id_user');
    $idkelas = $request->input('id_kelas');

    // Proses file foto jika ada
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $newName = time() . '_' . $foto->getClientOriginalName();
        $foto->move(public_path('foto_transaksi'), $newName);
    }

    $data = [
        'id_kelas' => $request->input('id_kelas'),
        'id_user' => $request->input('id_user'),
        'nama_user' => $request->input('nama_user'),
        'nama_kelas' => $request->input('nama_kelas'),
        'harga' => $request->input('harga'),
        'foto' => $newName,
        'foto_kelas' => $request->input('foto_kelas'),
        'status' => 'pending'
    ];



    // Masukkan data ke database
    if ($this->TransaksiModel->insertTransaksi($data)) {
        session()->flash('success', 'Berhasil Menambahkan Data');
        return redirect()->to('/daftar/kelas');
    } else {
        session()->flash('error', 'Gagal Menambahkan Data');
        return redirect()->to('/beli/kelas/' . $idkelas );
    }


}


}
