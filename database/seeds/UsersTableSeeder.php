<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =10;$i<99;$i++){
            DB::table('users')->insert(
                [
                    'username' => '0'.$i,
                    'email' => '0'.$i.'@gmail.com',
                    'password' => bcrypt('12345'),
                ]
            );
        }
       
    }
}
