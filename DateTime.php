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
        // replace separator '/' to '-'
        $timeReplace = str_replace('/',  '-', $time);
		$carbon = Carbon::parse($timeReplace);
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
        
        $time = str_replace('/', '-', $time);
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

    // MENGHITUNG SELISIH JAM
    public function diffTime($time)
    {
        $type = ['start', 'end'];

        foreach($type as $item){
            ${$item} = [
                'jam' => explode(':', $time[$item])[0],
                'menit' => explode(':', $time[$item])[1],
            ];
        }

        $hour = ((int) $end['jam'] - (int)  $start['jam']) + 24;

        // Menit
        $varMenit = ( (int) $start['menit'] + (int) $end['menit'] );
        if($varMenit > 60){
            $menit = [
                'jam' => 1,
                'menit' => $varMenit - 60
            ];
        } else {
            $menit = [
                'jam' => 0,
                'menit' => $varMenit
            ];
        }

        $jam = $hour + $menit['jam'];
        return ( $jam > 24 ? $jam - 24 : $jam ).':'.$menit['menit']; 
    }

    public static function diffInDays($start, $end)
    {
        $date = Carbon::parse($start);
        $now = Carbon::parse($end);

        return $diff = $date->diffInDays($now);
    }

    public function replaceToTwoDigit($time)
    {
        $exploded = explode('/', $time);

        $temp = [];
        foreach($exploded as $item){
            $temp[] = strlen($item) < 2 ? '0'.$item : $item;
        }
        // Reformat
        // Tanggal, Bulan, Tanggal
        // return "{$temp[2]}/{$temp[1]}/{$temp[0]}";
        return "{$temp[0]}/{$temp[1]}/{$temp[2]}";
    }
}
