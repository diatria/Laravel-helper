<?php
namespace App\Helper;

use App\Helper\To;

class Chart
{
    public function format($array)
    {
        $label = [];
        $value = [];
        foreach ($array as $index => $item) {
            $label[] = "{$index}";
            $value[] = count($item);
        }
        $color = $this->color(count($label));
        return [
            'label' => $label,
            'value' => $value,
            'color' => (new To)->string($color, 'array')
        ];
    }

    public function color($number)
    {
        $color = [
            '#4caf50', // green
            '#f44336', // Red
            '#e91e63', // Pink
            '#9c27b0', // Purple
            '#673ab7', // deepPurple
            '#3f51b5', // indigo
            '#2196f3', // blue
            '#009688', // teal
            '#ffeb3b', // yellow
            '#ffc107', // amber
            '#ff9800', // orange
        ];
        $collection = collect($color);
        $collection = $collection->take($number);
        return $collection->toArray();
    }
}
