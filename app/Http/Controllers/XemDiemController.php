<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThiSinh;

class XemDiemController extends Controller
{
    public function getXemDiem($SBD){
        if(strlen($SBD) != 8)
            return redirect('/');
        $thisinh = ThiSinh::where('SBD', $SBD)->first();

        return view('front.xemdiem',['thisinh' => $thisinh]);
    }
}
