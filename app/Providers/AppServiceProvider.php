<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function registerRoutes()
    {
        $registry = $this->app->make(RouteRegistry::class);

        if ($registry->isEmpty()){
            Log::info('Not adding any service routes -- route file is missing');
            return;
        }

        $registry->bind(app());
    }
}
