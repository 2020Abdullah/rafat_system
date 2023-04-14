<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index(){
        $managers = User::where('role', 2)->get();
        return view('admin.manager.index', compact('managers'));
    }
    public function create(){
        return view('admin.manager.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2,
            'Added_by' => Auth::user()->id
        ]);

        return redirect()->route('admin.manager.index')->with('success', 'تم إضافة المشرف بنجاح');
    }
}
