<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminSetController extends Controller
{
    public function profile()
    {
        return view('admin.profile');
    }

    public function profileupdate(Request $request)
    {
        if ($request->hasFile('image')) {

            $file_path = public_path('/images/' . auth('web')->user()->profile_img);

            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $filename = $request->image->getClientOriginalName();

            $generatefile = time() . $filename;

            $request->image->move('images', $generatefile);

            auth()->user()->update(['profile_img' => $generatefile]);
        }

        if ($request->password !== null) {
            auth()->user()->update([
                'password'  => Hash::make($request->password)
            ]);
        }

        auth('web')->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'تم تحديث المعلومات بنجاح');
    }
}
