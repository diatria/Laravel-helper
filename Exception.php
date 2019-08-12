<?php
namespace App\Helper;

use Carbon\Carbon;

class Exception
{
    public static function array(array $array, $key)
    {
        return !empty($array[$key]) ? $array[$key] : null;
    }
}
