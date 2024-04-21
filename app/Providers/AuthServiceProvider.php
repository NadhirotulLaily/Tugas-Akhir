<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    public static $permission = [
        'dashboard' => ['admin', 'user'],
        'index-user' => ['superadmin'],
        'index-rekap' => ['superadmin', 'user'],
        'index-admin'=> ['admin'],
        'pilih-tugas' => ['user'],
        ''
        

    ];
    /**
     * The policy mappings for the application.
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

    Gate::before(function (User $user) {
        if ($user->role === 'superadmin'){
            return true;
        }
    });
    //Gate::define('dashboard', function (User $user) {
       // if ($user->role == 'superadmin' || $user->role == 'admin') {
            //return true;
        //}
    //});

    foreach(self::$permission as $action => $roles){
        Gate::define($action, function (User $user) use ($roles){
            if (in_array($user->role, $roles)){
                return true;
            }
        });
    }
    }

}
