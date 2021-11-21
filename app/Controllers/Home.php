<?php

namespace App\Controllers;

class Home extends BaseController
{

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
                    return redirect()->to(base_url('peserta'));
                    break;
                case 'penyelenggara':
                    return redirect()->to(base_url('penyelenggara'));
                    return 'aku penyelenggara';
                break;
            }
        }
        /**
         * Tampilkan view
         */
        $data = [
            'title' => 'EVENTKITA | Online Event Organizer for everyone '
        ];
        return view('home/index', $data);
    }
}