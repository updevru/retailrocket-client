<?php

namespace Test\RetailRocketClient\Recommendation;

use RetailRocketClient\Recommendation;
use \RetailRocketClient\Recommendation\Item;

class ResponseTest extends BaseTest {

    public function testCount()
    {
        $response = new Recommendation\Response($this->getSuccessData());

        $this->assertEquals($response->count(), 2);
        $this->assertEquals(count($response), 2);
    }

    public function testGetItem()
    {
        $response = new Recommendation\Response($this->getSuccessData());

        foreach($response as $item) {
            $this->assertTrue($item instanceof Item);
        }
    }

    public function testEmptyResponse()
    {
        $response = new Recommendation\Response([]);

        $iterate = false;
        foreach($response as $item) {
            $iterate = true;
        }

        $this->assertFalse($iterate);
    }
} 