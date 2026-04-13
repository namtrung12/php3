# ASM1

Project này được copy từ `C:\xampp\htdocs\img\php3\php3` và đưa vào project hiện tại dưới tên `asm1`.

## Chức năng

- Quản lý danh mục sản phẩm.
- Quản lý sản phẩm.
- Tìm kiếm danh mục, sản phẩm.
- Thêm, sửa, xóa danh mục và sản phẩm.
- Upload hình sản phẩm.

## Chạy project

```powershell
cd C:\xampp\htdocs\php3\php3\asm1
composer install
php artisan migrate:fresh --seed
php artisan serve --host=127.0.0.1 --port=8011
```

Mở:

```text
http://127.0.0.1:8011/
```

Project mặc định dùng SQLite qua file `database/database.sqlite`.
