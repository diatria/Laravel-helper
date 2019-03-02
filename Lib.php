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

    /**
     * Array diambil dari result data
     */
    public static function imageObject($array)
    {
        $collection = collect($array);
        $collection = $collection->put('path', asset(''));
        return $collection;
    }
    
    /**
     * Array diambil dari result data
     */
    public static function productObject($array)
    {
        $collection = collect($array);
        $collection = $collection->put('slug', str_slug($array['name']));
        $collection = $collection->put('path', asset(''));
        return $collection;
    }

    public static function codeGenerator($prefix)
    {
        return $prefix.rand(000000000, 999999999);
    }

}
