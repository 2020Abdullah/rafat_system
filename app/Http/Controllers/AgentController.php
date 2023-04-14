<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function index(){
        $Agents = User::where('role', 3)->get();
        return view('admin.agent.index', compact('Agents'));
    }
    public function create(){
        return view('admin.agent.create');
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
            'role' => 3,
            'Added_by' => Auth::user()->id
        ]);

        return redirect()->route('admin.agent.index')->with('success', 'تم إضافة مطور مبيعات بنجاح');
    }
}
