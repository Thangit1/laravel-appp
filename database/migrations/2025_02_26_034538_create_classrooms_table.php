<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('classrooms', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Tên lớp
        $table->string('teacher')->nullable(); // Giáo viên chủ nhiệm
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
