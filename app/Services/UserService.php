<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;

class UserService
{
    /**
     * @param array $data
     * @param bool|null $paginate
     * @return mixed
     */
    public function index(array $data, ?bool $paginate = true)
    {
        $users = User::query()->with('products');

        if (!empty($data['search'])) {
            $users = $users->where('name', 'like', "%{$data['search']}%");
        }

        if (!empty($data['date_from']) && !empty($data['date_to'])) {
            $users = $users->whereBetween('created_at', [
                Carbon::parse($data['date_from'])->startOfDay()->toDateTimeString(),
                Carbon::parse($data['date_to'])->endOfDay()->toDateTimeString(),
            ]);
        }

        if ($paginate) {
            return $users->paginate(5);
        }

        return $users->get()->pluck('name', 'id')->toArray();
    }
}
