<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Vistor;
use Illuminate\Http\Request;

class VistorsController extends Controller
{
    public function index(){
        $Allreports = Vistor::where('manager_id', auth('manager')->user()->id)->get();
        return view('manager.vistors.index', compact('Allreports'));
    }
}
