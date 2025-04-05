<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class QuanTriTinController extends Controller
{
  

    public function index()
    {
        return view('quantritin');
    }
}
