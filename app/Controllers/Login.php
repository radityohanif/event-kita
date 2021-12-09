<?php

namespace App\Controllers;

use App\Models\PenyelenggaraModel;
use App\Models\PesertaModel;
use App\Models\UserModel;

class Login extends BaseController
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
            return redirect()->to(base_url($_SESSION['user']['tipe_user']));
        }
        /**
         * Tampilkan view
         */
        $data = [
            'title' => 'EVENTKITA | Login'
        ];
        return view('login/index', $data);
    }

    public function process()
    {
        /**
         * Mengambil variabel input
         * lalu kirimkan kedalam model untuk di autentikasi
         */
        $login = $this->userModel->login([
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ]);


        /*
         * Jika proses login berhasil
         * maka izinkan user masuk kedalam sistem, sesuai dengan rolenya
         */
        if($login == true)
        {
            switch ($_SESSION['user']['tipe_user']) 
            {
                case 'peserta':
                    $peserta = $this->pesertaModel->getPeserta($_SESSION['user']['username']);
                    $_SESSION['user'] += $peserta;
                    $_SESSION['user']['id'] = $peserta['id'];
                    return redirect()->to(base_url('peserta'));
                    break;
                
                case 'penyelenggara':
                    $penyelenggara = $this->penyelenggaraModel->getPenyelenggara($_SESSION['user']['username']);
                    $_SESSION['user'] += $penyelenggara;
                    $_SESSION['user']['id'] = $penyelenggara['id'];
                    return redirect()->to(base_url('penyelenggara'));
                    break;
                
                case 'admin':
                    return redirect()->to(base_url('admin'));
                    break;
            }
            
        }
        /**
         * Jika proses login gagal
         * maka arahkan user kembali ke controller login
         */
        else {  
            session()->setFlashdata('error', 'username atau password salah');
            return redirect()->to(base_url('login'))->withInput(); 
        }
    }
}