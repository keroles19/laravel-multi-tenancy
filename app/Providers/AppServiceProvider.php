<?php

namespace App\Providers;

use App\Models\Scopes\TenantScope;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::addGlobalScope(new TenantScope());

    }
}
