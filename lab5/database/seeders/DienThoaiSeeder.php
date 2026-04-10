<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DienThoaiSeeder extends Seeder
{
    public function run(): void
    {
        if (!Schema::hasTable('dienthoai') || !Schema::hasTable('loaisp')) {
            return;
        }

        $categoryIds = DB::table('loaisp')->pluck('id')->all();
        if (empty($categoryIds)) {
            return;
        }

        $basePhones = [
            ['name' => 'Oppo XA', 'min' => 700000, 'max' => 1000000],
            ['name' => 'Iphone XS Max', 'min' => 500000, 'max' => 800000],
            ['name' => 'Nokia Pro', 'min' => 250000, 'max' => 500000],
        ];

        $records = [];
        for ($i = 1; $i <= 300; $i++) {
            $base = $basePhones[array_rand($basePhones)];
            $gia = rand($base['min'], $base['max']);
            $giaKm = rand(0, 1) === 1 ? round($gia * rand(70, 95) / 100, 2) : 0;

            $records[] = [
                'tenDT' => $base['name'] . ' ' . str_pad((string) $i, 3, '0', STR_PAD_LEFT),
                'moTa' => 'Mo ta ngan cho ' . $base['name'],
                'baiViet' => 'Noi dung bai viet tu sinh cho ' . $base['name'],
                'ghiChu' => 'Auto generated #' . $i,
                'ngayCapNhat' => Carbon::now()->subDays(rand(0, 365)),
                'gia' => $gia,
                'giaKM' => $giaKm,
                'urlHinh' => 'images/phones/' . Str::slug($base['name']) . '-' . $i . '.jpg',
                'soLuongTonKho' => rand(0, 50),
                'hot' => (bool) rand(0, 1),
                'anHien' => (bool) rand(0, 1),
                'idLoai' => $categoryIds[array_rand($categoryIds)],
            ];
        }

        foreach (array_chunk($records, 50) as $chunk) {
            DB::table('dienthoai')->insert($chunk);
        }
    }
}
