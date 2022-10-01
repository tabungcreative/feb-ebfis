<?php

namespace App\Providers;

use App\Services\Eloquent\ProgramServiceImpl;
use App\Services\ProgramService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ProgramServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ProgramService::class => ProgramServiceImpl::class,
    ];

    public function provides(): array
    {
        return [ProgramService::class];
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
