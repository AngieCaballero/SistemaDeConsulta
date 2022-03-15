<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class LoginController extends Controller
{
    public function logIn($request)
    {
        $isValid = Validator::make($request, [
            'name' => 'required|max:255',
            'password' => 'required|min:6',
        ]);

        if(!$isValid)
        {
            return ['mensaje' => "Es invalido"];
        }
        return ['token' => "Este es su puto token"];

    }
}
