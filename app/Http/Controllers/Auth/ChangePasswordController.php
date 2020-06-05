<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('auth.passwords.change');
    }
    public function changePassword(Request $request)
    {
        $this->validate($request,[
            'currentpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword =Auth::user()->password;
        if(Hash::check($request->currentpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect(route('login'))->with('successMsg',"Password is changed successfully!!");
        }else{
            return redirect()->back()->with('error',"Current password is invalid");
        }

    }
}
