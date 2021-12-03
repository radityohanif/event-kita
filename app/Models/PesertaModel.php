<?php 

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model 
{
    protected $table            = 'peserta';
    protected $allowedFields    = ['username', 'email', 'nama', 'alamat', 'jk', 'no_hp', 'daftar_acara', 'gambar_profil', 'event_saya'];
    
    public function getPeserta($username)
    {
        return $this->where(['username' => $username])->first();
    }

    public function daftarEvent($id_event)
    {
        # ambil data dari tabel peserta
        $peserta = $this->getPeserta($_SESSION['user']['username']);
        # ubah string menjadi array
        $event_saya = explode(",", $peserta['event_saya']);
        # hilangkan elemen terakhir
        array_pop($event_saya);
        # tambah event baru
        array_push($event_saya,  $id_event);
        # tambah anggota dummy kedalam array
        array_push($event_saya,  " ");
        # ubah array menjadi string
        $event_saya = implode(",", $event_saya);
        # update data pada tabel peserta
        $this->update($_SESSION['user']['id'], ['event_saya' => $event_saya]);
    }
}