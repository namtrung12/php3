<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all();

        return response()->json([
            'status' => true,
            'message' => 'Danh sách sản phẩm',
            'data' => ProductResource::collection($products),
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors(),
            ], 200);
        }

        $product = Product::create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Sản phẩm đã lưu thành công',
            'data' => new ProductResource($product),
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return $this->notFound('Không có sản phẩm này');
        }

        return response()->json([
            'status' => true,
            'message' => 'Chi tiết sản phẩm',
            'data' => new ProductResource($product),
        ], 200);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return $this->notFound('Không có sản phẩm này');
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors(),
            ], 200);
        }

        $product->update($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Sản phẩm cập nhật thành công',
            'data' => new ProductResource($product),
        ], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return $this->notFound('Không có sản phẩm này');
        }

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sản phẩm đã được xóa',
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
