<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerSetController extends Controller
{
    public function profile(){
        return view('manager.profile');
    }
    public function profileupdate(Request $request){
        if($request->hasFile('image')){
            
            $file_path = storage_path('storage/images/' . auth('manager')->user()->profile_img);

            if(file_exists($file_path)){
                unlink($file_path);
            }

            $filename = $request->image->getClientOriginalName();

            $generatefile = time() . $filename;

            $request->image->storeAs('images' , $generatefile , 'public');
            auth('manager')->user()->update(['profile_img'=> $generatefile]);
        }

        if($request->password !== null){
            auth('manager')->user()->update([
                'password'  => Hash::make($request->password)
            ]);
        }

        auth('manager')->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'تم تحديث المعلومات بنجاح');
    }
}
