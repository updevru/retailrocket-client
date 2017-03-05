<?php

namespace RetailRocketClient;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

class Client implements ClientInterface {

    protected $url = 'http://api.retailrocket.ru/api/2.0/';

    /**
     * @var string
     */
    protected $token;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @return HttpClient
     */
    protected function getHttpClient()
    {
        if($this->httpClient) {
            return $this->httpClient;
        }

        $client = new HttpClient([
            'base_uri' => $this->url,
            'timeout'  => 0.25,
        ]);

        return $this->httpClient = $client;
    }

    /**
     * @param string $method
     * @param array  $params
     *
     * @throws Exception\HttpException
     * @throws Exception\ParseException
     * @return array
     */
    public function request($method, array $params)
    {
        try {
            $response = $this->getHttpClient()->get("$method/{$this->token}", ['query' => $params]);
        } catch(GuzzleException $e) {
            throw new Exception\HttpException("HTTP Error: {$e->getMessage()}", $e->getCode(), $e);
        }

        $data = json_decode($response->getBody()->getContents(), true);

        if(json_last_error() != JSON_ERROR_NONE) {
            throw new Exception\ParseException("Parse response error: " . json_last_error());
        }

        return $data;
    }
}