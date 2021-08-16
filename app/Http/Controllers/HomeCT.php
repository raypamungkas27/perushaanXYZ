<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCT extends Controller
{
    //

    public function index(){
        redirect("/login");
    }
}
