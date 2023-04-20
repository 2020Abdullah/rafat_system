<?php

namespace App\Http\Controllers\Manager;

use App\Exports\VistorsExport;
use App\Http\Controllers\Controller;
use App\Models\Vistor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VistorsController extends Controller
{
    public function index(){
        $Allreports = Vistor::where('manager_id', auth('manager')->user()->id)->get();
        return view('manager.vistors.index', compact('Allreports'));
    }
    public function exportExcel(){
        return Excel::download(new VistorsExport, 'Vistors.xlsx');
    }
    public function destory($id){
        Vistor::where('id', $id)->delete();
        return back()->with('success', 'تم حذف التقرير بنجاح');
    }
}
