<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tin', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idLT');
            $table->string('tieuDe', 255);
            $table->text('tomTat')->nullable();
            $table->longText('noiDung')->nullable();
            $table->string('urlHinh', 255)->nullable();
            $table->dateTime('ngayDang');
            $table->unsignedInteger('xem')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('idLT')->references('id')->on('loaitin');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tin');
    }
};
