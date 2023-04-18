<?php

namespace App\Http\Controllers\Admin;

use App\Exports\VistorsExport;
use App\Http\Controllers\Controller;
use App\Models\Vistor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VistorsController extends Controller
{
    public function index(){
        $Allreports = Vistor::all();
        return view('admin.vistors.index', compact('Allreports'));
    }
    public function exportExcel(){
        return Excel::download(new VistorsExport, 'Vistors.xlsx');
    }
}
