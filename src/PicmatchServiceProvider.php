<?php

namespace edgewizz\picmatch;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class PicmatchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Edgewizz\Picmatch\Controllers\PicmatchController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // dd($this);
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__ . '/components', 'picmatch');
        Blade::component('picmatch::picmatch.open', 'picmatch.open');
        Blade::component('picmatch::picmatch.index', 'picmatch.index');
        Blade::component('picmatch::picmatch.edit', 'picmatch.edit');
    }
}
