<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    public function users()
    {
        return $this->hasOne('App\Models\UsersInfo','users_id','id');
    }
}
