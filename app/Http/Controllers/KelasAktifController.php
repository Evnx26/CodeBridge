<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelBahasa;
use App\Models\ModelKategori;
use App\Models\ModelTransaksi;
use App\Models\ModelKelas;
use App\Models\ModelQuiz;
use App\Models\ModelModul;
use App\Models\ModelPertanyaan;
use App\Models\ModelJawaban;
use App\Models\ModelHasil;
use Illuminate\Http\Request;

class KelasAktifController
{ 

    protected $UserModel;
    protected $session;
    protected $BahasaModel;
    protected $KategoriModel;
    protected $TransaksiModel;
    protected $KelasModel;
    protected $ModulModel;
    protected $QuizModel;
    protected $PertanyaanModel;
    protected $JawabanModel;
    protected $HasilModel;

    public function __construct()
    {

        $this->UserModel = new ModelUser();
        $this->BahasaModel = new ModelBahasa();
        $this->KategoriModel = new ModelKategori();
        $this->TransaksiModel = new ModelTransaksi();
        $this->KelasModel = new ModelKelas();
        $this->ModulModel = new ModelModul();
        $this->QuizModel = new ModelQuiz();
        $this->PertanyaanModel = new ModelPertanyaan();
        $this->JawabanModel= new ModelJawaban();
        $this->HasilModel = new ModelHasil();
    }

    // Admin
    public function index(Request $request)
    {
       
        $data = array(
            'body' => 'User.kelas_aktif',
            'data_kelas' => $this->TransaksiModel->getByIdUser(session('id'))
        );
        return view("template_user", $data);
    }

    public function ruang_kelas ($id)  { 

        $data_quizx =  $this->QuizModel->getByIdKelas($id);
        
        foreach ($data_quizx as $quiz) {
            $quiz->is_done = $this->HasilModel->isQuizDone(session('id'), $quiz->id);
        }

        $data = array (
            'data_kelas' => $this->KelasModel->getById($id),
            'data_modul' => $this->ModulModel->getByIdKelas($id),
            'data_quiz' => $this->QuizModel->getByIdKelas($id),
            'body'=> 'User.ruang_kelas',
            'data_quizx' => $data_quizx
        );
        return view('template_user', $data);
    }

    public function ruang_ujian($id){
        
        $pertanyaan = $this->PertanyaanModel::with('jawaban')->where('id_quiz', $id)->get()->toArray();
        $body = 'User.ruang_quiz';
        $data_quiz = $this->QuizModel->getById($id);
        $data_kelas = $this->KelasModel->getById($data_quiz->id_kelas);
        $data_user = $this->UserModel->getById(session('id'));
        return view('template_user', compact('pertanyaan', 'id', 'body', 'data_quiz', 'data_kelas', 'data_user'));
  
    }

    public function submit_ujian(Request $request)
{
       // Mengambil data jawaban yang dipilih dari form
    $answers = $request->input('answers', []);

 

     // Mengambil data jawaban yang dipilih dari form
     $answers = $request->input('answers', []);

     // Mengambil jawaban yang benar berdasarkan id dari tabel 'jawaban'
     $correctAnswers = $this->JawabanModel::whereIn('id', $answers)
                                   ->where('is_correct', 1)
                                   ->count();
    $WrongAnswers = $this->JawabanModel::whereIn('id', $answers)
                                   ->where('is_correct', 0)
                                   ->count();
    $jumlah_soal = $WrongAnswers + $correctAnswers;
    $nilai =  (100/$jumlah_soal) * $correctAnswers;
    
    $data = [
        'id_user' => $request->input('id_user'),
        'id_kelas' => $request->input('id_kelas'),
        'id_quiz' => $request->input('id_quiz'),
        'nama_kelas' => $request->input('nama_kelas'),
        'nama_quiz' => $request->input('nama_quiz'),
        'nilai' => $nilai,
        
    ];

    // Masukkan data ke database
    if ($this->HasilModel->insertHasil($data)) {
        session()->flash('success', 'Berhasil submit Ujian');
        return redirect()->to('/ruang/kelas/' . $data['id_kelas']);
    } else {
        session()->flash('error', 'Gagal Menambahkan Data');
        return redirect()->back();
    }
     
                            

     
}

public function hasil_quiz($id){

    $data = array(
        'data' => $this->HasilModel->isQuizDone(session('id'), $id),
        'body' => "User.hasilquiz"
    ); 
    return view('template_user', $data);
}


   

}
