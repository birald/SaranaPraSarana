<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tim_verifikasi extends Authenticatable
{
    protected $table = "tim_verifikasi";

    protected $fillable = [
        'username', 'email', 'password', 'nip', 'no_hp', 'alamat', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
