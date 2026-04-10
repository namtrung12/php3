<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ThanhVienSeeder extends Seeder
{
    public function run(): void
    {
        if (!Schema::hasTable('thanhvien')) {
            return;
        }

        $ho = ['Nguyen', 'Tran', 'Le', 'Pham', 'Hoang', 'Vo', 'Bui', 'Dang', 'Do', 'Truong'];
        $dem = ['Thi', 'Van', 'Ngoc', 'Minh', 'Quang', 'Thanh', 'Huu', 'Gia', 'Anh', 'Hoai'];
        $ten = ['Anh', 'Binh', 'Chau', 'Duc', 'Giang', 'Hanh', 'Hieu', 'Hung', 'Khanh', 'Khoa', 'Lan', 'Linh', 'Long', 'Mai', 'Nam', 'Phong', 'Phuc', 'Quan', 'Quyen', 'Sang', 'Son', 'Thao', 'Thang', 'Thu', 'Trang', 'Tri', 'Trung', 'Tuan', 'Vy', 'Yen'];

        $records = [];
        $usedEmails = [];

        while (count($records) < 100) {
            $fullName = $ho[array_rand($ho)] . ' ' . $dem[array_rand($dem)] . ' ' . $ten[array_rand($ten)];
            $email = strtolower(Str::slug($fullName, '')) . rand(100, 999) . '@gmail.com';

            if (isset($usedEmails[$email])) {
                continue;
            }
            $usedEmails[$email] = true;

            $records[] = [
                'hoTen' => $fullName,
                'password' => Hash::make('hehe'),
                'email' => $email,
                'randomKey' => Str::random(20),
                'active' => (bool) rand(0, 1),
                'idGroup' => rand(0, 2),
            ];
        }

        DB::table('thanhvien')->insert($records);
    }
}
