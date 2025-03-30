<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiSpSeeder extends Seeder
{
    public function run()
    {
        DB::table('loaisp')->insert([
            ['tenLoai' => 'Smartphone', 'thuTu' => 1, 'anHien' => 1, 'urlHinh' => 'smartphone.jpg'],
            ['tenLoai' => 'Tablet', 'thuTu' => 2, 'anHien' => 1, 'urlHinh' => 'tablet.jpg'],
        ]);
    }
}
