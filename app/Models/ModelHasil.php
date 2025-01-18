<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelHasil extends Model
{
    protected $table = 'hasil_quiz';
    protected $primaryKey = 'id';
    protected $fillable = ['id_user', 'id_kelas', 'id_quiz', 'nama_kelas', 'nama_quiz', 'nilai'];
    public $timestamps = false;

    public function getHasil()
    {
        return $this->get();
    }

    public function insertHasil($data)
    {
        return $this->create($data);
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function isQuizDone($id_user, $id_quiz)
{
    return $this->where('id_user', $id_user)
                ->where('id_quiz', $id_quiz)
                ->get();
}

}

