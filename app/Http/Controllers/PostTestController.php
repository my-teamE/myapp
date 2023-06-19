<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostTestController extends Controller
{
    //
    public function index() {
        $url = 'https://xd3utnv17sc2.cybozu.com/k/v1/record.json';
        $headers = [
        'X-Cybozu-API-Token: onEZOHK2ueJA5ldNinvNpz6ShgdEv0fOSBkWZacD',
        'Content-Type: application/json'
        ];

        //データ型のバリデーションチェックしてない.勝手にデータ型置き換え.required属性はチェックされる
        //テーブル内でカラムが無い場合その項目は無視されて登録されます
        $body = [
        'app' => 5,
        'record' => [
            'student_id' => [
                'value' => 5000
            ],
            'class' => [
                'value' => "IE2A"
            ],
            'github_url' => [
                'value' => "https://github.com/orgs/my-teamE/dashboard"
            ],
            'skill' => [
                'value' => "Node.js"
            ],
            'comment' => [
                'value' => "コメントテスト"
            ]
        ]
        ];

        // JSONに変換
        $json = json_encode($body);

        // 初期化
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        dd($response);

        curl_close($curl);
    }
}
