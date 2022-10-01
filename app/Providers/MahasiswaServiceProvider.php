<?php

namespace App\Providers;

use App\Services\Eloquent\MahasiswaServiceImpl;
use App\Services\MahasiswaService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MahasiswaServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        MahasiswaService::class => MahasiswaServiceImpl::class,
    ];

    public function provides(): array
    {
        return [MahasiswaService::class];
    }





    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
