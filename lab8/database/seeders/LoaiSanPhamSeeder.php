<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LoaiSanPham;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoaiSanPham::create([
            'ten_loai' => 'Điện thoại',
        ]);
    
        LoaiSanPham::create([
            'ten_loai' => 'Máy tính bảng',
        ]);
    }
}
