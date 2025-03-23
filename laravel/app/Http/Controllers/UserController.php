<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $data = DB::table('users')->get();
        // dd($data);
        return view('user', ['data' => $data]);
    }
}
