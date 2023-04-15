<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function index(){
        if(auth()->user()->role == 1){
            $Agents = User::where('role', 3)->get();
            return view('admin.agent.index', compact('Agents'));
        }
        else if (auth()->user()->role == 2){
            $Agents = User::where('role', 3)->where('Added_by', Auth::id())->get();
            return view('manager.agent.index', compact('Agents'));
        }
    }
    public function create(){
        if(auth()->user()->role == 1){
            return view('admin.agent.create');
        }
        else if (auth()->user()->role == 2) {
            return view('manager.agent.create');
        }
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
        if(auth()->user()->role == 1){
            return redirect()->route('admin.agent.index')->with('success', 'تم إضافة مطور مبيعات بنجاح');
        }
        else if (auth()->user()->role == 2) {
            return redirect()->route('manager.agent.index')->with('success', 'تم إضافة مطور مبيعات بنجاح');
        }
    }
}
