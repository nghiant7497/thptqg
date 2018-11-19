<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThiSinh extends Model
{
    protected $table = "thisinh";
    protected $dates = ['NgaySinh'];

    public function bangso(){
        return $this->belongsTo('App\BangSo','MaCum','id');
    }

    public function tkthisinh(){
        return $this->hasOne('App\TKThiSinh','idThiSinh','id');
    }
}
