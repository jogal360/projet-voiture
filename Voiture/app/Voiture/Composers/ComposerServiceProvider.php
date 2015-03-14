<?php namespace Voiture\Composers;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider{
    public function register()
    {
        $this->app->view->composer('moderateur-com/panel-mod', 'Voiture\Composers\HomeModerateurComposer');
    }
}