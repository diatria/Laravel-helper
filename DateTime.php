<?php
namespace App\Helper;

use Carbon\Carbon;

class DateTime
{
    /**
     * Merubah format Indonesia ke format sistem
     */
    public static function toDefault($time)
	{
		$carbon = Carbon::parse($time);
		$time = $carbon->format('Y-m-d');
		return $time;
	}

	public static function toInd($time, $separator = '-')
	{
		$carbon = Carbon::parse($time);
		$time = $carbon->format("d{$separator}m{$separator}Y");
		return $time;
	}

	/**
	 * fungsi ini di buat untuk merubah bulan (tanggal) menjadi bulan (huruf)
	 */
	public static function indonesiaTime($time)
    {
        if(empty($time)){
            return '-';
        }
        
        $bulan = array (
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $date = substr($time, 0, 10);
        $explode = explode('-', $date);
        
        // variabel explode 0 = tahun
        // variabel explode 1 = bulan
        // variabel explode 2 = tanggal
    
        return $explode[2] . ' ' . $bulan[ (int)$explode[1] ] . ' ' . $explode[0];
    }

    public static function date($time)
    {
        if(empty($time)){
            return '-';
        }
        
        $date = substr($time, 0, 10);
        $explode = explode('-', $date);
        
        // variabel explode 0 = tahun
        // variabel explode 1 = bulan
        // variabel explode 2 = tanggal
    
        return $explode[2];
    }

    public static function month($time)
    {
        $bulan = array (
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $date = substr($time, 0, 10);
        $explode = explode('-', $date);
        
        // variabel explode 0 = tahun
        // variabel explode 1 = bulan
        // variabel explode 2 = tanggal
    
        return $bulan[ (int)$explode[1] ];
    }

    /**
     * FUNGSI DIBUAT UNTUK MEMISAHKAN TANGGAL, BULAN, TAHUN
     */
    public static function split($dateTime)
    {
        $date = substr($dateTime, 0, 10);
        $explode = explode('-', $date);

        return [
            'tanggal' => $explode[2],
            'bulan' => $explode[1],
            'tahun' => $explode[0]
        ];
    }
}
