<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function index()
    {
        session_unset();
        return redirect()->to(base_url('login'));
    }
}