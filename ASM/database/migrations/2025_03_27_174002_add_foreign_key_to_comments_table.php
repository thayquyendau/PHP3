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
        Schema::table('comments', function (Blueprint $table) {
            // Đảm bảo cột news_id tồn tại và có kiểu dữ liệu đúng
            if (!Schema::hasColumn('comments', 'news_id')) {
                $table->unsignedBigInteger('news_id')->after('id');
            }
            // Thêm khóa ngoại
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
    }
};
