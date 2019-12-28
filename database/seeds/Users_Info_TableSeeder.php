<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;
class Users_Info_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $TEXT = 'ABC';
        $id=0;
        for($i =10;$i<99;$i++){
            $TEXT++;
            $id++;
            DB::table('users_infos')->insert(
                [
                    'users_id'=>$id,
                   
                    'email'=>'0'.$i.'@gmail.com',
                    'avatar'=>asset('/data/DB1/upload/avatar/avatar.jpg'),
                    'cover_image'=>asset('/data/DB1/upload/avatar/avatar.jpg'),
                    'full_name'=>'Đinh Văn '.$TEXT,
                    'english_name'=>$TEXT,
                    'introduce'=>'TÔI ĐAM MÊ LẬP TRÌNH VỜ CÀ LỜ',
                    'nickname'=>$TEXT,
                    'birthday'=>'1996-12-02',
                    'sex'=>1,
                    'age'=>25,
                    'nation'=>1,
                    'working_day'=>'1996-12-02',
                    'postal_code'=>'12345678910',
                    'address_1'=>'Quảng Ngãi',
                    'address_2'=>'Quảng Ngãi',
                    'address_3'=>'Quảng Ngãi',
                    'company_name'=>'24hcode',
                    'city_name'=>'Quảng Ngãi',
                    'provincial'=>'Tỉnh Quảng Ngãi',
                    'phone_number'=>'096633444',
                    'internal_number'=>'0966334404',
                    'fax'=>'0966334404',
                    'mobile_number'=>'0966334404',
                ]
            );
        }
    }
}
