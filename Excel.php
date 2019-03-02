<?php
namespace App\Helper;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


class Excel
{
    public function reader($req)
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load($req->fileName);
        return $spreadsheet->getActiveSheet()->toArray();
    }
}
