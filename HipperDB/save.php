<?php
namespace App\Helper\HipperDB;

class save {

    public function toJson($tableName, $field, $value)
    {

        Storage::disk('public')->put('HipperDB/'.$tableName.'.json', $data);
    }

    public function format()
    {
        
    }

}