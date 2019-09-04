<?php

namespace MilanTarami\MoneyFormatter;

use Exception;
use MilanTarami\MoneyFormatter\Formatter;

class MoneyFormat
{

    private $localeSymbol = [
        'np' => 'रू',
        'us' => '$',
        'in' => '₹',
    ];
    
    public function get($input, $countryCode, $enableCurrencySymbol = false, $customCurrencySymbol = '')
    {
        $countryCode = trim(strtolower($countryCode));
        $currencySymbol = empty($customCurrencySymbol) ? $this->localeSymbol[$countryCode] : $customCurrencySymbol;
        $formatter = new Formatter();
        switch (strtolower($countryCode)) {
            case 'np':
                $formattedInput = $formatter->southAsianNumberFormat($input);
                break;
            case 'us':
                $formattedInput = $formatter->internationalNumberFormat($input);
                break;
            default:
                throw new Exception('Country Code not found !');
        }
        $result = $this->processResult($formattedInput, $enableCurrencySymbol, $currencySymbol);
        return $result;
    }

    private function processResult($formattedInput, $enableCurrencySymbol, $currencySymbol)
    {
        if ($enableCurrencySymbol) {
            return  $currencySymbol . ' ' . $formattedInput;
        }
        return $formattedInput;
    }

}
