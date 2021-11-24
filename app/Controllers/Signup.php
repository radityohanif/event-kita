<?php

namespace App\Controllers;

use App\Models\PenyelenggaraModel;
use App\Models\UserModel;
use App\Models\PesertaModel;

class Signup extends BaseController
{
    protected $userModel;
    protected $pesertaModel;
    protected $penyelenggaraModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pesertaModel = new PesertaModel();
        $this->penyelenggaraModel = new PenyelenggaraModel();
    }

    public function index()
    {
        /** 
         * Periksa variabel session, 
         * jika sudah ada yang login 
         * maka arahkan ke halaman sesudah login saja
        */
        if(isset($_SESSION['user']['tipe_user'])) 
        {
            switch ($_SESSION['user']['tipe_user']) 
            {
                case 'peserta':
                    return redirect()->to(base_url('/peserta'));
                    break;
                case 'penyelenggara':
                    return redirect()->to(base_url('/penyelenggara'));
                    break;
            }
        }
        /** 
         * Tampilkan view
        */
        $data = [
            'title' => 'EVENTKITA | Signup',
            'validator' => \Config\Services::validation()  
        ];
        return view('signup/index', $data);
    }

    public function process()
    {
        /** 
         * Validasi data input
        */
        $rules = [
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'nama belum diisi',
                    'alpha_space' => 'nama hanya boleh mengandung karakter abjad dan spasi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'email belum diisi',
                    'valid_email' => 'pastikan format email yang kamu tulis benar', 
                    'is_unique' => 'email sudah digunakan'
                ]
            ],
            'username' => [
                'rules' => 'required|alpha|is_unique[user.username]',
                'errors' => [
                    'required' => 'username belum diisi',
                    'alpha' => 'pastikan username hanya mengandung karakter abjad saja',
                    'is_unique' => 'username sudah digunakan'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'password belum diisi',
                    'min_length' => 'minimal password terdiri dari 8 karakter'
                ]
            ],
            'konfirmasi_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'konfirmasi password belum diisi',
                    'matches' => 'konfirmasi password salah'
                ]
            ]
        ];
        if($this->validate($rules) == false) 
        {
            /**
             * Jika validasi gagal, 
             * maka kirimkan pesan kesalahan ke view signup
             */
            return redirect()->to(base_url('signup'))->withInput();
        }
        
        /**
         * Jika validasi berhasil
         * Simpan data ke dalam database
         */

        // Tabel user
        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'tipe_user' => $this->request->getVar('tipe_user')
        ]);
        
        switch($this->request->getVar('tipe_user')) 
        {
            // Tabel peserta 
            case 'peserta':
                $this->pesertaModel->save([
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'nama' => $this->request->getVar('nama')
                ]);
                break;
            // Tabel Penyelenggara
            case 'penyelenggara':
                $this->penyelenggaraModel->save([
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'nama' => $this->request->getVar('nama')
                ]);
                break;
        }
        
        /**
         * Proses signup berakhir
         * kirim pesan berhasil dan arahkan ke controller login
         */
        session()->setFlashdata('success', 'pendafataran akun berhasil, silahkan login');
        return redirect()->to(base_url('login'));
    }
}