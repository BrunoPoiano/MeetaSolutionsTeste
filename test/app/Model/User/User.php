<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name','username', 'email','password'];
}
