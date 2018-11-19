<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BangSo extends Model
{
    protected $table = "bangso";
    public $incrementing = false;

    public function thisinh(){
        return $this->hasMany('App\ThiSinh','MaCum','id');
    }
}
