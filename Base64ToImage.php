<?php
namespace App\Helper;

use Illuminate\Support\Facades\Storage;


class Base64ToImage{
    public function convert($req)
    {
        if($req->image){
            $image = str_replace(' ', '+', $req->image);
            $imageName = str_random(10).'.'.'png';
            Storage::disk('public')->put('image/d2d/'.$imageName, base64_decode($image));
            return 'image/d2d/'.$imageName;
        }
    }
}
