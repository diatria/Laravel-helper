<?php
namespace App\Helper;

use Carbon\Carbon;

class Exception
{
    public static function array($arrayOrObject, $key)
    {
        $array = collect($arrayOrObject)->toArray();
        return !empty($array[$key]) ? $array[$key] : null;
    }
}
