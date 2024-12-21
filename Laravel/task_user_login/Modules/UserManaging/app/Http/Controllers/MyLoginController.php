<?php

namespace Modules\UserManaging\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class MyLoginController extends Controller
{
    public function getLogin()
    {
        return view('usermanaging::mylogin');//return ra trang login để đăng nhập
    }

    public function postLogin(Request $request) 
    {
        $credenticals = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        
        if (Auth::guard('my_users')->attempt($credenticals)) {

            return view('usermanaging::myprofile')->with('name',$request->username);
        } else {

            return view('usermanaging::mylogin');
        }
    }

    public function mylogout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect(route('usermanaging.index'));
    }
}
