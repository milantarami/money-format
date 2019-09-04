# Money Format

alternative for money_format() for windows machine

## Overview

``` bash
MoneyFormat::get(Input, Locale, Enable_Monetary_Symbol, Custom_Monetary_Symbol);
```

## Usage

``` bash
$formatted = MoneyFormat::get('123456', 'np');
// output : 1,23,456.00
$formatted = MoneyFormat::get('123456', 'np', true);
//output : रू 1,23,456.00
$formatted = MoneyFormat::get('123456', 'np', true, 'NPR');
// output : NPR 1,23,456.00

$formatted = MoneyFormat::get('123456', 'us');
// output : 123,456.00


```

