<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach ($this->getPermissions() as $permission) {
            \Gate::define($permission->name, function ($user) use ($permission) {
                 return $user->hasRole($permission->roles);
            });
        }
    }

    private function getPermissions():Collection
    {
        if(Schema::hasTable('permissions')){
            return Permission::with('roles')->get();
        }
        return new Collection();
    }
}
