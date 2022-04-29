<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AdminMiddleware
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

        if(!$user['admin'])
        {
            return "Sin permisos de administrador";
        }

        return $next($request);
    }
}
