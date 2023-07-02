<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\UserService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    private $userService;

    public function __construct(ProductService $productService, UserService $userService)
    {
        $this->productService = $productService;
        $this->userService = $userService;
    }

    public function index(ListProductRequest $request)
    {
        $data = $request->validated();

        return view('admin.products.index', [
            'data' => $this->productService->index($data)
        ]);
    }

    public function show(Product $product)
    {
        return view('admin.products.show', ['item' => $product]);
    }

    public function create()
    {
        return view('admin.products.create', [
            'users' => $this->userService->index([], false)
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        Product::create($data);

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'item' => $product,
            'users' => $this->userService->index([], false)
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);

        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
