<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserShowResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function paginate()
    {
        $users = User::query()
            ->orderByDesc('created_at')
            ->paginate(\request()->query('pagination',20));
        return UserShowResource::collection($users);
    }
}
