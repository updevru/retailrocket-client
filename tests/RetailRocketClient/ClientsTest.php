<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 05.03.2017
 * Time: 15:50
 */

namespace Test\RetailRocketClient;

use RetailRocketClient\Client;
use RetailRocketClient\Recommendation;

class ClientsTest extends \PHPUnit_Framework_TestCase {

    public function testOk()
    {
        $client = new Client('537d5e5d6636b10c40c85e8a');
        $service = new Recommendation($client);

        /** @var Recommendation\Item $item */
        foreach($service->popular(0) as $item) {
            print(sprintf("Product #%s %s\n", $item->getItemId(), $item->getName()));
        }
    }
}