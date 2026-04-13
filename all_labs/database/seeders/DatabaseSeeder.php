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

        DB::table('loaitin')->insert([
            ['id' => 1, 'tenLoai' => 'Công nghệ', 'slug' => 'cong-nghe'],
            ['id' => 2, 'tenLoai' => 'Đời sống', 'slug' => 'doi-song'],
            ['id' => 3, 'tenLoai' => 'Thể thao', 'slug' => 'the-thao'],
        ]);

        DB::table('tin')->insert([
            [
                'idLT' => 1,
                'tieuDe' => 'Laravel giúp tổ chức route rõ ràng hơn',
                'tomTat' => 'Bài viết giới thiệu cách dùng route, controller và view trong Laravel.',
                'noiDung' => 'Laravel hỗ trợ mô hình MVC, giúp tách phần định tuyến, xử lý và giao diện để dự án dễ bảo trì hơn.',
                'ngayDang' => now()->subDays(1),
                'xem' => 125,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idLT' => 1,
                'tieuDe' => 'Query Builder xử lý dữ liệu nhanh trong Laravel',
                'tomTat' => 'Các ví dụ select, order by, limit và lấy dữ liệu theo loại tin.',
                'noiDung' => 'Query Builder cho phép thao tác database bằng cú pháp PHP rõ ràng mà không cần viết SQL thủ công.',
                'ngayDang' => now()->subHours(8),
                'xem' => 215,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idLT' => 2,
                'tieuDe' => 'Blade template giúp tái sử dụng layout',
                'tomTat' => 'Lab 3 tập trung vào layout, section, include và route theo tham số.',
                'noiDung' => 'Blade giúp chia nhỏ giao diện thành layout, menu và nội dung từng trang, tránh lặp lại HTML.',
                'ngayDang' => now()->subDays(2),
                'xem' => 98,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idLT' => 3,
                'tieuDe' => 'Seeder tạo dữ liệu mẫu để test chức năng',
                'tomTat' => 'Lab 4 dùng migration và seeder để dựng database có cấu trúc rõ ràng.',
                'noiDung' => 'Migration giúp quản lý cấu trúc bảng bằng code, seeder giúp thêm dữ liệu mẫu khi cần test nhanh.',
                'ngayDang' => now()->subDays(3),
                'xem' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
