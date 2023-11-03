<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public static $token2;

    public function register()
    {
        $response = Http::post('http://127.0.0.1:1234/api/register', [
            'name' => 'Unyil5',
            'email'  => 'Unyil5@gmail.com',
            'password'  => '12345678'
        ]);
        $jsonData = $response->json();
    }

    public function login()
    {
        $response = Http::post('http://127.0.0.1:1234/api/login', [
            'email'  => 'admin@gmail.com',
            'password'  => '12345678'
        ]);
        $data =  $response->json();
        $token = $response->json('access_token');
        try {
            Session::put('bearer_token', $token);
            Session::save('bearer_token');
        } catch (\Exception $e) {
            dd($e);
        }


        // dd();

        // 
    }
}
