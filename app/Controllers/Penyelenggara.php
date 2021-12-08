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
        if(isset($_SESSION['user']['tipe_user']))  {
            if ($_SESSION['user']['tipe_user'] != 'penyelenggara' ) {
                return redirect()->to(base_url($_SESSION['user']['tipe_user']));
            }
        }
        else {
            return redirect()->to(base_url());
        }
        /**
         * Tampilkan view
         */
        $data = [
            'title' => 'Dashboard ' . $_SESSION['user']['nama'] ,
            'validator' => \Config\Services::validation(),
            'daftar_event' => $this->eventModel->where(['username_penyelenggara' => $_SESSION['user']['username']])->findAll(),
            'pengikut' => $this->eventModel->getPengikut($_SESSION['user']['username'])
        ];
        
        /**
         * Menghitung jumlah pengikut
         */

        $data += [
            'jadwal_event' => $this->eventModel->setJadwalEvents($data['daftar_event']),
            'statusMulai' => $this->eventModel->cekWaktu($data['daftar_event'])
        ];
        
        return view('penyelenggara/dashboard', $data);
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
        /** 
         * Validasi data input
        */
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama event belum diisi',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal event belum diisi',
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu event belum diisi',
                ]
            ],
            'kuota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kuota event belum diisi',
                ]
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link event belum diisi',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi event belum diisi',
                ]
            ],
            'poster' => [
                'rules' => 'uploaded[poster]|mime_in[poster,image/jpg,image/jpeg,image/png]|max_size[poster,2048]',
                'errors' => [
                    'uploaded' => 'Poster event belum diupload',
                    'mime_in' => 'Format gambar yang diizinkan hanya jpg, jpeg dan png',
                    'max_size' => 'Ukuran gambar maksimum 2 MB'
                ]
            ],
        ];
        if($this->validate($rules) == false) 
        {
            /**
             * Jika validasi gagal, 
             * maka kirimkan pesan kesalahan ke view pengajuan event
             */
            return redirect()->to(base_url('penyelenggara'))->withInput();
        }
        
        /**
         * Jika validasi berhasil
         * Simpan data ke dalam database
         */

        // ambil gambar
        $filePoster = $this->request->getFile('poster');
        // pindahkan file ke folder img/poster webinar
        $filePoster->move('img/poster webinar');

        $this->eventModel->save([
            'nama' => $this->request->getVar('nama'),
            'tanggal' => $this->request->getVar('tanggal'),
            'waktu' => $this->request->getVar('waktu'),
            'kuota' => $this->request->getVar('kuota'),
            'link_meet' => $this->request->getVar('link'),
            'deskripsi' => nl2br($this->request->getVar('deskripsi')),
            'poster' => $filePoster->getName(),
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