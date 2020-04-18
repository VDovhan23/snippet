<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Transformers\Users\PublicUserTransformer;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user  ) {
        return fractal()
            ->item($user)
            ->transformWith(new PublicUserTransformer())
            ->toArray();
    }
}