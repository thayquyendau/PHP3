<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use  App\Mail\sendMail;

class MailController extends Controller
{
    public function index()
    {
        return view('email/send');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'to_email' => 'required'
        ]);

        Mail::to($request->input('to_email'))->send(
            new sendMail($request->input('subject'), $request->input('content'), $request->file('image'))
        );

        return back()->with('success', 'Gửi mail thành công!');
    }
}
