<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelModul extends Model
{
    protected $table = 'modul';
    protected $primaryKey = 'id';
    protected $fillable = ['id_kelas', 'judul', 'sub_deskripsi', 'deskripsi', 'video', 'foto'];
    public $timestamps = false;

    public function getModul()
    {
        return $this->get();
    }

    public function insertModul($data)
    {
        return $this->create($data);
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function getByIdKelas($id_kelas)
    {
        return $this->where('id_kelas', $id_kelas)->get();
    }

    public function countModul(){
        return $this->count();
    }

    public function countByIdKelas($id_kelas)
    {
        return $this->where('id_kelas', $id_kelas)->count();
    }
}

