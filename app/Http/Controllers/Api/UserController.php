<?php
namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;
use Hash;
use App\Models\Users;
use App\Models\UsersInfo;

class UserController extends Controller
{
    public function getUserAll(Request $Request)
    {
        return Users::select('id','name','email')->get();
    }
    public function getUserInfo(Request $request){

        return  response()->json( Users::find(JWTAuth::parseToken()->authenticate()->id)->users->toArray());
        // return response()->json(JWTAuth::parseToken()->authenticate()->id);
    }
}
