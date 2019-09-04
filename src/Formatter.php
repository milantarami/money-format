<?php

namespace MilanTarami\MoneyFormatter;

use MilanTarami\MoneyFormatter\MoneyFormat;

class Formatter extends MoneyFormat
{


    public function southAsianNumberFormat($number)
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

    public function internationalNumberFormat($number)
    {
        $input = number_format(($number * 100) / 100, 2, '.', '');
        list($integerVal, $pointVal) = explode('.', $input);
        $integerValArray = array_map(function ($num) {
            return strrev($num);
        }, str_split(strrev($integerVal), 3));
        return join(',', array_reverse($integerValArray)) . '.' . $pointVal;
    }
}
