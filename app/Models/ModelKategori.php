<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelKategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = ['kategori'];
    public $timestamps = false;

    public function getKategori()
    {
        return $this->get();
    }

    public function insertKategori($data)
    {
        return $this->create($data);
    }

    public function getById($id)
    {
        return $this->find($id);
    }
}

