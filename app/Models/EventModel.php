<?php 

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class EventModel extends Model 
{
    protected $table            = 'event';
    protected $allowedFields    = ['username_penyelenggara', 'nama', 'tanggal', 'waktu', 'kuota', 'link_meet', 'deskripsi', 'poster', 'status', 'jumlah_pendaftar'];
    
    public function getEvent($id = false, $disetujui = false)
    {
        if($id == false) 
        {
            if($disetujui == false) {
                /**
                 * Ambil Seluruh Event yang belum disetujui oleh admin
                 */
                return $this->where(['status' => 0])
                            ->findAll();
            }
            else {
                /**
                 * Ambil Seluruh Event yang sudah disetujui oleh admin
                 */
                return $this->where(['status' => 1])
                            ->findAll();
            }
        }

        /**
         * Ambil Sebuah Event spesifik berdasarkan id yang diberikan
         */
        return $this->where(['id' => $id])
                    ->first();
    }

    public function cari($namaEvent)
    {
        return $this->like(['nama' => $namaEvent])
                    ->findAll();
    }

    public function cekWaktu($daftarevent)
    {  
        $datenow = date('Y-m-d');
        $hasil = [];
        foreach($daftarevent as $event)
        {    
            if($datenow > $event['tanggal'])
            {
                array_push($hasil, "Sudah Mulai") ;
            }else
            {
                array_push($hasil, "Belum Mulai") ;
            }
        }
        return $hasil;
    }

    protected function formatHari($day)
    {
        switch ($day) {
            case 'Mon':
                $day = 'Senin';
                break;
            case 'Tue':
                $day = 'Selasa';
                break;
            case 'Wed':
                $day = 'Rabu';
                break;
            case 'Thu':
                $day = 'Kamis';
                break;
            case 'Fri':
                $day = 'Jumat';
                break;
            case 'Sat':
                $day = 'Sabtu';
                break;
            case 'Sun':
                $day = 'Minggu';
                break;
        }

        return $day;
    }

    protected function formatBulan($month)
    {
        switch ($month) {
            case 'Dec':
                $month = 'Desember';
                break;
        }

        return $month;
    }

    public function setJadwalEvent($hari, $waktu)
    {
        $day = date('D', strtotime($hari));
        $tanggal = date('j', strtotime($hari));
        $tahun = date('Y', strtotime($hari));
        $month = date('M', strtotime($hari));
        $time = date('H:i', strtotime($waktu));

        // Ubah format menjadi bahasa indonesia
        $day = $this->formatHari($day);
        $month = $this->formatBulan($month);

        /**
         * Contoh Output :
         * Sabtu, 13 Januari 2021, Pukul 08:00
         */
        return $day . ', ' . $tanggal . ' ' . $month . ' ' . $tahun . ' ' . 'Pukul ' . $time;
    }

    public function setJadwalEvents($daftar_event)
    {
        $result = [];
        foreach($daftar_event as $event)
        {
            array_push($result, $this->setJadwalEvent($event['tanggal'], $event['waktu']));
        }
        return $result;
    }

    public function getEventPopuler()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('event');
        $builder->orderBy('jumlah_pendaftar', 'DESC')->limit(3);
        $query   = $builder->get()->getResultArray();
        return $query;
    }

    public function getPengikut($username)
    {
        $this->builder->selectSum('jumlah_pendaftar')->where(['username_penyelenggara' => $username]);
        return $this->builder->get()->getResultArray();
    }
}