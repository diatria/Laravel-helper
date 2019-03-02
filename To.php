<?php
namespace App\Helper;

class To
{
    public function arrayString($array)
    {
        $implode = \implode(',', $array);

        return "[{$implode}]";
    }

    /**
     * $value = array atau string
     * $type = array atau string
     */

    public function string($value, $type)
    {
        $data = [];
        if ($type == 'array') {
            foreach ($value as $index => $item) {
                $data[] = "{$item}";
            }
        }

        if ($type == 'string') {
            $data = "'{$value}'";
        }

        return $data;
    }
}
