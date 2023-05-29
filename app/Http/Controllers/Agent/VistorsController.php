<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\vistorRequest;
use App\Models\Agent;
use App\Models\Manager;
use App\Models\Vistor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VistorsController extends Controller
{
    public function index()
    {
        $Allreports = Vistor::where('status', 1)->where('Agent_id', auth('agent')->user()->id)->latest()->paginate(50);
        return view('Agent.index', compact('Allreports'));
    }
    public function create()
    {
        return view('Agent.create');
    }
    public function store(vistorRequest $request)
    {
        $manager_id = Agent::where('id', auth('agent')->user()->id)->pluck('manager_id')->first();
        Vistor::create([
            'vistor_code' => $request->vistor_code,
            'vistor_phone' => $request->vistor_phone,
            'vistor_balance' => $request->vistor_balance,
            'vistor_count_slides' => $request->vistor_count_slides,
            'vistor_count_activity' => $request->vistor_count_activity,
            'lat' => $request->lat,
            'long' => $request->long,
            'date' =>  Carbon::today()->format('Y-m-d'),
            'time' => Carbon::now()->format('g:i A'),
            'notes' => $request->notes,
            'place_code' => $request->place_code,
            'place_trade_number' => $request->place_trade_number,
            'place_expire_date' => $request->place_expire_date,
            'Owner_identify_number' => $request->Owner_identify_number,
            'Owner_ID_expiry_date' => $request->Owner_ID_expiry_date,
            'seller_identify_number' => $request->seller_identify_number,
            'seller_ID_expiry_date' => $request->seller_ID_expiry_date,
            'Agent_id' => auth('agent')->user()->id,
            'manager_id' => $manager_id,
        ]);
        return redirect()->route('vistor.index')->with('success', 'تم إنشاء التقرير بنجاح');
    }
}
