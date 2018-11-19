<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminPhanQuyenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = \Auth::user();
            if($user->quyen == 1)
                return $next($request);
            else
                return redirect('admin/trangchu')->with('thongbao', 'Bạn không có đủ quyền truy cập');
        }
        else{
            return redirect('admin/dangnhap');
        }
    }
}
