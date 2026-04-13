# PHP3 All Labs

Project này là bản chạy chung cho Lab 1 đến Lab 8. Mỗi lab vẫn tách riêng bằng route và thư mục view/controller để dễ chấm:

- `GET /lab1`: Lab 1 - Laravel cơ bản.
- `GET /lab2`: Lab 2 - Query Builder.
- `GET /lab3`: Lab 3 - Blade Template.
- `GET /lab4`: Lab 4 - Migration & Seeder.
- `GET /lab5`: Lab 5 - Eloquent ORM.
- `GET /lab6`: Lab 6 - Authentication & Middleware.
- `GET /lab7`: Lab 7 - Validation & Send Mail.
- `GET /lab8`: Lab 8 - RESTful API.

Lab 8 API vẫn dùng:

- `GET|POST /api/products`
- `GET|PUT|DELETE /api/products/{id}`
- `GET|POST /api/loaisanpham`
- `GET|PUT|DELETE /api/loaisanpham/{id}`
- `POST /api/dangky`
- `POST /api/dangnhap`
- `GET /api/profile`
- `POST /api/logout`

## Lệnh chạy nhanh

```bash
composer install
php artisan migrate:fresh --seed
php artisan serve
php artisan test
```

Mặc định project dùng SQLite để mở được ngay bằng một link, không phụ thuộc MySQL XAMPP. Nếu cần dùng MySQL, đổi lại cấu hình DB trong `.env`.
