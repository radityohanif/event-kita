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
    
    $data = [
      'daftar_event_pengajuan' => $this->eventModel->getEvent(false, false)
    ];
    return view('admin/index', $data);
  }
  
}