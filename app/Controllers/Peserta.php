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
        if(isset($_SESSION['user']['tipe_user']))  {
            if ($_SESSION['user']['tipe_user'] != 'peserta' ) {
                return redirect()->to(base_url($_SESSION['user']['tipe_user']));
            }
        }
        else {
            return redirect()->to(base_url());
        }
        /**
         * Siapkan data
         */
        $data = [
            'title' => 'EVENTKITA | Halaman Peserta ',
            'event_populer' => $this->eventModel->getEventPopuler()
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

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Event',
            'event' => $this->eventModel->getEvent($id, true)
        ];
        // Buat format jadwal event menggunakan model
        $jadwalEvent = $this->eventModel->setJadwalEvent(
            $data['event']['tanggal'],
            $data['event']['waktu']
        );

        // push jadwal event kedalam data agar bisa ditampilkan di view
        $data += ['jadwalEvent' => $jadwalEvent];
        
        return view('peserta/detail', $data);
    }

    public function daftar()
    {
        $id_event = $this->request->getVar('id');
        $this->pesertaModel->daftarEvent($id_event);
        return redirect()->to(base_url('peserta/daftarEvent'));
    }

    public function eventSaya()
    {
        dd($_SESSION['user']['event_saya']);
    }
}