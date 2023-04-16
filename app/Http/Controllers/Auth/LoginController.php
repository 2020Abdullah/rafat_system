<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
     
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            foreach($validator->messages() as $message){
                toastr()->error($message);
            }
           return back()->withErrors($validator->messages());
        }

        // if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

        //     return redirect()->route('admin.dashboard');
            
        // }
        // if (Auth::guard('agent')->attempt(['email' => $request->email, 'password' => $request->password])) {

        //     return redirect()->route('Agent.dashboard');
            
        // }
        if (auth('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('admin.dashboard');
        }

        if ( auth('manager')->attempt(['email' => $request->email, 'password' => $request->password]) ) {
            return redirect()->route('manager.dashboard');
        }

        if ( auth('agent')->attempt(['email' => $request->email, 'password' => $request->password]) ) {
            return redirect()->route('Agent.dashboard');
        }
        
        else {
            return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}
