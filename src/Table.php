<?php
namespace App\Helper\src;

use StdClass;
use App\Helper\Helper;
use Illuminate\Support\Facades\Schema;

class Table extends Helper
{
    protected $tableName;

    public function name($name)
    {
        $this->tableName = $name;
        return $this;
    }

    public function toObject()
    {
        $columns = Schema::getColumnListing($this->tableName);

        $object = new StdClass;
        foreach ($columns as $item) {
            $object->$item = null;
        }

        return $object;
    }
}
