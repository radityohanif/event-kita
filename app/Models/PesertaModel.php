<?php 

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model 
{
    protected $table            = 'peserta';
    protected $allowedFields    = ['username', 'email', 'nama', 'alamat', 'jk', 'no_hp', 'daftar_acara', 'gambar_profil'];
    
    public function getPeserta($username)
    {
        return $this->where(['username' => $username])->first();
    }
}