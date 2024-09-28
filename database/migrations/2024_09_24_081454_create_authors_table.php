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
        Schema::create('authors', function (Blueprint $table) {
            $table->id(); // Cột ID tự động tăng
            $table->string('name'); // Tên tác giả
            $table->date('date_of_birth')->nullable(); // Ngày sinh
            $table->string('nationality')->nullable(); // Quốc tịch
            $table->text('biography')->nullable(); // Tiểu sử
            $table->string('email')->nullable(); // Email
            $table->string('profile_picture')->nullable(); // Hình đại diện
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
