<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\Scopes\TenantScope;
use App\Models\User;
use App\Observers\DepartmentObserver;
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

        // Observer
        Department::observe(DepartmentObserver::class);
    }
}
