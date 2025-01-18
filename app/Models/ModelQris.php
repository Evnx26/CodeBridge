<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelQris extends Model
{
    protected $table = 'qris';
    protected $primaryKey = 'id';
    protected $fillable = ['foto'];
    public $timestamps = false;

    public function getQris()
    {
        return $this->get();
    }

    public function insertQris($data)
    {
        return $this->create($data);
    }

    public function getById($id)
    {
        return $this->find($id);
    }
}

