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
            return redirect()->to(base_url($_SESSION['user']['tipe_user']));
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