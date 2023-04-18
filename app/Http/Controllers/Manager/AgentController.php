<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function index(){
        $Agents = Agent::where('manager_id', auth('manager')->user()->id)->with('manager')->get();
        return view('manager.agent.index', compact('Agents'));
    }

    public function create(){
        $managers = Agent::where('manager_id', auth('manager')->user()->id)->get();
        return view('manager.agent.create', compact('managers'));
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Agent::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'manager_id' => auth('manager')->user()->id,
        ]);

        return redirect()->route('manager.agent.index')->with('success', 'تم إضافة مطور مبيعات بنجاح');
    }
}
