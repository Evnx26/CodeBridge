<?php

namespace App\Http\Controllers;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Session;
class LoginController
{   

    protected $UserModel;
    protected $session;

    public function __construct()
    {   
        
        $this->UserModel = new ModelUser(); 
    }

    public function index(){

        return view("Admin/login");
        
    }

    public function processLoginuser()
    {

        date_default_timezone_set('Asia/Jakarta');

        $email = Request('email');
        $password = Request('password');

        $cek_login = $this->UserModel->cekUseremail($email);

        if ($cek_login) { // Periksa apakah data ditemukan
            $pw_valid = $cek_login['password']; // Ambil password dari database
            if ($password == $pw_valid) { // Cocokkan password
                $newSession = [
                    'id' => $cek_login['id'],
                ];
                session()->put($newSession); // Set session
                session()->flash('success', 'Selamat Anda Berhasil Login'); // Flash data
                return redirect()->to('/cek');
            } else {
                session()->flash('error', 'Username atau Password salah'); // Flash data
                return redirect()->to('/login'); 

            }
        } else {
            session()->flash('error', 'Username atau Password salah'); // Flash data
            return redirect()->to('/login'); 
        }
    }

    public function logout()
    {
        Session::flush(); // Hapus semua data sesi
    return redirect()->to('/login'); 
    }


    //registe
    public function register(){

        return view('User/register');
    }


    public function insert_register()
    {



        
       
        $data = array(
            'nama' => Request('nama'),
            'username' => Request('username'),
            'email' => Request('email'),
            'password' => Request('password'),
            'role' => 'user'
            
        );


        if ($this->UserModel->insertUser($data)) {

            session()->Flash('success', 'Berhasil Mendaftar');

            return redirect()->to('/login');
        } else {
            session()->Flash('error', 'Gagal Menambahkan Data');
            return redirect()->to('/register');
        }
    }


}
