<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();
        // Gate::define('update-faq', function ($user, $faq) 
        // { 
        //     return $user->id == $faq->user_id;
        // });

        Schema::defaultStringLength(191);
    }

}
