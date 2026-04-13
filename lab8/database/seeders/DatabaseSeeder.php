<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        DB::table('users')->insert([
            [
                'name' => 'Vui Từng Phút Giây',
                'email' => 'vuiqua@gmail.com',
                'password' => bcrypt('hehe'),
                'idgroup' => 1,
                'diachi' => 'TPHCM',
                'nghenghiep' => 'Quản trị hệ thống',
                'phai' => 'Nam',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Buồn Từng Phút Giây',
                'email' => 'buonqua@gmail.com',
                'password' => bcrypt('huhu'),
                'idgroup' => 1,
                'diachi' => 'TPHCM',
                'nghenghiep' => 'Biên tập viên',
                'phai' => 'Nữ',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nguyen Thi Gia Hu',
                'email' => 'giahu@gmail.com',
                'password' => bcrypt('hihi'),
                'idgroup' => 0,
                'diachi' => 'HN',
                'nghenghiep' => 'Sinh viên',
                'phai' => 'Nữ',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('products')->insert([
            [
                'name' => 'Laptop Dell Inspiron',
                'price' => 14500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chuột Logitech M331',
                'price' => 350000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bàn phím cơ AKKO',
                'price' => 1290000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('loaisanpham')->insert([
            [
                'tenloai' => 'Máy tính xách tay',
                'mota' => 'Các dòng laptop phục vụ học tập và làm việc.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tenloai' => 'Phụ kiện máy tính',
                'mota' => 'Chuột, bàn phím, tai nghe và thiết bị ngoại vi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
