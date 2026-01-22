<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{

    protected $table = 'user';
    public $timestamps = false;

    protected $fillable = [
        'family',
        'first_name',
        'patronymic',
        'email',
        'login',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array{
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}
