<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        // Gate::before(function (User $user) {
        //     return true;
        // });

        Gate::define('view-post', function (User $user, Post $post) {
            if ($post->acceso === 'publico') {
                return true;
            }
            if ($post->user_id === $user->id) {
                return true;
            }
            return false;
        });

        Gate::define('create-post', function () {
            return auth()->user() ? true : false;
        });

        Gate::define('edit-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
    }
}
