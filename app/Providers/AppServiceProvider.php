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
        Validator::extend('not_only_spaces', function ($attribute, $value, $parameters, $validator) {
        return trim($value) !== '';
    }, '名前は空白のみでは登録できません。');
        // Validator::extend('not_only_spaces', function($attribute, $value, $parameters, $validator) {
        // return !preg_match('/^[\s\x{3000}]+$/u', $value);
    }
}
