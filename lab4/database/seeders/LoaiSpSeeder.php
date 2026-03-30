<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LoaiSpSeeder extends Seeder
{
    public function run(): void
    {
        if (!Schema::hasTable('loaisp')) {
            return;
        }

        $data = [
            ['id' => 1, 'tenLoai' => 'Android', 'thuTu' => 1, 'anHien' => true, 'urlHinh' => 'images/android.png'],
            ['id' => 2, 'tenLoai' => 'iOS', 'thuTu' => 2, 'anHien' => true, 'urlHinh' => 'images/ios.png'],
            ['id' => 3, 'tenLoai' => 'Feature Phone', 'thuTu' => 3, 'anHien' => true, 'urlHinh' => 'images/feature-phone.png'],
            ['id' => 4, 'tenLoai' => 'Gaming', 'thuTu' => 4, 'anHien' => true, 'urlHinh' => 'images/gaming.png'],
            ['id' => 5, 'tenLoai' => 'Budget', 'thuTu' => 5, 'anHien' => true, 'urlHinh' => 'images/budget.png'],
        ];

        DB::table('loaisp')->upsert($data, ['id'], ['tenLoai', 'thuTu', 'anHien', 'urlHinh']);
    }
}
