<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\PesertaModel;
use App\Models\PenyelenggaraModel;

class Home extends BaseController
{
    protected $eventModel;
    protected $pesertaModel;
    protected $penyelenggaraModel;

    public function __construct(){
        $this->pesertaModel = new PesertaModel();
        $this->eventModel = new EventModel();
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
            'title' => 'EVENTKITA | Online Event Organizer for everyone ',
            'event_populer' => $this->eventModel->getEventPopuler(),
            'jumlah_event' => count($this->eventModel->getEvent(false, true)),
            'jumlah_peserta' => count($this->pesertaModel->findAll()),
            'jumlah_penyelenggara' => count($this->penyelenggaraModel->findAll())
        ];
        return view('home/index', $data);
    }
}