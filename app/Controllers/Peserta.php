<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\PesertaModel;

class Peserta extends BaseController
{
    protected $pesertaModel;
    protected $eventModel;
    
    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        /** 
         * Periksa variabel session, 
         * pastikan yang boleh mengakses controller ini hanya user dengan role peserta saja
        */
        if(isset($_SESSION['user']['tipe_user'])) 
        {
            switch ($_SESSION['user']['tipe_user']) 
            {
                case 'penyelenggara':
                    return redirect()->to(base_url('penyelenggara'));
                    break;
            }
        }
        /**
         * Tampilkan view
         */
        $data = [
            'title' => 'EVENTKITA | Halaman Peserta '
        ];
        return view('peserta/index', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'EVENTKITA | Profil Saya',
        ];
        return view('peserta/profil', $data);
    }

    public function daftarEvent() 
    {
        $hasilquery = $this->eventModel->getEvent(false, true);
        $data = [
            'title' => 'EVENTKITA | Daftar Event',
            'daftar_event' => $hasilquery,
            'statusMulai' => $this->eventModel->cekWaktu($hasilquery)
        ];
        return view('peserta/daftarEvent', $data);
    }

    public function cariEvent()
    {
        $nama_event = $this->request->getVar('search'); 
        $hasilquery = $this->eventModel->getEvent(false, true);
        $data = [
            'title' => 'EVENTKITA | Daftar Event',
            'daftar_event' => $this->eventModel->cari($nama_event),
            'statusMulai' => $this->eventModel->cekWaktu($hasilquery)
        ];
        return view('peserta/daftarEvent', $data);
    }   
}