<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Bouncer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Bouncer::cache();

        Bouncer::seeder(function () {
            Bouncer::allow('admin')->to(['manage-users', 'delete-users', 'manage-reports']);
            Bouncer::allow('developer')->to(['manage-users', 'delete-users', 'manage-reports']);
            Bouncer::allow('moderator')->to(['manage-users', 'manage-reports']);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
