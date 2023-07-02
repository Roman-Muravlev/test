<?php

namespace App\Traits;

use App\Http\Requests\UserPasswordRequest;
use App\Models\User;

trait UserTrait {

    public function changePassword(UserPasswordRequest $request, User $user)
    {
        $data = $request->validated();

        if (bcrypt($data['old_password']) == $user->password) {
            $user->update(['password' => bcrypt($data['password'])]);
        }

        return redirect()->route('admin.users.index');
    }
}
