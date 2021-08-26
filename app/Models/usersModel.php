<?php

namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{
    protected $table ='users';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama','username','password','alamat','role_id'];

    public function getLogin($username)
    {
           return $this->where(['username' => $username])
           ->get()->getRowArray();
    }
}