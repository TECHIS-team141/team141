<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use Illuminate\Support\Facades\Schema; //この行を追加
use Illuminate\Support\Facades\URL; //この行を追加

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

    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        // // 管理者
        // Gate::define('admin-higher'. function($user) {
        //     return( $user->role === 1);
        // });

        // // 一般
        // Gate::define('user-higher', function($user) {
        //     return ($user->role === 0 );
        // });
    }
}
