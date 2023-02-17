<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class InfoCommonFieldsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::macro('infoCommonFields', function () {
            $this->string('created_by', 255)->nullable();
            $this->string('updated_by', 255)->nullable();
            $this->string('deleted_by', 255)->nullable();
        });
    }
}
