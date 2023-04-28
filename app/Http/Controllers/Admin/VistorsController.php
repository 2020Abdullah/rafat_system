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
        $Allreports = Vistor::latest()->paginate(10);
        return view('admin.vistors.index', compact('Allreports'));
    }
    public function exportExcel(){
        return Excel::download(new VistorsExport, 'Vistors.xlsx');
    }
    public function destory($id){
        Vistor::where('id', $id)->delete();
        return back()->with('success', 'تم حذف التقرير بنجاح');
    }
    public function deleteAll(Request $request){
        $recardsIds = json_decode($request->recardsIds);

        $vistors = Vistor::whereIn('id', $recardsIds);

        $vistors->delete();

        return back()->with('success', 'تم حذف جميع التقارير بنجاح');

    }
}
