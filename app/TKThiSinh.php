<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TKThiSinh extends Model
{
    protected $table = "tkthisinh";

    public function thisinh(){
        return $this->belongsTo('App\ThiSinh','idThiSinh','id');
    }
}
