<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $client = new Client();
        $res = $client->get('http://api.openweathermap.org/data/2.5/weather?q=Hanoi&appid=852636bf3f79de266c3f2330379b3915');
        $data = $res->getBody();
        $dataJson = $data->getContents();
        $weather = json_decode($dataJson);
        return view('index',compact('weather'));
    }
}
