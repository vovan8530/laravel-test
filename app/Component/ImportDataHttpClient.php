<?php

namespace App\Component;

use GuzzleHttp\Client;

class ImportDataHttpClient
{
    /**
     * @var Client
     */
    public Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.json-placeholder.domain'),
            'verify' => false,
            'timeout' => 2.0,
        ]);
    }

}
