<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization');
        if($header == null || $header == "")
        {
            return "No valido";
        }

        $token = explode("Bearer ", $header)[1];
        $tokenDecoded = JWT::decode($token, new Key('MO3BFRivss}<$!y', 'HS256'));
        $userId = $tokenDecoded->user->id;
        $user = User::findOrFail($userId);
        if($user == null){
            return "Usuario no encontrado";
        }
        return $next($request);
    }
}
