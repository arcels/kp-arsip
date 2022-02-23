<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $fillable = ['id','user_name', 'user_pengguna','password','user_email','user_role','user_status'];
    protected $table = "users";

    protected $primaryKey = "id";

}
