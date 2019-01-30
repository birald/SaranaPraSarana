<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class kasi extends Authenticatable
{
    protected $table = "kasi";

    protected $fillable = [
        'tingkat','username', 'email', 'password', 'nip', 'no_hp', 'alamat', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
