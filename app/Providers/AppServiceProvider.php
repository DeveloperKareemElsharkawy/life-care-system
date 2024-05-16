<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Validator::extend('phone_number_eg', function ($attribute, $value, $parameters) {
//            return in_array(substr($value, 0, 3), ['010', '011', '012', '015']);
//        });
//
//        Validator::extend('phone_number_qa', function ($attribute, $value, $parameters) {
//            return in_array(substr($value, 0, 1), ['3', '7', '5', '6']) && strlen($value) == 8;
//        });
    }


}
