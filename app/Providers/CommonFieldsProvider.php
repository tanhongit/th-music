<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class CommonFieldsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Using for migration files
        Blueprint::macro('commonFields', function () {
            $this->timestamp('created_at')->nullable();
            $this->timestamp('updated_at')->nullable();
            $this->timestamp('deleted_at')->nullable();
        });
    }
}
