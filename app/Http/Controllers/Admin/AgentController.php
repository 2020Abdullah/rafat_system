<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function index()
    {
        $Agents = Agent::with('manager')->get();
        return view('admin.agent.index', compact('Agents'));
    }

    public function create()
    {
        $managers = Manager::all();
        return view('admin.agent.create', compact('managers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        Agent::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'manager_id' => $request->manager_id
        ]);

        return redirect()->route('admin.agent.index')->with('success', 'تم إضافة مطور مبيعات بنجاح');
    }
    public function stopAgent($id)
    {
        Agent::where('id', $id)->update([
            'status' => 0
        ]);
        return redirect()->route('admin.agent.index')->with('success', 'تم تعطيل حساب المطور');
    }
    public function activeAgent($id)
    {
        Agent::where('id', $id)->update([
            'status' => 1
        ]);
        return redirect()->route('admin.agent.index')->with('success', 'تم تفعيل الحساب بنجاح');
    }
    public function destory($id)
    {
        Agent::where('id', $id)->delete();
        return redirect()->route('admin.agent.index')->with('success', 'تم حذف الحساب بنجاح');
    }
}
