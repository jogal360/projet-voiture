<?php
/**
 * Created by PhpStorm.
 * User: Joaquin
 * Date: 17/12/2014
 * Time: 11:52 PM
 */

namespace Voiture\Components;


use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['field'] = $this->app->share(function($app)
        {
            $fieldBuilder = new FieldBuilder($app['form'],$app['view'], $app['session.store']);
            return $fieldBuilder;
        });
    }

} 