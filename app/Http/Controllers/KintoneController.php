<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class KintoneController extends Controller
{
    public function getDataFromKintone()
    {
        $client = new Client([
            'verify' => false, // SSL証明書の検証を無効化
        ]);

        $response = $client->request('GET', 'https://xd3utnv17sc2.cybozu.com/k/v1/records.json', [
            'headers' => [
                'X-Cybozu-API-Token' => 'DZxfPDBjK70Ah2zvaBOD0n5tdf9WpQv7yRoOhhtT',
            ],
            'query' => [
                'app' => '4',
                'id' => '1',
                'fields' => 'student_id',
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $data = json_decode($response->getBody(), true);

        // データの利用
        // $dataに取得したデータが格納されています

        // student_idの値を取得
        $studentIds = [];
        foreach ($data['records'] as $record) {
            if (isset($record['student_id']['value'])) {
                $studentIds[] = $record['student_id']['value'];
            }
        }
        return view('toppage', ['studentIds' => $studentIds]);
    }
}
