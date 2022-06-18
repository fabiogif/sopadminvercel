<?php

namespace App\Providers;

use App\Repositories\{
    ClientConsumerRepository,
    ClientRepository,
    TenantRepository,
    OccurrenceRepository
};
use App\Repositories\Contracts\{
    ClientConsumerRepositoryInterface,
    ClientRepositoryInterface,
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
            OccurrenceRepository::class
        );
        $this->app->bind(
            ClientRepositoryInterface::class,
            ClientRepository::class
        );    
        $this->app->bind(
            ClientConsumerRepositoryInterface::class,
            ClientConsumerRepository::class
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
