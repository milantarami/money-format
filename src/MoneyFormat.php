<?php

namespace MilanTarami\MoneyFormatter;

use Exception;

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
        switch (strtolower($countryCode)) {
            case 'np':
                  $formattedInput = $this->np($input);
                break;
            case 'us':
            $formattedInput = $this->np($input);
                break;
            default:
                throw new Exception('Country Code not found !');
        }
        $result = $this->processResult($formattedInput, $enableCurrencySymbol, $currencySymbol);
        return $result;
    }

    private function processResult($formattedInput, $enableCurrencySymbol, $currencySymbol)
    {
        if($enableCurrencySymbol) {
            return  $currencySymbol . ' ' . $formattedInput;
        }
        return $formattedInput;
    }


    private function np($number)
    {
        $splitted_number = explode('.', $number);
        if ($splitted_number[0] < 1000)
            return $number;
        else {
            list($aboveHundreds, $hundreds) = preg_split('/(?<=.{' . (strlen($splitted_number[0]) - 3) . '})/', $splitted_number[0], 2);
            $aboveHundreds = str_split(strrev($aboveHundreds), 2);
            $result = strrev(join(',', $aboveHundreds)) . ',' . $hundreds;
            $result .= !empty($splitted_number[1]) ? '.' . $splitted_number[1] : '';
            return $result;
        }
    }


}
