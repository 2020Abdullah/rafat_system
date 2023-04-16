<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  
    public function adminHome()
    {
        return view('admin.dashboard');
    }

    public function agentHome()
    {
        return view('Agent.dashboard');
    }

    public function managerHome()
    {
        return view('manager.dashboard');
    }
}
