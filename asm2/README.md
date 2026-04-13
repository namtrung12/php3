# ASM2

Project này được phát triển từ `asm1` và bổ sung đăng nhập, đăng xuất.

## Chức năng

- Đăng nhập.
- Đăng ký.
- Đăng xuất.
- Bảo vệ phần quản lý danh mục và sản phẩm bằng middleware `auth`.
- Quản lý user với các field `diachi`, `idgroup`, `nghenghiep`, `phai`.
- Phân quyền admin cho trang quản lý user bằng `idgroup = 1`.
- Quản lý danh mục sản phẩm.
- Quản lý sản phẩm.
- Tìm kiếm danh mục, sản phẩm.
- Thêm, sửa, xóa danh mục và sản phẩm.
- Upload hình sản phẩm.

## Tài khoản mẫu

```text
Email: lehanam3570@gmail.com
Mật khẩu: namtrung12
```

## Chạy project

```powershell
cd C:\xampp\htdocs\php3\php3\asm2
composer install
php artisan migrate:fresh --seed
php artisan serve --host=127.0.0.1 --port=8012
```

Mở:

```text
http://127.0.0.1:8012/
```

Project mặc định dùng SQLite qua file `database/database.sqlite`.
