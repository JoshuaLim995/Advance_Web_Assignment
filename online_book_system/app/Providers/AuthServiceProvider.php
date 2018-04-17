<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Book;
use App\User;
use App\Category;

use App\Policies\BookPolicy;
use App\Policies\UserPolicy;
use App\Policies\CategoryPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
 //       'App\Model' => 'App\Policies\ModelPolicy',
        Book::class => BookPolicy::class,
        User::class => UserPolicy::class,        
        Category::class => CategoryPolicy::class,        
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
