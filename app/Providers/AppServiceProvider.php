<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\SiswaRepositoryInterface;
use App\Repositories\Eloquent\SiswaRepository;
use App\Repositories\Contracts\RayonRepositoryInterface;
use App\Repositories\Eloquent\RayonRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(SiswaRepositoryInterface::class, SiswaRepository::class);
        $this->app->bind(RayonRepositoryInterface::class, RayonRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
