<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelKelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'deskripsi', 'author', 'harga', 'kategori', 'bahasa', 'foto'];
    public $timestamps = false;

    public function getKelas()
    {
        return $this->get();
    }

    public function insertKelas($data)
    {
        return $this->create($data);
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function countKelas()
    {
        return $this->count();
    }

    public function getLimited($limit = 6)
{
    return $this->orderBy('id', 'DESC')->limit($limit)->get();
}

public function getPaginatedKelas($perPage = 6)
{
    return $this->orderBy('id', 'DESC')->paginate($perPage);
}


}

