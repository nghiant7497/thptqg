<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\CongBoDiem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cbdiem = CongBoDiem::find(1);
        $val = false;
        if($cbdiem->DaCB == 0)
            $val = false;
        else
            $val = true;
        View::share('isCongBo',$val);

        view()->composer('*', function ($view) {
            $view->with('user_login', Auth::user());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
