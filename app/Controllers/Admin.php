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

  public function detail($id){
    $data = [
      'judul' => 'EVENTKITA | Detail Event',
      'event' => $this->eventModel->getEvent($id)
    ];
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
        $this->eventModel->update($id, ['disetujui' => 1]);
        break;
      case 'tolak':
        $this->eventModel->update($id, ['disetujui' => 0]);
        break;
    }
    
    return redirect()->to(base_url('admin'));
  }
}