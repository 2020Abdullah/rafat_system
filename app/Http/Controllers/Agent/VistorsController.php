<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\vistorRequest;
use App\Models\Agent;
use App\Models\Manager;
use App\Models\Vistor;
use Illuminate\Http\Request;

class VistorsController extends Controller
{
    public function index(){
        $Allreports = Vistor::where('Agent_id', auth('agent')->user()->id)->latest()->paginate(10);
        return view('Agent.index', compact('Allreports'));
    }
    public function create(){
        return view('Agent.create');
    }
    public function store(vistorRequest $request){
        $manager_id = Agent::where('id', auth('agent')->user()->id)->pluck('manager_id')->first();
        Vistor::create([
            'vistor_code' => $request->vistor_code,
            'vistor_phone' => $request->vistor_phone,
            'vistor_balance' => $request->vistor_balance,
            'vistor_count_slides' => $request->vistor_count_slides,
            'vistor_count_activity' => $request->vistor_count_activity,
            'lat' => $request->lat,
            'long' => $request->long,
            'notes' => $request->notes,
            'Agent_id' => auth('agent')->user()->id,
            'manager_id' => $manager_id,
        ]);
        return redirect()->route('vistor.index')->with('success', 'تم إنشاء التقرير بنجاح');
    }
}
