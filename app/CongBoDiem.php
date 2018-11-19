<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongBoDiem extends Model
{
    protected $table = "congbodiem";
    protected $dates = ['ThoiGian'];
    public $timestamps = false;
}
