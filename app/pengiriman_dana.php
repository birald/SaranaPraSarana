<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class pengiriman_dana extends Authenticatable
{
    protected $table = "pengiriman_dana";

    protected $fillable = ['proposal_id','jumlah','foto','dokumen','updated_at','created_at'];

    public function proposal(){
    	return $this->belongsTo(proposal::class, 'proposal_id');
    }
}
