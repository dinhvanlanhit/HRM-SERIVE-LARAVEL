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
use App\Database\DatabaseConfig;
class ProfileController extends Controller
{

    public function getProfile(Request $request){
        return  response()->json( Users::find(JWTAuth::parseToken()->authenticate()->id)->users->toArray());
    }
    public function postUpdateProfile(Request $request)
    {
        $UsersInfo = UsersInfo::find(JWTAuth::parseToken()->authenticate()->id);
        $UsersInfo->full_name= $request->full_name;
        $UsersInfo->english_name=$request->english_name;
        $UsersInfo->nickname=$request->nickname;
        $UsersInfo->email=$request->email;
        $UsersInfo->birthday=$request->birthday;
        $UsersInfo->sex=$request->sex;
        $UsersInfo->working_day=$request->working_day;
        $UsersInfo->introduce =$request->introduce;
        $UsersInfo->nation =$request->nation;
        $UsersInfo->postal_code =$request->postal_code;
        $UsersInfo->address_1 =$request->address_1;
        $UsersInfo->address_2 =$request->address_2;
        $UsersInfo->address_3 =$request->address_3;
        $UsersInfo->company_name =$request->company_name;
        $UsersInfo->city_name =$request->city_name;
        $UsersInfo->provincial =$request->provincial;
        $UsersInfo->phone_number =$request->phone_number;
        $UsersInfo->internal_number =$request->internal_number;
        $UsersInfo->fax =$request->fax;
        $UsersInfo->mobile_number =$request->mobile_number;
        $UsersInfo->skin_class =$request->skin_class;
        $UsersInfo->save();
        return  $UsersInfo;
    }
    public function postChangeAvatar(Request $request)
    {
        if($request->hasFile('FILE'))
        {       
                $urlFile = 'data/'.JWTAuth::parseToken()->authenticate()->database_name.'/upload/avatar/';    
                $file      = $request->file('FILE');
                $filename  = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture   = date('His').'-'.$filename;
                $file->move(public_path($urlFile), $picture);
                $UsersInfo = UsersInfo::find(JWTAuth::parseToken()->authenticate()->id);
                $UsersInfo->avatar =$urlFile.$picture;
                $UsersInfo->save();
                return response()->json(["message" => "Image Uploaded Succesfully"]);
        }else{
          
        }
       
        
      
    }
}
