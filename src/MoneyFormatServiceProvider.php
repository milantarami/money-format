<?php

namespace MilanTarami\MoneyFormatter;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use MilanTarami\MoneyFormatter\MoneyFormat;

class MoneyFormatServiceProvider extends ServiceProvider
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
        
        $this->app->bind('moneyformat', function() {
            return new MoneyFormat();
        });

        AliasLoader::getInstance()->alias('MoneyFormat', 'MilanTarami\MoneyFormatter\Facades\MoneyFormatFacade');
    }
}
