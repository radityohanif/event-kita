<?php 

namespace App\Controllers;

use App\Models\EventModel;

class Admin extends BaseController 
{
  protected $eventModel;
  
  public function __construct()
  {
    $this->eventModel = new EventModel();
  }
  
  public function index() 
  {
    /** 
     * Periksa variabel session, 
     * pastikan yang boleh mengakses controller ini hanya admin saja
    */
    if(isset($_SESSION['user']['tipe_user'])) 
    {
        if ($_SESSION['user']['tipe_user'] != 'admin' ) 
        {
          return redirect()->to(base_url($_SESSION['user']['tipe_user']));
        }
    }
    else {
      return redirect()->to(base_url());
    }
    
    $data = [
      'daftar_event_pengajuan' => $this->eventModel->getEvent(false, false)
    ];
    return view('admin/index', $data);
  }

  public function detail(){
    $data = [
      'judul' => 'EVENTKITA | Detail Event',
      'event' => $this->eventModel->getEvent($this->request->getVar('id')),
    ];
    
    // Buat format jadwal event menggunakan model
    $jadwalEvent = $this->eventModel->setJadwalEvent(
      $data['event']['tanggal'],
      $data['event']['waktu']
    );

     /**
     * Dokumentasi Push Array Asosiatif
     * https://www.codegrepper.com/code-examples/php/php+associative+array+push
     */

    // push jadwal event kedalam data agar bisa ditampilkan di view
    $data += ['jadwalEvent' => $jadwalEvent];
    
    return view('admin/detail', $data);
  }

  public function process() 
  {
    /**
     * Ambil data dari form
     */
    $id = $this->request->getVar('id');
    $status = $this->request->getVar('status');
  
    switch ($status) {
      case 'setuju':
        $this->eventModel->update($id, ['status' => 1]);
        break;
      case 'tolak':
        $this->eventModel->update($id, ['status' => -1]);
        break;
    }
    
    return redirect()->to(base_url('admin'));
  }
}