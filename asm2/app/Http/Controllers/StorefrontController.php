<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class StorefrontController extends Controller
{
    public function index(Request $request): View
    {
        $keyword = trim((string) $request->query('keyword', ''));
        $categoryId = $request->query('category_id');

        if (! Schema::hasTable('categories') || ! Schema::hasTable('products')) {
            return view('client.home', [
                'categories' => collect(),
                'products' => new LengthAwarePaginator([], 0, 9),
                'keyword' => $keyword,
                'selectedCategoryId' => null,
            ]);
        }

        $categories = Category::query()
            ->where('status', 1)
            ->orderBy('name')
            ->get();

        $productsQuery = Product::query()
            ->with('category')
            ->where('status', 1)
            ->orderByDesc('id');

        if ($keyword !== '') {
            $productsQuery->where('name', 'like', '%' . $keyword . '%');
        }

        if (is_numeric($categoryId)) {
            $productsQuery->where('category_id', (int) $categoryId);
        }

        $products = $productsQuery
            ->paginate(9)
            ->withQueryString();

        return view('client.home', [
            'categories' => $categories,
            'products' => $products,
            'keyword' => $keyword,
            'selectedCategoryId' => is_numeric($categoryId) ? (int) $categoryId : null,
        ]);
    }

    public function show(Product $product): View
    {
        if ((int) $product->status !== 1) {
            abort(404);
        }

        $product->load('category');

        return view('client.product-detail', compact('product'));
    }
}
