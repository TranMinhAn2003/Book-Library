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
        Schema::create('borrow_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // Liên kết đến bảng books
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Liên kết đến bảng users
            $table->date('borrowed_at'); // Ngày mượn sách
            $table->date('due_date'); // Ngày trả sách dự kiến
            $table->date('returned_at')->nullable(); // Ngày trả sách thực tế (nullable nếu chưa trả)
            $table->boolean('status')->default(0); // 0: Đang mượn, 1: Đã trả
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_books');
    }
};
