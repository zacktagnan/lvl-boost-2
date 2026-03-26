<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Corrección: siempre activos
        Model::preventSilentlyDiscardingAttributes();
        Model::preventAccessingMissingAttributes();

        // Rendimiento: solo en desarrollo
        Model::preventLazyLoading(!$this->app->isProduction());
    }
}
