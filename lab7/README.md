# Lab 7 - Validation & Send Mail

## Route kiểm tra

- `GET /hs`: form nhập thông tin học sinh.
- `POST /hs`: validate bằng `$request->validate()`.
- `GET /sv`: form nhập thông tin sinh viên.
- `POST /sv`: validate bằng `App\Http\Requests\RuleNhapSV`.
- `GET /guimail`: gửi mail bằng Mailgun khi đã cấu hình API key.

## Cấu hình database

Tạo database `la7`, sau đó kiểm tra các biến trong `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=la7
DB_USERNAME=root
DB_PASSWORD=
```

## Cấu hình Mailgun

Điền thông tin thật trước khi mở `/guimail`:

```env
MAIL_MAILER=mailgun
MAIL_FROM_ADDRESS="postmaster@example.com"
MAIL_TO_ADDRESS="nguoinhan@example.com"
MAILGUN_DOMAIN=
MAILGUN_SECRET=
MAILGUN_ENDPOINT=api.mailgun.net
```

## Lệnh chạy

```bash
composer install
php artisan serve
php artisan test
```
