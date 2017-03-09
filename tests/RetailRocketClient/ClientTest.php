<?php

namespace Test\RetailRocketClient;

use RetailRocketClient\Client;
use RetailRocketClient\Recommendation;

class ClientTest extends \PHPUnit_Framework_TestCase {

    public function testInvalidToken()
    {
        $service = new Recommendation(new Client('invalid-token'));

        $this->setExpectedException('RetailRocketClient\Exception\HttpException');
        $service->saleByLatest(2);
    }
} 