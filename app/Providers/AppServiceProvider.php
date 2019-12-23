<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        // Fechas en español
        Carbon::setLocale('es');
        Carbon::setUtf8(true); //Codificación de caracteres (acentos)
        setlocale(LC_TIME, 'es_ES');

        // Longitud por defecto para los campos varchar en la base de datos
        Schema::defaultStringLength(191);
    }
}
