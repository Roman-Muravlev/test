<?php

namespace App\Services;


use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductService
{
    public function index(array $data): LengthAwarePaginator
    {
        $products = Product::query()->with('user')->isActive();

        if (!empty($data['search'])) {
            $products = $products->where('name', 'like', "%{$data['search']}%")
                ->orWhere('description', 'like', "%{$data['search']}%")
                ->orWhereHas('user', function ($query) use ($data) {
                    return $query->where('name', 'like', "%{$data['search']}%");
                });
        }

        if (!empty($data['date_from']) && !empty($data['date_to'])) {
            $products = $products->whereBetween('created_at', [
                Carbon::parse($data['date_from'])->startOfDay()->toDateTimeString(),
                Carbon::parse($data['date_to'])->endOfDay()->toDateTimeString(),
            ]);
        }

        return $products->paginate(5);
    }
}
