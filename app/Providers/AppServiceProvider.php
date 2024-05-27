<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// added
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;

use App\Models\Member;
use App\Observers\Status;

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
        Validator::extend('username', function ($attribute, $value, $parameters, $validator) {
            // Your validation logic here
            return preg_match('/^[a-zA-Z0-9_]+$/', $value);
        });
    }

    public function passes($attribute, $value)
    {
        // Define your custom validation logic here
        return preg_match('/^[a-zA-Z0-9_]+$/', $value);
    }
}
