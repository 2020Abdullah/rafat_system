<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AgentSetController extends Controller
{
    public function profile(){
        return view('Agent.profile');
    }
    public function profileupdate(Request $request){
        if($request->hasFile('image')){
            
            $file_path = storage_path('storage/images/' . auth('agent')->user()->profile_img);

            if(file_exists($file_path)){
                unlink($file_path);
            }

            $filename = $request->image->getClientOriginalName();

            $generatefile = time() . $filename;

            $request->image->storeAs('images' , $generatefile , 'public');
            auth('agent')->user()->update(['profile_img'=> $generatefile]);
        }

        if($request->password !== null){
            auth('agent')->user()->update([
                'password'  => Hash::make($request->password)
            ]);
        }

        auth('agent')->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'تم تحديث المعلومات بنجاح');
    }
}
