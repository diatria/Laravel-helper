<?php
namespace App\Helper\src;

use App\Helper\Helper;

class Generator extends Helper
{
    public function code($string = '')
    {
        return "{$string}".rand(000000, 999999);
    }
}
