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
        Schema::create('sinhviens', function (Blueprint $table) {
            $table->id();
            $table->string('masv', 10);
            $table->string('hoten', 20);
            $table->integer('tuoi');
            $table->date('ngaysinh');
            $table->string('cmnd', 9);
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinhviens');
    }
};
