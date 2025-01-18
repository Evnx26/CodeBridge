<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelUser extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'username', 'email' ,'password', 'role'];
    public $timestamps = false;

        public function getUser() 
        {
            return $this->get();
        }

    public function cekUseremail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function insertUser($data)
    {
        return $this->create($data);
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function countUsersByRole()
{
    return $this->where('role', 'user')->count();
}

}

