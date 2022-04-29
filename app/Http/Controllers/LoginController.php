<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Firebase\JWT\Key;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class LoginController extends Controller
{
    protected $secretKey = 'MO3BFRivss}<$!y';
    protected $algorit = 'HS256';


    public function logIn(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'password' => 'required|min:4',
        ]);
        
        $request = $request->all();

        try {
            if (Auth::attempt([
            'name' => $request['name'],
            'password' => $request['password']
        ])) {
                $token = JWT::encode([
                'iat' => time(),
                'exp' => time() + (60 * 60),
                'aud' => sha1($_SERVER['REMOTE_ADDR']),
                'user' => Auth::user()
            ], $this->secretKey, $this->algorit);
                return response()->json([
                'accessToken' => $token
            ]);
            } else {
                
                return "no";
            }
        } catch(Exception $e)
        {
            echo 'Error: ' + $e->getMessage();
        }
    }

    public function getUser(Request $request)
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
        return $user;
    }

    

    
}
