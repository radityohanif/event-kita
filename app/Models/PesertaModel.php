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

    public function getEventSaya()
    {
        $peserta = $this->getPeserta($_SESSION['user']['username']);    # type:String
        $eventSaya = explode(",", $peserta['event_saya']);              # type:Array
        return $eventSaya;
    }

    public function daftarEvent($id_event)
    {
        $eventSaya = $this->getEventSaya();
        // event belum terdaftar
        array_push($eventSaya,  $id_event);
        $eventSaya = implode(",", $eventSaya);    # ubah array menjadi string
        $this->update(
            $_SESSION['user']['id'], 
            ['event_saya' => $eventSaya]
        );
    }
}