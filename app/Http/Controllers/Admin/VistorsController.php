<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vistor;
use Illuminate\Http\Request;

class VistorsController extends Controller
{
    public function index(){
        $Allreports = Vistor::all();
        return view('admin.vistors.index', compact('Allreports'));
    }
}
