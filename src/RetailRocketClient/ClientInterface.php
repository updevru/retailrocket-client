<?php

namespace RetailRocketClient;


interface ClientInterface {

    /**
     * @param string $method
     * @param array $params
     *
     * @return array
     */
    public function request($method, array $params);
}