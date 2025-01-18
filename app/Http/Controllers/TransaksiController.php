<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelBahasa;
use App\Models\ModelKategori;
use App\Models\ModelTransaksi;
use App\Models\ModelQris;
use Illuminate\Http\Request;

class TransaksiController
{

    protected $UserModel;
    protected $session;
    protected $BahasaModel;
    protected $KategoriModel;
    protected $TransaksiModel;
    protected $QrisModel;

    public function __construct()
    {

        $this->UserModel = new ModelUser();
        $this->BahasaModel = new ModelBahasa();
        $this->KategoriModel = new ModelKategori();
        $this->TransaksiModel = new ModelTransaksi();
        $this->QrisModel = new ModelQris();
    }

    // Admin
    public function index()
    {$user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }

        $data = array(
            'body' => 'Admin.Transaksi.list',
            'data' => $this->TransaksiModel->getTransaksi()
        );
        return view("template", $data);
    }

    public function update($id)
    {$user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }

        // Ambil nilai dari dropdown
        $status = Request('status');

        // Tentukan nilai status berdasarkan pilihan
        if ($status === 'tolak') {
            $data['status'] = 'ditolak';
        } elseif ($status === 'terima') {
            $data['status'] = 'aktif';
        }elseif ($status === 'batalkan') {
            $data['status'] = 'dibatalkan';
        }

        // Lakukan update ke database
        $result = $this->TransaksiModel->where('id', $id)->update($data);

        // Redirect dengan pesan
        if ($result) {
            return redirect()->to('transaksi/list')->with('success', 'Data Updated Successfully');
        } else {
            return redirect()->to('transaksi/edit/' . $id)->with('error', 'Data Update Failed');
        }
    }


    public function delete($id)
    {$user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }

        $this->TransaksiModel->where('id', $id)->delete();
        return redirect()->to('transaksi/list')->with('success', 'Data Deleted Successfully');
    }




    //user
    public function index_user()
    {
        $data = array(
            'body' => 'User.history_transaksi',
            'data' => $this->TransaksiModel->getByIdUser(session('id'))
        );

        return view('template_user', $data);

    }

    public function update_user($id)
    {$user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }

        // Ambil nilai dari dropdown
        $status = Request('status');

        // Tentukan nilai status berdasarkan pilihan
        if ($status === 'tolak') {
            $data['status'] = 'ditolak';
        } elseif ($status === 'terima') {
            $data['status'] = 'aktif';
        }elseif ($status === 'batalkan') {
            $data['status'] = 'dibatalkan';
        }

        // Lakukan update ke database
        $result = $this->TransaksiModel->where('id', $id)->update($data);

        // Redirect dengan pesan
        if ($result) {
            return redirect()->to('/history/transaksi')->with('success', 'Data Updated Successfully');
        } else {
            return redirect()->to('/history/transaksi' . $id)->with('error', 'Data Update Failed');
        }
    }
 
    public function indexqris(){
        $user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }

        $data = array(
            'data' => $this->QrisModel->getQris(),
            'body' => 'Admin.Transaksi.qris'
        );
        return view('template', $data);

    }

    public function updateqris(Request $request ,$id){
        $newName = '';

        $user = $this->UserModel->getById(session('id'));
        if (!$user) {
            return redirect()->to('errorpage');
        }


        // Proses file foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $newName = time() . '_' . $foto->getClientOriginalName(); // Buat nama file unik
            $foto->move(public_path('foto_qris/'), $newName); // Pindahkan file ke folder tujuan
        } else {
            // Jika tidak ada file baru, gunakan foto lama
            $kelas = $this->QrisModel->find($id);
            $newName = $kelas->foto; // Ambil nama file lama dari database
        }
    
        // Data yang akan diupdate
        $data = [
            'foto' => $newName // Pastikan menyimpan nama file yang benar
        ];
    
        // Update database
        $result = $this->QrisModel->where('id', $id)->update($data);
    
        // Redirect dengan pesan sukses atau gagal
        if ($result) {
            return redirect()->to('qris/list')->with('success', 'Data Updated Successfully');
        } else {
            return redirect()->to('qris/list')->with('error', 'Data Update Failed');
        }
    }

}




