<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Psy\debug;

class TinController extends Controller
{
    public function index(){
        // debug();
        // echo "Day la trang chu";
        return view('home');
    }

    public function lienhe(){
        // echo "Day la trang lien he";
        return view('lienhe');
    }
    public function lay1tin($id){
        $data = ['id' => $id];
        return view('chitiet', $data);
    }
}
