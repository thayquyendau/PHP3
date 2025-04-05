<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InFoStudent extends Controller
{
    public function info(){
        return view('infoStudent');
    }
}
