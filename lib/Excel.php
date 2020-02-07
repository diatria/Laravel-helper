<?php
namespace App\Helper\lib;

class Excel
{
    public static function timeToDefault($excel_date)
    {
        if(!is_double($excel_date)){
            return null;
        }

        $unix_date = ($excel_date - 25569) * 86400;
        $excel_date = 25569 + ($unix_date / 86400);
        $unix_date = ($excel_date - 25569) * 86400;
        return gmdate("Y-m-d", $unix_date);
    }
}
