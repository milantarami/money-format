<?php

namespace MilanTarami\MoneyFormatter\Facades;

use Illuminate\Support\Facades\Facade;

class MoneyFormat extends Facade {

    protected static function getFacadeAccessor() {
        return 'moneyformat';
    }

}
