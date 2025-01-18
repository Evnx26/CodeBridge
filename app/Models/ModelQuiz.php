<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelQuiz extends Model
{
    protected $table = 'quiz';
    protected $primaryKey = 'id';
    protected $fillable = ['id_kelas', 'nama'];
    public $timestamps = false;

    public function getQuiz()
    {
        return $this->get();
    }

    public function insertQuiz($data)
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

    public function countByIdKelas($id_kelas)
{
    return $this->where('id_kelas', $id_kelas)->count();
}

}

