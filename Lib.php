<?php
namespace App\Helper;

use Carbon\Carbon;

class Lib
{
    public static function timestamp(array $array)
    {
        $collection = collect($array);
        $collection = $collection->put('created_at', Carbon::now());
        return $collection->toArray();
    }

    public static function codeGenerator($prefix)
    {
        return $prefix.rand(000000000, 999999999);
    }

}
