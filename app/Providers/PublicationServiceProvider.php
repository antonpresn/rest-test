<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PublicationService;

/**
 * Регистрирует сервис публикации 
 * 
 */
class PublicationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PublicationService::class, function ($app) {
            return new PublicationService(config('publication_service'));
        });
    }
}
