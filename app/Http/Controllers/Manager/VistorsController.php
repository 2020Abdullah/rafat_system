<?php

namespace App\Http\Controllers\Manager;

use App\Exports\VistorsExport;
use App\Exports\vistorsManagerExport;
use App\Http\Controllers\Controller;
use App\Models\Vistor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VistorsController extends Controller
{
    public function index()
    {
        $Allreports = Vistor::where('status', 1)->where('manager_id', auth('manager')->user()->id)->latest()->paginate(50);
        return view('manager.vistors.index', compact('Allreports'));
    }

    public function exportExcel()
    {

        $user_id = auth('manager')->user()->id;

        return Excel::download(new vistorsManagerExport($user_id), 'Vistors.xlsx');
    }

    public function destory($id)
    {
        Vistor::where('id', $id)->update([
            'status' => 0
        ]);
        return back()->with('success', 'تم حذف التقرير بنجاح');
    }

    public function deleteAll(Request $request)
    {
        $recardsIds = json_decode($request->recardsIds);

        $vistors = Vistor::whereIn('id', $recardsIds);

        $vistors->update([
            'status' => 0
        ]);

        return back()->with('success', 'تم حذف جميع التقارير بنجاح');
    }
}
