<?php

namespace Modules\UserManaging\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\UserManaging\Database\Factories\MyUserFactory;

class MyUser extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'username',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    // protected static function newFactory(): MyUserFactory
    // {
    //     // return MyUserFactory::new();
    // }
}
