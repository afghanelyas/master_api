<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use HttpResponses;

    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = User::create([
            'uuid' => Str::uuid()->toString(),
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return $this->successResponse([
            'user' => new UserResource($user),
            'token' => $user->createToken('auth_token'.$user->name)->plainTextToken,
        ], 201);
    }
}
