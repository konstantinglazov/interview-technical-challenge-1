<?php

namespace App\Providers;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\EloquentRepositoryInterface;
use App\Repositories\ParkingSpotRepository;
use App\Repositories\Interfaces\ParkingSpotRepositoryInterface;

use Illuminate\Support\ServiceProvider;


class RepisitoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            EloquentRepositoryInterface::class,
            BaseRepository::class,
        );


        $this->app->bind(
            ParkingSpotRepositoryInterface::class,
            ParkingSpotRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
