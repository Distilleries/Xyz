<?php


namespace Verdikt\Providers;


use Illuminate\Support\ServiceProvider;
use Verdikt\States\StateDisplayer;
use \File;

class VerdiktServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('Verdikt\Contracts\StateDisplayerContract', function($app)
        {
            return new StateDisplayer;
        });


        $this->registerCommands();

    }

    protected function registerCommands(){
        $files = File::allFiles(__DIR__.'/../Console/');


        foreach($files as $file){
            if(strpos($file->getPathName(),'Lib') === false){
                $this->commands('Verdikt\Console\\'.preg_replace('/\.php/i','',$file->getFilename()));
            }


        }
    }


}
