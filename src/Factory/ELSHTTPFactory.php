<?php

namespace Els\Factory;

use Els\Interfaces\ELSHTTP;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class ELSHTTPFactory implements ELSHTTP
{
    private string $url;

    private string $method;

    public function __construct($url, $method = 'GET')
    {
        $this->url = $url;
        $this->method = $method;
    }

    public function getDataFromUrl(): string | array
    {
        try {
            $client = new Client();
            $response = $client->request($this->method, $this->url);
            return json_decode($response->getBody()->getContents(), true);

        } catch (RequestException $e) {
            echo $e->getMessage() . "\n";

            var_dump($e->getRequest());

            if ($e->hasResponse()) {
                var_dump($e->getResponse());
            }
        }
    }
}


