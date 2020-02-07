<?php
namespace App\Helper\src;

use StdClass;
use App\Helper\Helper;
use Illuminate\Support\Facades\Schema;

class Currency extends Helper
{
    protected $prefix;

    public function prefix($name)
    {
        $this->prefix = $name;
        return $this;
    }

    public function mask($number)
    {
        return $this->prefix.number_format($number,0,',','.');
    }

    public function toDecimal($string)
    {
        return \preg_replace('/[\D\.]/', '', $string);
    }
}
