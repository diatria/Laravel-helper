<?php
namespace App\Helper\src;

use Carbon\Carbon;
use App\Helper\Helper;
use Illuminate\Support\Facades\Schema;

class DateTime extends Helper
{
    protected $dateString;

    /**
     * date harus berformat 'DD-MM-YYY' atau 'YYYY-MM-DD'
     */
    public function date($date)
    {
        $this->dateString = str_replace('/', '-', $date);
        return $this;
    }

    public function to($format)
    {
        if(empty($this->dateString)){
            return null;
        }
        if($format == 'SYSTEM'){
            return Carbon::createFromFormat('d-m-Y', $this->dateString)->format('Y-m-d');
        }

        if($format == 'INDONESIA'){
            return Carbon::createFromFormat('Y-m-d', $this->dateString)->format('d-m-Y');
        }
    }
}
