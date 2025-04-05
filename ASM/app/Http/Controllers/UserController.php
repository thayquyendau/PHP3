<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function index(){
        $data = DB::table('users')->get();
        // dd($data);
        return view('user', ['data' => $data]);
    }
    public function login()
    {
        $categories = DB::table('categories')->select('*')->get();
        return view('auth/login', compact('categories'));
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();

        if ($user && Hash::check($request->password, $user->password)) { // So sánh mật khẩu
            session(['user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role ?? 'user',
            ]]);
            return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
        }

        return redirect()->route('login')->with('error', 'Email hoặc mật khẩu không đúng.');
    }

    public function register()
    {
        $categories = DB::table('categories')->select('*')->get();
        return view('auth/register', compact('categories'));
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // confirmed yêu cầu password_confirmation khớp với password
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Mã hóa mật khẩu
            'role' => 'user', // Mặc định là user
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();

        if ($user && Hash::check($request->password, $user->password)) { // So sánh mật khẩu
            session(['user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role ?? 'user',
            ]]);
            return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
        }

        // return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('home')->with('success', 'Đăng xuất thành công!');
    }
    public function profile($id)
    {
        $categories = DB::table('categories')->select('*')->get();
        $user = DB::table('users')->where('id', $id)->first();
        if (!$user) {
            abort(404, 'Người dùng không tồn tại.');
        }
        return view('profile', compact('categories', 'user'));
    }

    public function showForgotPasswordForm()
    {   
        $categories = DB::table('categories')->select('*')->get();
        return view('auth/forgot-password', compact('categories'));
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
        $categories = DB::table('categories')->select('*')->get();
        return view('auth/reset-password', ['token' => $token], compact('categories'));
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
                    ? redirect()->route('auth/login')->with('status', 'Mật khẩu của bạn đã được đặt lại thành công!')
                    : back()->withErrors(['email' => 'Token không hợp lệ hoặc đã hết hạn.']);
    }
}
