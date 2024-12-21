<?php

namespace Modules\UserManaging\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\UserManaging\Models\MyUser;

class MyRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getReg()
    {
        return view('usermanaging::myregister');
    }

    public function postReg(Request $request)
    {
        $user = new MyUser;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $pass = $request->cpassword;
        if($request->password == $pass){
            $user->save();
            $credenticals = [
                'username' => $request->username,
                'password' => $request->password,
            ];
            
            if (Auth::guard('my_users')->attempt($credenticals)) {

                return view('usermanaging::myprofile')->with('name',$request->username);
            }
        }
        return redirect()->route('myregister.get');    
    }
}
