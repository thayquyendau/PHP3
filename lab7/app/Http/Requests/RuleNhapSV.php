<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleNhapSV extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'masv' => 'required|alpha_num',
            'hoten' => 'required|min:3|max:100',
            'tuoi' => 'required|integer|min:16|max:100',
            'ngaysinh' => 'required|date',
            'cmnd' => 'required|numeric',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'masv.required' => 'Mã sinh viên là bắt buộc.',
            'hoten.required' => 'Họ tên là bắt buộc.',
            'tuoi.required' => 'Tuổi là bắt buộc.',
            'ngaysinh.required' => 'Ngày sinh là bắt buộc.',
            'cmnd.required' => 'CMND là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
        ];
    }

    public function attributes()
    {
        return [
            'masv' => 'Mã sinh viên',
            'hoten' => 'Họ tên',
            'tuoi' => 'Tuổi',
            'ngaysinh' => 'Ngày sinh',
            'cmnd' => 'CMND',
            'email' => 'Email',
        ];
    }
}
