<?php

namespace App\Controllers;

use App\Models\EventModel;

class Home extends BaseController
{
    protected $eventModel;

    public function __construct(){
        $this->eventModel = new EventModel();
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
            'title' => 'EVENTKITA | Online Event Organizer for everyone ',
            'event_populer' => $this->eventModel->getEventPopuler()
        ];
        return view('home/index', $data);
    }
}