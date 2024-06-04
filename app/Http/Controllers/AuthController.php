<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;

class AuthController extends Controller
{
    use HttpResponses;

    public function login()
    {
        return $this->ok('Login success');
    }
}
