<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Passport::routes();
        Passport::hashClientSecrets();
        Passport::tokensExpireIn(now()->addMinutes(5)); // these are very short on purpose!
        Passport::refreshTokensExpireIn(now()->addMinutes(30)); // these are very short on purpose!
        Passport::personalAccessTokensExpireIn(now()->addHours(1)); // these are very short on purpose!
    }
}
