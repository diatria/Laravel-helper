<?php
namespace App\Helper;

use App\User;
use App\Helper\Response;
use Illuminate\Support\Facades\Hash;

class Auth 
{
    /**
     * fungsi auth untuk API
     */
    public function login($requset)
    {
        $user = User::where('email', $requset->email)->first();
        if(empty($user)){
            return app(Response::class)->error(401)->message([
                'message' => 'Login Gagal',
                'data' => []
            ]);
        }

        if (Hash::check($requset->password, $user->password)) {
            return app(Response::class)->message([
                'message' => 'Login berhasil',
                'data' => $user
            ]);
        } else {
            return app(Response::class)->error(401)->message([
                'message' => 'Login Gagal',
                'data' => []
            ]);
        }
    }
}