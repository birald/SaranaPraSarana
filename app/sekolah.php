<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class sekolah extends Authenticatable
{
    protected $table = "sekolah";

    protected $fillable = [
        'nama', 'tingkat', 'npsn', 'alamat', 'telepon', 'email', 'password', 'no_rekening', 'atas_nama', 'nama_bank', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function proposal(){
    	return $this->hasMany(proposal::class);
    }
}
