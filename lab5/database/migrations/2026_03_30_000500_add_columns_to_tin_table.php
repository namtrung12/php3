<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tin', function (Blueprint $table) {
            if (!Schema::hasColumn('tin', 'urlHinh')) {
                $table->string('urlHinh', 255)->nullable()->after('noiDung');
            }

            if (!Schema::hasColumn('tin', 'created_at')) {
                $table->timestamp('created_at')->nullable()->after('xem');
            }

            if (!Schema::hasColumn('tin', 'updated_at')) {
                $table->timestamp('updated_at')->nullable()->after('created_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('tin', function (Blueprint $table) {
            $columns = [];

            foreach (['created_at', 'updated_at', 'urlHinh'] as $column) {
                if (Schema::hasColumn('tin', $column)) {
                    $columns[] = $column;
                }
            }

            if ($columns) {
                $table->dropColumn($columns);
            }
        });
    }
};
