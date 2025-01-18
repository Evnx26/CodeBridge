<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelBahasa;
use App\Models\ModelKategori;
use App\Models\ModelKelas;
use App\Models\ModelModul;
use App\Models\ModelQuiz;
use App\Models\ModelPertanyaan;
use App\Models\ModelJawaban;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class KelasController
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
        $this->QuizModel = new ModelQuiz();
    }

    public function index()
    {

       
        

        $data = array(
            'body' => 'Admin.Kelas.list',
            'data' => $this->KelasModel->getKelas(),
            'kategori' => $this->KategoriModel->getKategori(),
            'bahasa' => $this->BahasaModel->getBahasa(),
            
        );
        return view("template", $data);
    }


    public function insert_kelas(Request $request)
    {
        // Log semua input
       
    
        // Validasi file dan input
       
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'author' => 'required|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string',
            'bahasa' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

       
    
        $newName = '';
    
        // Proses file foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $newName = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('foto_kelas'), $newName);
        }
    
        $data = [
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'author' => $request->input('author'),
            'harga' => $request->input('harga'),
            'kategori' => $request->input('kategori'),
            'bahasa' => $request->input('bahasa'),
            'foto' => $newName,
        ];
    

    
        // Masukkan data ke database
        if ($this->KelasModel->insertKelas($data)) {
            session()->flash('success', 'Berhasil Menambahkan Data');
            return redirect()->to('/kelas/list');
        } else {
            session()->flash('error', 'Gagal Menambahkan Data');
            return redirect()->to('/kelas/list');
        }
    }
    

    public function update(Request $request, $id)
{
    // Validasi input dan file
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'author' => 'required|string',
        'harga' => 'required|numeric',
        'kategori' => 'required|string',
        'bahasa' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Foto bisa nullable
    ]);

    $newName = '';

    // Proses file foto jika ada
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $newName = time() . '_' . $foto->getClientOriginalName();
        $foto->move(public_path('foto_kelas'), $newName);
    } else {
        // Jika tidak ada file baru, gunakan foto lama
        $kelas = $this->KelasModel->find($id);
        $newName = $kelas->foto;
    }

    $data = [
        'nama' => $request->input('nama'),
        'deskripsi' => $request->input('deskripsi'),
        'author' => $request->input('author'),
        'harga' => $request->input('harga'),
        'kategori' => $request->input('kategori'),
        'bahasa' => $request->input('bahasa'),
        'foto' => $newName,
    ];

    // Update data di database
    $result = $this->KelasModel->where('id', $id)->update($data);

    if ($result) {
        session()->flash('success', 'Berhasil Memperbarui Data');
        return redirect()->to('/kelas/list');
    } else {
        session()->flash('error', 'Gagal Memperbarui Data');
        return redirect()->to("/kelas/edit/$id");
    }
}






    public function delete($id)
    {
        $this->KelasModel->where('id', $id)->delete();
        return redirect()->to('kelas/list')->with('success', 'Data Deleted Successfully');
    }




    public function manage_kelas($id){


        $data = array(
            'idnya' => $id,
            'body' => 'Admin.Kelas.manage',
            'data_modul' => $this->ModulModel->getByIdKelas($id),
            'data_quiz' => $this->QuizModel->getByIdKelas($id),
        );

        return view('template', $data);

    }


    public function tambah_modul($idnya){

        $data = array(
            'id_kelas' => $idnya,
            'body' => 'Admin.Kelas.tambah_modul'

        );
        return view('template', $data);
    }

    public function insert_modul(Request $request)
    {
        // Validasi input dan file
        $request->validate([
            'id_kelas' => 'required|string|max:255',
            'judul' => 'required|string',
            'subdeskripsi' => 'required|string',
            'deskripsi' => 'required|string', // Ganti dari numeric ke string jika deskripsi berupa teks
            'video' => 'required|mimes:mp4,mkv,avi|max:102400', // Validasi video dengan mimes
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $id = $request->input('id_kelas');
    
        $newNameFoto = '';
        $newNameVideo = '';
    
        // Proses file foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $newNameFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('foto_modul'), $newNameFoto);
        }
    
        // Proses file video jika ada
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $newNameVideo = time() . '_' . $video->getClientOriginalName();
            $video->move(public_path('video_modul'), $newNameVideo);
        }
    
        $data = [
            'id_kelas' => $request->input('id_kelas'),
            'judul' => $request->input('judul'),
            'sub_deskripsi' => $request->input('subdeskripsi'),
            'deskripsi' => $request->input('deskripsi'),
            'video' => $newNameVideo,
            'foto' => $newNameFoto,
        ];
    
        // Masukkan data ke database
        if ($this->ModulModel->insertModul($data)) {
            session()->flash('success', 'Berhasil Menambahkan Data');
            return redirect()->to("/manage/kelas/$id");
        } else {
            session()->flash('error', 'Gagal Menambahkan Data');
            return redirect()->to("/tambah_modul/$id");
        }
    }


    public function modul_edit($id){
        $data = array(
            'body' => "Admin.Kelas.edit_modul",
            'id' => $id,
            'modul' => $this->ModulModel->getById($id) 
        );
        return view('template', $data);
    }


    public function edit_modul(Request $request, $id){
         // Validasi input dan file
    $request->validate([
        'id_kelas' => 'required|string|max:255',
        'judul' => 'required|string',
        'subdeskripsi' => 'required|string',
        'deskripsi' => 'required|string', // Ganti dari numeric ke string jika deskripsi berupa teks
        'video' => 'nullable|mimes:mp4,mkv,avi|max:102400', // Validasi video dengan mimes, nullable karena tidak wajib
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto, nullable karena tidak wajib
    ]);
    
    // Ambil data modul berdasarkan ID
    $modul = $this->ModulModel->find($id);
    if (!$modul) {
        session()->flash('error', 'Modul tidak ditemukan');
        return redirect()->to("/manage/kelas/{$request->input('id_kelas')}");
    }

    // Menyiapkan nama baru untuk foto dan video
    $newNameFoto = $modul->foto;
    $newNameVideo = $modul->video;

    // Proses file foto jika ada dan mengganti file
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $newNameFoto = time() . '_' . $foto->getClientOriginalName();
        $foto->move(public_path('foto_modul'), $newNameFoto);
    }

    // Proses file video jika ada dan mengganti file
    if ($request->hasFile('video')) {
        $video = $request->file('video');
        $newNameVideo = time() . '_' . $video->getClientOriginalName();
        $video->move(public_path('video_modul'), $newNameVideo);
    }

    // Data yang akan diperbarui
    $data = [
        'id_kelas' => $request->input('id_kelas'),
        'judul' => $request->input('judul'),
        'sub_deskripsi' => $request->input('subdeskripsi'),
        'deskripsi' => $request->input('deskripsi'),
        'video' => $newNameVideo,
        'foto' => $newNameFoto,
    ];

    // Perbarui data di database
    if ($modul->update($data)) {
        session()->flash('success', 'Data berhasil diperbarui');
        return redirect()->to("/manage/kelas/{$request->input('id_kelas')}");
    } else {
        session()->flash('error', 'Gagal memperbarui data');
        return redirect()->to("/edit_modul/{$id}");
    }
    }

    public function lihat_modul($id){
        $data = array(
            'body' => "Admin.Kelas.lihat_modul",
            'modul' => $this->ModulModel->getById($id)
        );
        return view('template', $data);
    }




    //Quiz tmbah
    public function tambah_quiz(){

        $nama = Request('nama');
        $id = Request('idnya');
       
        $data = array(
            'id_kelas' => $id,
            'nama' => $nama,
        );


        if ($this->QuizModel->insertQuiz($data)) {

            session()->Flash('success', 'Berhasil Menambahkan Data');

            return redirect()->to('/manage/kelas/' . $id);
        } else {
            session()->Flash('error', 'Gagal Menambahkan Data');
            return redirect()->to('/manage/kelas/' . $id);
        }

    }

    public function pertanyaan($id){

        $data = array(
            'body' => 'Admin.Kelas.manage_pertanyaan',
            'idnya' => $id

        );
        return view('template', $data);

    }


    public function manage_pertanyaan(Request $request, $idnya){


        $questions = $request->input('questions');

        foreach ($questions as $question) {
            // Simpan pertanyaan ke tabel `pertanyaan`
            $pertanyaan = ModelPertanyaan::create([
                'id_quiz' => $idnya, 
                'pertanyaan' => $question['pertanyaan'],
                'jawaban' => $question['jawaban'], 
            ]);

            // Simpan setiap pilihan jawaban ke tabel `jawaban`
            foreach ($question['options'] as $index => $optionText) {
                ModelJawaban::create([
                    'id_pertanyaan' => $pertanyaan->id,
                    'teks_pilihan' => $optionText,
                    'is_correct' => $index == $question['jawaban'] - 1
                ]);
            }
        }

        return redirect()->back()->with('success', 'Quiz berhasil disimpan!');
    }


    public function editPertanyaan($id)
{
    $pertanyaan = ModelPertanyaan::with('jawaban')->where('id_quiz', $id)->get()->toArray();
    $body = "Admin.Kelas.edit_pertanyaan";
    return view('template', compact('pertanyaan', 'id', 'body'));
}

public function updatePertanyaan(Request $request, $id_quiz)
{
    $questions = $request->input('questions');

    foreach ($questions as $key => $question) {
        // Update pertanyaan
        $pertanyaan = ModelPertanyaan::where('id_quiz', $id_quiz)
            ->where('id', $key)
            ->first();
        $pertanyaan->update([
            'pertanyaan' => $question['pertanyaan'],
            'jawaban' => $question['jawaban'],
        ]);

        // Update pilihan jawaban
        foreach ($question['options'] as $index => $optionText) {
            $jawaban = ModelJawaban::where('id_pertanyaan', $pertanyaan->id)
                ->skip($index)
                ->first();
            $jawaban->update([
                'teks_pilihan' => $optionText,
                'is_correct' => $index == $question['jawaban'] - 1
            ]);
        }
    }

    return redirect()->back()
        ->with('success', 'Quiz berhasil diperbarui!');
}


 

    }


    




