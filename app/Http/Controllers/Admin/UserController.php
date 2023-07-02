<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListUsersRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use App\Traits\UserTrait;

class UserController extends Controller
{
    use UserTrait;

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(ListUsersRequest $request)
    {
        $data = $request->validated();
        $users = $this->userService->index($data);

        return view('admin.users.index', ['data' => $users]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', ['item' => $user]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['item' => $user]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $request->validate([
            'email' => 'unique:users,email,'. $user->id
        ]);
        $data = $request->validated();
        $user->update($data);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
