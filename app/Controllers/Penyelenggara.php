<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\PenyelenggaraModel;

class Penyelenggara extends BaseController
{
    protected $penyelenggaraModel;
    protected $eventModel;
    
    public function __construct()
    {
        $this->penyelenggaraModel = new PenyelenggaraModel();
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        /** 
         * Periksa variabel session, 
         * pastikan yang boleh mengakses controller ini hanya user dengan role penyelenggara saja
        */
        if(isset($_SESSION['user']['tipe_user'])) 
        {
            switch ($_SESSION['user']['tipe_user']) 
            {
                case 'peserta':
                    return redirect()->to(base_url('peserta'));
                    break;
            }
        }
        /**
         * Tampilkan session
         */
        $data = [
            'title' => 'EVENTKITA | Halaman Penyelenggara '
        ];
        return view('penyelenggara/index', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'EVENTKITA | Profil Saya',
        ];
        return view('penyelenggara/profil', $data);
    }

    public function pengajuan()
    {
        $data = [
            'title' => 'EVENTKITA | Pengajuan Event'
        ];
        return view('penyelenggara/pengajuan', $data);
    }

    public function uploadPengajuan()
    {
        $this->eventModel->save([
            'nama' => $this->request->getVar('nama'),
            'tanggal' => $this->request->getVar('tanggal'),
            'waktu' => $this->request->getVar('waktu'),
            'kuota' => $this->request->getVar('kuota'),
            'link_meet' => $this->request->getVar('link'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'poster' => 'default.jpeg',
            'username_penyelenggara' => $_SESSION['user']['username']
        ]);

        /**
         * Proses upload event berakhir
         * kirim pesan sukses dan arahkan ke controller penyelenggara
         */
        session()->setFlashdata('success', 'Event berhasil diupload, silahkan tunggu konfirmasi dari pihak EventKita 😀');
        return redirect()->to(base_url('penyelenggara'));
    }
}