<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoaiSanPham as LoaiSanPhamResource;
use App\Models\LoaiSanPham;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoaiSanPhamController extends Controller
{
    public function index(): JsonResponse
    {
        $loaiSanPham = LoaiSanPham::all();

        return response()->json([
            'status' => true,
            'message' => 'Danh sách loại sản phẩm',
            'data' => LoaiSanPhamResource::collection($loaiSanPham),
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'tenloai' => ['required', 'string', 'max:255'],
            'mota' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors(),
            ], 200);
        }

        $loaiSanPham = LoaiSanPham::create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Loại sản phẩm đã lưu thành công',
            'data' => new LoaiSanPhamResource($loaiSanPham),
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $loaiSanPham = LoaiSanPham::find($id);

        if (is_null($loaiSanPham)) {
            return $this->notFound('Không có loại sản phẩm này');
        }

        return response()->json([
            'status' => true,
            'message' => 'Chi tiết loại sản phẩm',
            'data' => new LoaiSanPhamResource($loaiSanPham),
        ], 200);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $loaiSanPham = LoaiSanPham::find($id);

        if (is_null($loaiSanPham)) {
            return $this->notFound('Không có loại sản phẩm này');
        }

        $validator = Validator::make($request->all(), [
            'tenloai' => ['required', 'string', 'max:255'],
            'mota' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors(),
            ], 200);
        }

        $loaiSanPham->update($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Loại sản phẩm cập nhật thành công',
            'data' => new LoaiSanPhamResource($loaiSanPham),
        ], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $loaiSanPham = LoaiSanPham::find($id);

        if (is_null($loaiSanPham)) {
            return $this->notFound('Không có loại sản phẩm này');
        }

        $loaiSanPham->delete();

        return response()->json([
            'status' => true,
            'message' => 'Loại sản phẩm đã được xóa',
            'data' => [],
        ], 200);
    }

    private function notFound(string $message): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => [],
        ], 200);
    }
}
