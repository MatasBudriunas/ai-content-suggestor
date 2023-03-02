<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orhanerday\OpenAi\OpenAi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(OpenAi::class, function () {
            return new OpenAi(env('OPEN_AI_API_KEY'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
