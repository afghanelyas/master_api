<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiLoginRequest;
use App\Traits\HttpResponses;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(ApiLoginRequest $request)
    {
        return $this->ok($request->get('email'));
    }

    public function register()
    {
        return $this->register('User registered successfully');
    }
}
