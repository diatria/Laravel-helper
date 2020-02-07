<?php

use App\Model\ConfigRole;
use Illuminate\Support\Facades\Auth;

/**
 * menangkap error pada array atau object
 * @var role => role pada user
 * @var name => name suatu kunci untuk membedakan antara menu
 * @return relative
 */

class Role{
    public static function access($key)
    {
        $pengaturan = [
            'super-admin' => [
                'all'
            ],
            'kasir' => [
                'stok_kategori',
                'data_stok_kasir',
                'kasir',
                'catatan-pengeluaran',
                'laporan-catatan-pengeluaran',
                'laporan-stok'
            ]
        ];

        $pengaturanRole = Auth::user()->role;

        foreach($pengaturan[$pengaturanRole] as $item){
            if($item == 'all'){
                return 'accept';
            }

            if($item == $key){
                return 'accept';
            }
        }
        return 'refuse';
    }
}