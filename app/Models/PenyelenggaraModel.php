<?php 

namespace App\Models;

use CodeIgniter\Model;

class PenyelenggaraModel extends Model 
{
    protected $table            = 'penyelenggara';
    protected $allowedFields    = ['username', 'email', 'nama', 'alamat', 'no_hp', 'daftar_acara', 'gambar_profil', 'background'];

    public function getPenyelenggara($username)
    {
        return $this->where(['username' => $username])->first();
    }
}