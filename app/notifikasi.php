<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class notifikasi extends Authenticatable
{
    protected $table = "notifikasi";

     protected $fillable = [
        'proposal_id','dari', 'tujuan','deskripsi','tingkat', 'status', 'created_at', 'updated_at'
    ];

    public function proposal(){
    	return $this->belongsTo(proposal::class, 'proposal_id');
    }
}
