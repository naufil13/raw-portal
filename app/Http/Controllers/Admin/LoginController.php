<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function index()
    {
        if(Auth::check()) {
            return redirect()->intended(admin_url('dashboard'));
        }
        $data = [];
        return view('admin.auth.login', compact('data'));
    }

    function do_login(Request $request){

        $validator = Validator::make(request()->all(), [
            'username' => "required",
            'password' => "required|min:6|max:16",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $JSON['status'] = false;
        $credentials = $request->only('username', 'password');
        $credentials['status'] = 'Active';

        if (Auth::attempt($credentials, intval(getVar('remember')))) {
            activity_log('login', 'users', Auth::id(), Auth::id());
            if($request->ajax()){
                $JSON['status'] = true;
                $JSON['message'] = 'Successfully login!';
                $JSON['redirect'] = redirect()->intended(admin_url('dashboard'))->getTargetUrl();
            } else {
                return redirect()->intended(admin_url('dashboard'));
            }
        } else {
            return redirect()->back()->withErrors('Incorrect username or password. Please try again!')->withInput();
        }

        return $JSON;
    }

    function logout(){
        activity_log('logout', 'users', Auth::id(), Auth::id());
        Auth::logout();
    }
}
