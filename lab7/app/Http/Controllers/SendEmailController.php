<?php

namespace App\Http\Controllers;

use App\Models\sendEmail;
use App\Http\Requests\StoresendMailRequest;
use App\Http\Requests\UpdatesendMailRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuiMail;

class SendEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sendEmail()
    {   
        
        $details = [
            'title' => 'Email được gửi từ Laravel',
            'body' => 'Chào bạn, đây là nội dung email được gửi từ ứng dụng Laravel của tôi!'
        ];

        Mail::to('quyendau1603@gmail.com')->send(new GuiMail($details));

        return redirect()->route('home')->with('success', 'Email đã được gửi thành công!');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresendMailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(sendEmail $sendMail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sendEmail $sendMail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesendMailRequest $request, sendEmail $sendMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sendEmail $sendMail)
    {
        //
    }
}
