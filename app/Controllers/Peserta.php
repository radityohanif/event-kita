<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\PesertaModel;
use Config\Database;

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
        $daftar_event = $this->eventModel->getEvent(false, true);
        $data = [
            'title' => 'EVENTKITA | Daftar Event',
            'daftar_event' => $daftar_event,
            'jadwal_event' => $this->eventModel->setJadwalEvents($daftar_event),
            'statusMulai' => $this->eventModel->cekWaktu($daftar_event)
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
            'event' => $this->eventModel->getEvent($id, true),
            'eventSaya' => $this->pesertaModel->getEventSaya()
        ];
        
        # Buat format jadwal event menggunakan model
        $jadwalEvent = $this->eventModel->setJadwalEvents([$data['event']]);

        # Status Mulai
        $statusMulai = $this->eventModel->cekWaktu([$data['event']]);

        # push
        $data += [
            'jadwalEvent' => $jadwalEvent[0],
            'statusMulai' => $statusMulai[0]
        ];

        
        return view('peserta/detail', $data);
    }

    public function daftar()
    {
        $id_event = $this->request->getVar('id');
        $this->pesertaModel->daftarEvent($id_event);
        
        // update jumlah pendaftar di tabel event
        $db = Database::connect();
        $sql = "UPDATE `event` SET `jumlah_pendaftar` = jumlah_pendaftar + 1 WHERE `event`.`id` = $id_event;";
        $db->query($sql);
        
        session()->setFlashdata('success', 'Kamu berhasil mendaftar event, silahkan liat di menu event saya 😀');
        return redirect()->to(base_url('peserta/daftarEvent'));
    }

    public function eventSaya()
    {
        $data = [
            'title' => 'Daftar Event Saya'
        ];

        # Ambil semua data event yang sudah saya daftar
        $data['daftar_event'] = [];
        foreach($this->eventModel->getEvent(false, true) as $event)
        {
            if(in_array($event['id'], $this->pesertaModel->getEventSaya()))
            {
                array_push($data['daftar_event'], $event);
            }
        }
        $data += [
            'jadwal_event' => $this->eventModel->setJadwalEvents($data['daftar_event']),
            'statusMulai' => $this->eventModel->cekWaktu($data['daftar_event'])
        ];

        return view('peserta/eventSaya', $data);
    }
}