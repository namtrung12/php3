<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nhập thông tin học sinh</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="col-6 m-auto pt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('hs_store') }}" class="p-3 border border-primary">
        @csrf
        <h3 class="h4 bg-info p-2 mx-n3 mt-n3 text-white">NHẬP THÔNG TIN HỌC SINH</h3>

        <div class="form-group row">
            <label class="col-3">Họ tên học sinh</label>
            <div class="col-9">
                <input value="{{ old('hoten') }}" type="text" class="form-control" name="hoten">
                @error('hoten')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3">Tuổi</label>
            <div class="col-9">
                <input value="{{ old('tuoi') }}" type="text" class="form-control" name="tuoi">
                @error('tuoi')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3">Ngày sinh</label>
            <div class="col-9">
                <input value="{{ old('ngaysinh') }}" type="text" class="form-control" name="ngaysinh">
                @error('ngaysinh')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary w-25">Lưu thông tin</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
