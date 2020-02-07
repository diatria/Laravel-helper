<?php
namespace App\Helper;

use App\Helper\NoSql;

class Number
{
    public function currency($number, $prefix = "Rp ")
    {
        return $prefix . number_format($number,0,',','.');
    }
    
    /**
     * membuat auto number secara berurutan
     * misalkan 00000001 sampai 99999999
     * atau bisa di ubah desimal nya
     * 
     * @var $array
     * - name_file => string, required
     * - decimal => number, required, default ~> 8
     */
    public function increment(array $array)
    {
        // Default
        $defaultDecimal = 8;

        $nsr = app(NoSql::class)->renderStatic($array['name_file']); // NoSql Render
        $decimal = empty($array['decimal']) ? $defaultDecimal : $array['decimal'];
        $haveDecimal = strlen($nsr['id']);
        $generateZero = $decimal - $haveDecimal;

        $string = '';
        for($i = 1; $i <= $generateZero; $i++){
            $string .= 0;
        }

        return $noInvoice = "{$string}{$nsr['id']}";
    }

    /**
     * Membuat auto increment
     */
    public function generateIncrement($file_name)
    {
        $nsr = app(NoSql::class)->renderStatic($file_name); // NoSql Render

        // Deteksi NSR Jika kosong
        if($nsr == false){
            app(NoSql::class)->save($file_name, ['id' => 0]);
        }

        app(NoSql::class)->save($file_name, ['id' => $nsr['id'] + 1 ]);

        return $nsr['id'] + 1;
    }
}
