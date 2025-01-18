<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelTransaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = ['id_kelas', 'id_user', 'nama_user', 'nama_kelas', 'harga', 'status', 'foto', 'foto_kelas'];
    public $timestamps = false;

    public function getTransaksi()
    {
        return $this->get();
    }

    public function insertTransaksi($data)
    {
        return $this->create($data);
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function getByIdUser($id_user)
    {
        return $this->where('id_user', $id_user)->get();
    }

}

