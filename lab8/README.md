# Lab 8 - RESTful API With Laravel

## API sản phẩm

- `GET /api/products`: danh sách sản phẩm.
- `POST /api/products`: thêm sản phẩm mới.
- `GET /api/products/{id}`: chi tiết sản phẩm.
- `PUT /api/products/{id}`: cập nhật sản phẩm.
- `DELETE /api/products/{id}`: xóa sản phẩm.

JSON mẫu khi thêm hoặc cập nhật:

```json
{
  "name": "Laptop Dell Inspiron",
  "price": 14500000
}
```

## API loại sản phẩm

- `GET /api/loaisanpham`: danh sách loại sản phẩm.
- `POST /api/loaisanpham`: thêm loại sản phẩm mới.
- `GET /api/loaisanpham/{id}`: chi tiết loại sản phẩm.
- `PUT /api/loaisanpham/{id}`: cập nhật loại sản phẩm.
- `DELETE /api/loaisanpham/{id}`: xóa loại sản phẩm.

JSON mẫu khi thêm hoặc cập nhật:

```json
{
  "tenloai": "Phụ kiện máy tính",
  "mota": "Chuột, bàn phím, tai nghe và thiết bị ngoại vi."
}
```

## API auth bằng Sanctum

- `POST /api/dangky`: đăng ký và nhận token.
- `POST /api/dangnhap`: đăng nhập và nhận token.
- `GET /api/profile`: xem thông tin user, cần Bearer token.
- `POST /api/logout`: xóa token hiện tại, cần Bearer token.

JSON đăng ký:

```json
{
  "name": "Nguyen Van A",
  "email": "vana@example.com",
  "password": "password123"
}
```

## Cấu hình database

Tạo database `la8`, sau đó kiểm tra `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=la8
DB_USERNAME=root
DB_PASSWORD=
```

## Lệnh chạy

```bash
composer install
php artisan migrate --seed
php artisan serve
php artisan test
```
