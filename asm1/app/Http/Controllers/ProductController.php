<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = trim((string) $request->query('keyword', ''));

        $query = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->orderByDesc('products.id');

        if ($keyword !== '') {
            $query->where('products.name', 'like', '%' . $keyword . '%');
        }

        $products = $query->paginate(5)->withQueryString();

        return view('products.index', compact('products', 'keyword'));
    }

    public function create()
    {
        $categories = DB::table('categories')->orderBy('name')->get();

        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $imagePath = $this->uploadImage($request);

        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imagePath,
            'describe' => $request->describe,
            'category_id' => $request->category_id,
            'status' => (bool) $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Them moi san pham thanh cong');
    }

    public function show(string $id)
    {
        return redirect()->route('products.edit', $id);
    }

    public function edit(string $id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'San pham khong ton tai');
        }

        $categories = DB::table('categories')->orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, string $id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'San pham khong ton tai');
        }

        $imagePath = $product->image;

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request);
            $this->deleteImage($product->image);
        }

        DB::table('products')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imagePath,
            'describe' => $request->describe,
            'category_id' => $request->category_id,
            'status' => (bool) $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Cap nhat san pham thanh cong');
    }

    public function destroy(string $id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'San pham khong ton tai');
        }

        DB::table('products')->where('id', $id)->delete();
        $this->deleteImage($product->image);

        return redirect()->route('products.index')->with('success', 'Xoa san pham thanh cong');
    }

    private function uploadImage(Request $request): string
    {
        $directory = public_path('uploads/products');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $file = $request->file('image');
        $fileName = now()->format('YmdHis') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $fileName);

        return 'uploads/products/' . $fileName;
    }

    private function deleteImage(?string $imagePath): void
    {
        if (!$imagePath) {
            return;
        }

        $absolutePath = public_path($imagePath);

        if (File::exists($absolutePath)) {
            File::delete($absolutePath);
        }
    }
}
