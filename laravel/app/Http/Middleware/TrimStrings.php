<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrimStrings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $input = $request->all(); // Lấy tất cả dữ liệu từ request
        foreach($input as $key => $value){
            if(is_string($value)){
                $input[$key] = trim($value); // Xóa khoảng trắng ở đầu và cuối chuỗi
            }
        }
        $request->merge($input); // Gán lại dữ liệu đã được trim vào request
        return $next($request);// Tiếp tục xử lý request
    }
}
