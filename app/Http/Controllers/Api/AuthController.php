<?php
namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;
use Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Users;
class AuthController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }
    public function login(Request $request){

        $credentials = $request->only('username', 'password');

        $token = null;
        try {
           if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['invalid_email_or_password'], 422);
           }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json($token);
    }


}
