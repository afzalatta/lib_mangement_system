<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GuzzleController extends Controller
{
    //
    public function remoteData()
    {
        $responce = Http::get('https://newsapi.org/v2/everything?q=tesla&from=2022-12-03&sortBy=publishedAt&apiKey=85e1d6c9734a4d92bafe3a902ffca257');
        return (['data'=>$responce->collect()]);


    }
}
