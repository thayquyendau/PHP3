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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_category'); // Sửa thành unsignedInteger để khớp với cột id của categories
            $table->string('name')->unique(); // Tên sản phẩm
            $table->text('description')->nullable(); // Mô tả sản phẩm, có thể null
            $table->decimal('price', 10, 2); // Giá sản phẩm (10 chữ số, 2 chữ số thập phân)
            $table->integer('stock'); // Số lượng tồn kho
            $table->timestamps();
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
