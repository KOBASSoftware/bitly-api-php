<?php

namespace Kobas\Bitly;

use GuzzleHttp\Client;

/**
 * Class Bitly
 * @package Kobas\Bitly
 */
class Bitly
{
    /**
     * @var string $accessToken
     */
    private $accessToken;

    const API_HOST = "https://api-ssl.bitly.com";
    const API_VERSION = 'v4';
    const API_URL = self::API_HOST . '/' . self::API_VERSION;

    /**
     * Bitly constructor.
     * @param $accessToken
     */
    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @param $endpoint
     * @param null $payload
     * @return mixed
     * @throws \Exception
     */
    private function sendRequest($endpoint, $payload = null)
    {
        $client = new Client();

        $response = $client->request('POST', self::API_URL . $endpoint, [
            'json' => $payload,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Accept' => 'application/json'
            ]
        ]);

        $code = $response->getStatusCode();

        if($code !== 200 && $code !== 201) {
            throw new \Exception($response->getBody()->getContents(), $code);
        }

        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param $url
     * @return mixed
     * @throws \Exception
     */
    public function shortenUrl($url)
    {
        $response = $this->sendRequest("/shorten", [ 'long_url' => $url]);
        return $response->link;
    }
}