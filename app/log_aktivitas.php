<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class log_aktivitas extends Authenticatable
{
    protected $table = "log_aktivitas";

     protected $fillable = [
        'proposal_id','data_id', 'deskripsi', 'dari', 'created_at', 'updated_at'
    ];

    public function proposal(){
    	return $this->belongsTo(proposal::class, 'proposal_id');
    }
}
