<?php

namespace App\Providers;

use App\Repositories\{
    TenantRepository,
    OccurrenceRepository
};
use App\Repositories\Contracts\{
    OccurrenceRepositoryInterface,
    TenantRepositoryInterface,
};


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TenantRepositoryInterface::class,
            TenantRepository::class
        );
        $this->app->bind(
            OccurrenceRepositoryInterface::class,
            TenantRepositoryInterface::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
