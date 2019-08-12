<?php
namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class NoSql
{
    public function save($fileName, $json, $menit = 1)
    {
        $genesis = Carbon::now();
        $next_block = $genesis->addMinutes($menit)->timestamp;

        $data = collect($json)->put('next_refresh', $next_block);
        $data = $data->toJson();

        Storage::disk('public')->put('NoSql/'.$fileName.'.json', $data);
    }

    public function reader($fileName)
    {
        try{
            $data = Storage::disk('public')->get('/NoSql/'.$fileName.'.json');
            $data = \json_decode($data, true);
            
            if(empty($data)){
                $reponse = [
                    'refresh' => true,
                    'data' => []
                ];
            } else {
                if($data['next_refresh'] > Carbon::now()->timestamp){
                    $reponse = [
                        'refresh' => false,
                        'data' => collect($data)->except(['next_refresh'])
                    ];
                } else {
                    $reponse = [
                        'refresh' => true,
                        'data' => collect($data)->except(['next_refresh'])
                    ];
                }
            }
        } catch(\Exception $e){
            $reponse = [
                'refresh' => true,
                'data' => $e->getMessage()
            ];
        }
        return $reponse;
    }

    public function renderStatic($fileName)
    {
        try{
            $data = Storage::disk('public')->get('/NoSql/'.$fileName.'.json');
            return $data = \json_decode($data, true);
        } catch (\Exception $e){
            return false;
        }
    }
}
