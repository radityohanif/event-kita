<?php 

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model 
{
    protected $table            = 'event';
    protected $allowedFields    = ['username_penyelenggara', 'nama', 'tanggal', 'waktu', 'kuota', 'link_meet', 'deskripsi', 'poster', 'disetujui'];
    
    public function getEvent($id = false, $disetujui = false)
    {
        if($id == false) 
        {
            if($disetujui == false) {
                /**
                 * Ambil Seluruh Event yang belum disetujui oleh admin
                 */
                return $this->where(['disetujui' => 0])
                            ->findAll();
            }
            else {
                /**
                 * Ambil Seluruh Event yang sudah disetujui oleh admin
                 */
                return $this->where(['disetujui' => 1])
                            ->findAll();
            }
        }

        /**
         * Ambil Sebuah Event spesifik berdasarkan id yang diberikan
         */
        return $this->where(['id' => $id])
                    ->first();
    }
}