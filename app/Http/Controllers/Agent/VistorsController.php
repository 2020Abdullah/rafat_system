<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VistorsController extends Controller
{
    public function index(){
        return view('Agent.index');
    }
    public function create(){
        return view('Agent.create');
    }
}
