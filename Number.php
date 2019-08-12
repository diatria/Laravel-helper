<?php
namespace App\Helper;

class Number
{
    public function currency($number, $prefix = "Rp ")
    {
        return $prefix . number_format($number,2,',','.');
    }
}
