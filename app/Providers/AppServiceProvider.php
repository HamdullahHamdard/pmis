<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;

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
        //
        // In AppServiceProvider boot()
Permission::firstOrCreate(['name' => 'view-stock']);
Permission::firstOrCreate(['name' => 'view-usables']);
    }
}
