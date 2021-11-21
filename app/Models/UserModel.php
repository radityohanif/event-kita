<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model 
{
    protected $table            = 'user';
    protected $allowedFields    = ['username', 'email', 'password', 'tipe_user'];

    public function login($input) 
    {
        /* 
        1. Kirim query 
            SELECT * FROM user WHERE username = $username
            ke Database.. 
        */
        $queryResult = $this->where(['username' => $input['username']])->first();
        if ($queryResult != null) 
        {
            /*
            2. Jika username terdaftar, 
                maka periksa passwordnya
            */
            if (password_verify($input['password'], $queryResult['password'])) 
            {
                /* 
                    Proses login BERHASIL
                */
                $_SESSION['user'] = $queryResult;
                return true;
            }
        }
        else 
        {
            /* 
                Proses login GAGAL
                kirim pesan kesalahan ke halaman login
            */
            return false;
        }
    }
}