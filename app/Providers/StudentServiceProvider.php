<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StudentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        App::bind('student', function()
        {
            return new \App\Facades\Student;

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
