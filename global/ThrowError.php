<?php

use App\Helper\src\ThrowError;
/**
 * menangkap error pada array atau object
 * @return relative
 */

function th(&$dataset, $query = null, $throw = null)
{
    if(empty($query)){
        return $dataset;
    }

    $th = new ThrowError($dataset, $query, $throw);
    return $th->result();
}