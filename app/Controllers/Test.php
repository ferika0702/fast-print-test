<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use CodeIgniter\HTTP\Client;

class Test extends BaseController
{
    public function index()
    {
        try {
            $client = \Config\Services::curlrequest();
            $credentials = [
                'username' => 'tesprogrammer140623C23',
                'password' => 'f3c51617c8a79eeb54fd266d3f42eaba',
            ];
    
    $response = $client->setBody($credentials)->request('POST', 'https://recruitment.fastprint.co.id/tes/api_tes_programmer', [
        'headers' => [
        'Content-Type' => 'application/json',
        ]
    ]);
    var_dump($response);
    
    if ($response->getStatusCode() === 200) {
        return json_decode($response->getBody());
    } else {
            // Handle error
            echo "sesat";
        }
        } catch (\Exception $e) {
            echo "Message: " . $e->getMessage();
        }
    }
}
