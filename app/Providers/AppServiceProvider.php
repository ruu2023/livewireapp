<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        // ユーザー権限を定義
        Gate::define('is-user' , function($user, $user_id) {
            return $user->id == $user_id;
        });

        // 管理者権限を定義
        Gate::define('is-admin', function($user):bool {
            return $user->is_admin != null;
        });
    }
}
