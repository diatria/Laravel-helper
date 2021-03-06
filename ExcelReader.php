<?php
namespace App\Helper;

use App\Helper\lib\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ExcelReader
{
    protected $rowData = [];
    protected $arrayMap = [];

    /**
     * membaca excel
     * @param $file = file path
     * @return array
     */
    public function load($file)
    {
        $reader = new Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($file);
        $this->rowData = $spreadsheet->getActiveSheet()->toArray();
        return $this;
    }

    /**
     * memulai dari row yang telah ditentukan
     * @param integer nomor row dalam excel
     * @return self
     */
    public function startRow($startRow)
    {
        $temp = [];
        foreach ($this->rowData as $index => $item) {
            $index += 1;
            if($index >= $startRow){
                $temp[] = $item;
            }
        }
        $this->rowData = $temp;
        return $this;
    }

    /**
     * mendifinisikan row menjadi array
     * @param closure function dengan array di dalam nya
     * @return self
     */
    public function defineRow($closure)
    {
        $arrayMap = $closure();
        $this->arrayMap = $arrayMap;

        $temp = []; // menyimpan data sementara
        foreach($this->rowData as $index => $item){

            $row = []; // menyimpan data perbaris

            // looping data baris untuk mendapatkan index dan value
            foreach($item as $rowIndex => $value){ 
                if(isset(($arrayMap[$rowIndex]))){
                    // menyimpan data ke variable row dengan key yang telah ditentukan dari closure
                    $row[($arrayMap[$rowIndex])] = $value;
                }
            }

            $temp[] = $row;
        }

        $this->rowData = $temp;
        return $this;
    }


    /**
     * menghapus row/array yang ada pada defineRow
     * @param integer index array
     * @return self
     */
    public function skipDefineRow($skip)
    {
        $arrayKey = [];
        foreach ($skip as $item) {
            $arrayKey[] = $this->arrayMap[$item];
        }

        $temp = [];
        foreach($this->rowData as $item){
            $temp[] = collect($item)->except($arrayKey);
        }
        $this->rowData = $temp;
        return $this;
    }

    public function toArray()
    {
        return collect($this->rowData)->toArray();
    }
}
