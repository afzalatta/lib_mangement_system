<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class NewsController extends Controller
{
    //

    public function index()
    {
        return view('news');
    }

    public function getNews()
    {

        return [
            'status'=> true,
            'message'=> 'This is Ajax Data',
            'data'=> "asd asdd a a sda d"
        ];
    }

    public function formData(Request $request)
    {

        return [
            'name'=> $request->name,
            'address'=> $request->address
        ];
    }

}
