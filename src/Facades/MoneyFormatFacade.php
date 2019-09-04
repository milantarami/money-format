<?php

namespace MilanTarami\MoneyFormatter\Facades;

use Illuminate\Support\Facades\Facade;

class MoneyFormatFacade extends Facade {

    protected static function getFacadeAccessor() {
        return 'moneyformat';
    }

}
