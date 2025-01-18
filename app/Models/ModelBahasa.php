<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelBahasa extends Model
{
    protected $table = 'bahasa';
    protected $primaryKey = 'id';
    protected $fillable = ['bahasa'];
    public $timestamps = false;

    public function getBahasa()
    {
        return $this->get();
    }

    public function insertBahasa($data)
    {
        return $this->create($data);
    }

    public function getById($id)
    {
        return $this->find($id);
    }
}

