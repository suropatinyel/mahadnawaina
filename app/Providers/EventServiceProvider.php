<?php

namespace App\Providers;

use Illuminate\Auth\Events\Authenticated;
use App\Listeners\CreateSantriIfNotExists;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
    
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
    protected $listen = [
        Authenticated::class => [
            CreateSantriIfNotExists::class,
        ],
    ];
}
