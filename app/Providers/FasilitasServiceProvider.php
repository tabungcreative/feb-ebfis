<?php

namespace App\Providers;

use App\Services\Eloquent\FasilitasServiceImpl;
use App\Services\FasilitasService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FasilitasServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        FasilitasService::class => FasilitasServiceImpl::class,
    ];

    public function provides(): array
    {
        return [FasilitasService::class];
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
