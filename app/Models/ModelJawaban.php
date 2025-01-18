<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelJawaban extends Model
{
    protected $table = 'jawaban';
    protected $primaryKey = 'id';
    protected $fillable = ['id_pertanyaan', 'teks_pilihan', 'is_correct'];
    public $timestamps = false;

    public function getJawaban()
    {
        return $this->get();
    }

    public function insertJawaban($data)
    {
        return $this->create($data);
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    
    
}

