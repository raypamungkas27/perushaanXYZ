<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCT extends Controller
{
    //

    public function dashboard(){
        return view("admin/dashboard");
    }
}
