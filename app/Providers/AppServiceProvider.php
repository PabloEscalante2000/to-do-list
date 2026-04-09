<?php

namespace App\Providers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;
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
        Gate::define("view-admin",function(User $user){
            if($user->id === 1){
                return Response::allow();
            }
            return Response::denyAsNotFound();
        });

        Gate::define("manage-idea",function(User $user, Idea $idea){
            return $user->id === $idea->user_id
                ? Response::allow()
                : Response::deny("No puedes modificar esta idea");
        });
    }
}
