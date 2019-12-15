<?php
namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;
use Hash;
use App\Models\Users;

class UserController extends Controller
{   
    public function getUserAll(Request $Request)
    {
        return Users::select('id','name','email')->get();
    }
    public function userDelete(Request $Request,int $id=null)
    {
        return Users::where('id','=',$id)->delete();
    }
}