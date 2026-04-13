<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->string('diachi')->nullable()->after('password');
            $table->unsignedTinyInteger('idgroup')->default(0)->after('diachi');
            $table->string('nghenghiep')->nullable()->after('idgroup');
            $table->string('phai')->nullable()->after('nghenghiep');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn(['diachi', 'idgroup', 'nghenghiep', 'phai']);
        });
    }
};
