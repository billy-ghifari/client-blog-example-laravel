<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class AdminView extends Controller
{
    public function index()
    {
        $token2 = Session::get('bearer_token');
        $response = Http::withToken($token2)->get('http://127.0.0.1:1234/api/get_users');
        $jsonData = $response->json();
        dd($token2);
        // return view('barang.barang', [
        //         'datausers' => $jsonData
        //     ]);
    }

    public function store()
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/posts',[
                        'title' => 'This is text example from webappfix',
                        'body'  => 'This is text example from webappfix as body'
                    ]);

        $jsonData = $response->json();

        dd($jsonData);
    }

    public function update()
    {
        $response = Http::put('https://jsonplaceholder.typicode.com/posts/1',[
                        'title' => 'This is text example from webappfix',
                        'body'  => 'This is text example from webappfix as body'
                    ]);

        $jsonData = $response->json();

        dd($jsonData);
    }

    public function delete()
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/1');

        $jsonData = $response->json();

        dd($jsonData);
    }
}
