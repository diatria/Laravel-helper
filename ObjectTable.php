<?php
namespace App\Helper;

use StdClass;
use Illuminate\Support\Facades\Schema;

/**
 * v 1.0
 * helper berguna untuk mereturn data table yang kosong
 */
class ObjectTable
{
    public static function empty($tableName)
    {
        $columns = Schema::getColumnListing($tableName);

        $object = new StdClass;
        foreach ($columns as $item) {
            $object->$item = null;
        }

        return $object;
    }
}