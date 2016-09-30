<?php
/**
 * Created by PhpStorm.
 * User: KAT
 * Date: 26/09/2016
 * Time: 05:09 م
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        view()->composer(
            '*', 'App\Http\ViewComposers\AppComposer'
        );

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
