<?php

use App\Helper\src\Currency;
/**
 * menangkap error pada array atau object
 * @return relative
 */

function currency($number, $prefix = null)
{
    $currency = new Currency;
    return $currency->prefix($prefix)->mask($number);
}