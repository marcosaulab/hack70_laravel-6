<?php

namespace App\Providers;

use App\Models\Format;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(!app()->runningInConsole()) { // ! serve per escludere i comandi da consolle (php artisan...)
            $formats = Format::all(); // ! prendo tutti i formats
            View::share('formati', $formats);
        }

    }
}
