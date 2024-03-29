<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Student' => 'App\Policies\StudentPolicy',
        'App\Teacher' => 'App\Policies\TeacherPolicy',
        'App\Subject' => 'App\Policies\SubjectPolicy',
        'App\MyClass' => 'App\Policies\ClassPolicy',
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
    }
}
