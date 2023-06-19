<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetTestController extends Controller
{
    //curl.exe -X 'GET' 'https://xd3utnv17sc2.cybozu.com/k/v1/record.json?app=5&id=1' -H 'X-Cybozu-API-Token: onEZOHK2ueJA5ldNinvNpz6ShgdEv0fOSBkWZacD'
    //app=5->取得するアプリID
    public function index()
    {
        $url = 'https://xd3utnv17sc2.cybozu.com/k/v1/record.json?app=5&id=1';
        $headers = [
            'X-Cybozu-API-Token: onEZOHK2ueJA5ldNinvNpz6ShgdEv0fOSBkWZacD'
        ];

        // 初期化
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_CAINFO, 'C:\Users\2220399\Desktop\myapp-1\cacert.pem'); // cacert.pemファイルのパスを指定        $response = curl_exec($curl);
        if ($response === false) {
            $error = curl_error($curl);
            $errorNo = curl_errno($curl);

            dd("cURLエラー: " . $error . " (" . $errorNo . ")");
        }
        //連想配列で管理
        dd(json_decode($response, true));

        curl_close($curl);
    }
}
