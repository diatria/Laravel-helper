<?php
namespace App\Helper;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


class Excel
{
    public function reader($file)
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load($file);
        return $spreadsheet->getActiveSheet()->toArray();
    }
}
