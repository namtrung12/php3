<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dienthoai', function (Blueprint $table) {
            $table->id();
            $table->string('tenDT', 30)->unique();
            $table->string('moTa', 1000)->nullable();
            $table->dateTime('ngayCapNhat');
            $table->double('gia', 8, 2);
            $table->double('giaKM', 8, 2)->default(0);
            $table->string('urlHinh', 200)->nullable();
            $table->integer('soLuongTonKho')->default(0);
            $table->boolean('hot')->default(false);
            $table->boolean('anHien')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dienthoai');
    }
};
