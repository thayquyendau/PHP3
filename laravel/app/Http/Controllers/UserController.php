<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index(){
        $data = DB::table('users')->get();
        // dd($data);
        return view('user', ['data' => $data]);
    }
    public function login(){  
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            return view('home'); 
        }
            return view('login');  
    }

   
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    // Gửi email chứa liên kết đặt lại mật khẩu
    public function sendResetLinkEmail(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Gửi liên kết reset
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Trả về phản hồi
        return $status === Password::RESET_LINK_SENT
                    ? back()->with('status', 'Liên kết đặt lại mật khẩu đã được gửi đến email của bạn!')
                    : back()->withErrors(['email' => 'Không thể gửi liên kết. Vui lòng kiểm tra lại email.']);
    }

    // Hiển thị form đặt lại mật khẩu
    public function showResetPasswordForm($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    // Xử lý đặt lại mật khẩu
    public function resetPassword(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Thực hiện reset mật khẩu
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        // Trả về phản hồi
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', 'Mật khẩu của bạn đã được đặt lại thành công!')
                    : back()->withErrors(['email' => 'Token không hợp lệ hoặc đã hết hạn.']);
    }
}
