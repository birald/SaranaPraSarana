<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class penggunaan_dana extends Authenticatable
{
    protected $table = "penggunaan_dana";

    protected $fillable = ['proposal_id','dokumen','dokumen_persetujuan','jumlah','updated_at','created_at'];

    public function proposal(){
    	return $this->belongsTo(proposal::class, 'proposal_id');
    }
}
