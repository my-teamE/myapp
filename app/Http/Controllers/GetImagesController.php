<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetImagesController extends Controller
{
    public function index()
    {
        $url = 'https://xd3utnv17sc2.cybozu.com/k/v1/record.json?app=6';
        $headers = [
            'X-Cybozu-API-Token: WDPSX1L5fSpI0gotEzB8ZjJyakVvCTs8trBJg7DY'
        ];
        // 初期化
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CAINFO, 'C:\Users\2220415\Desktop\myapp\cacert.pem'); // cacert.pemファイルのパスを指定


        $response = Http::withHeaders($headers)->get($url);
        $data = $response->json();
        dd($data);
        $records = $data['records'];

        $fileKey = $records[0]['image']['value'][0]['2023061900400941CA415F35B542C39575409D4A1EEB20207'];
        $imageUrl = "https://xd3utnv17sc2.cybozu.com/k/v1/file.json?fileKey=$fileKey";

        $imageUrl = ['FILE']['value'][0]['2023061900400941CA415F35B542C39575409D4A1EEB20207'];
        return view('home', ['imageUrl' => $imageUrl]);
    }
}
