<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tin', function (Blueprint $table) {
            $table->id();
            $table->string('tieude'); // Tiêu đề tin
            $table->integer('xem');   // Số lượt xem
            $table->date('ngayDang')->nullable(); // Cho phép NULL, không dùng after ở đây
            $table->integer('idLoai');
            $table->text('tomTat')->nullable();   // Tóm tắt, cho phép NULL
            $table->text('noiDung')->nullable();  // Nội dung, cho phép NULL
            $table->timestamps();     // Cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin');
    }
};
