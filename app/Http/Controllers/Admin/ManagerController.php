<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        return view('admin.manager.index', compact('managers'));
    }
    public function create()
    {
        return view('admin.manager.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        Manager::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Added_by' => Auth::user()->id,
        ]);

        return redirect()->route('admin.manager.index')->with('success', 'تم إضافة المشرف بنجاح');
    }
    public function stopManager($id)
    {
        Manager::where('id', $id)->update([
            'status' => 0
        ]);
        return redirect()->route('admin.manager.index')->with('success', 'تم تعطيل حساب المشرف');
    }
    public function activeManager($id)
    {
        Manager::where('id', $id)->update([
            'status' => 1
        ]);
        return redirect()->route('admin.manager.index')->with('success', 'تم تفعيل الحساب بنجاح');
    }

    public function destory($id)
    {
        Manager::where('id', $id)->delete();
        return redirect()->route('admin.manager.index')->with('success', 'تم حذف الحساب بنجاح');
    }
}
