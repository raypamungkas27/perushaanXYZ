<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\FunctionContextPass;
use RealRashid\SweetAlert\Facades\Alert;

class AuthCT extends Controller
{
    //

    public function login(){
        if (auth()->user()) {
            if (auth()->user()->is_admin ==  1) {
                return redirect("admin/dashboard");
            } else {
                return redirect("user/dashboard");
            }
        }

        return view("auth/login");
    }

    public function login_post(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $request->email, 'password' => $request->password)))
        {
            if (auth()->user()->is_admin == 1) {
                return redirect("admin/dashboard");
            }else{
                return redirect("user/dashboard");
            }
        }else{
            Alert::error('Login Gagal', 'Email / Password Salah');
            return redirect("login");
        }
    }

    public function logout(){
        Auth::logout();
        Alert::success('Sukses Logout', 'Logout Berhasil, Sampai Jumpa !');
        return redirect('/login');
    }
}
