<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('dienthoai', function (Blueprint $table) {
            $table->text('baiViet')->nullable()->after('moTa');
            $table->string('ghiChu', 500)->nullable()->after('baiViet');
            $table->foreignId('idLoai')
                ->after('anHien')
                ->constrained('loaisp')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('dienthoai', function (Blueprint $table) {
            if (Schema::hasColumn('dienthoai', 'idLoai')) {
                $table->dropForeign(['idLoai']);
                $table->dropColumn('idLoai');
            }
            $table->dropColumn(['baiViet', 'ghiChu']);
        });
    }
};
