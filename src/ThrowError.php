<?php
namespace App\Helper\src;

use App\Helper\Helper;

class ThrowError extends Helper{

    protected $dataset;
    protected $query;
    protected $throw;
    
    public function __construct($dataset, $query, $throw = null)
    {
        $this->dataset = collect($dataset)->toArray();
        $this->query = $query;
        $this->throw = $throw;
    }

    public function result()
    {
        $query = explode('.', $this->query);

        try{
            $temp = $this->dataset;
            foreach($query as $item){
                $temp = (array) $temp[$item];
            }

        } catch(\Exception $e) {
            return $this->throw;
        }

        if(count($temp) > 0){
            return $temp[0];
        }

        return null;
    }
}