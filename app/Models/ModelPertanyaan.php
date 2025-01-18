<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $primaryKey = 'id';
    protected $fillable = ['id_quiz', 'pertanyaan', 'jawaban'];
    public $timestamps = false;

    public function getPertanyaan()
    {
        return $this->get();
    }

    public function insertPertanyaan($data)
    {
        return $this->create($data);
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function jawaban()
{
    return $this->hasMany(ModelJawaban::class, 'id_pertanyaan');
}



    
}

