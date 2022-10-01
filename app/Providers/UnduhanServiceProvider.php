<?php

namespace App\Providers;

use App\Services\Eloquent\UnduhanServiceImpl;
use App\Services\UnduhanService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UnduhanServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        UnduhanService::class => UnduhanServiceImpl::class,
    ];

    public function provides(): array
    {
        return [UnduhanService::class];
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
