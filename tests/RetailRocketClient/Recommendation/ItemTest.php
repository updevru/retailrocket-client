<?php

namespace Test\RetailRocketClient\Recommendation;

use RetailRocketClient\Recommendation;
use \RetailRocketClient\Recommendation\Item;

class ItemTest extends BaseTest
{

    public function getResultProvider()
    {
        return [
            [
                [
                    'OldPrice'            => 3240,
                    'Price'               => 2981,
                    'Weight'              => 7,
                    'ItemId'              => 1984,
                    'CategoryIds'         =>
                        array(
                            0 => 143,
                        ),
                    'CategoryPathsToRoot' =>
                        array(
                            0 =>
                                array(
                                    0 => 143,
                                    1 => 67,
                                ),
                        ),
                    'Regions'             => null,
                    'CategoryNames'       =>
                        array(
                            0 => 'Комплекты одежды для мальчиков',
                        ),
                    'Params'              =>
                        array(),
                    'Modification'        =>
                        array(),
                    'Size'                => null,
                    'Color'               => null,
                    'Algorithm'           => 'p',
                    'BuyUrl'              => null,
                    'Vendor'              => 'Bebus',
                    'Description'         => 'Состав: джинсы ...',
                    'TypePrefix'          => null,
                    'Model'               => null,
                    'Url'                 => 'https://example.com/product.html',
                    'PictureUrl'          => 'https://example.com/Unknown.jpeg',
                    'Name'                => 'Костюм для мальчиков серый bebus',
                ],
                0
            ],
            [
                [
                    'OldPrice'            => 2360,
                    'Price'               => 1490,
                    'Weight'              => 6,
                    'ItemId'              => 1238,
                    'CategoryIds'         =>
                        array(
                            0 => 160,
                        ),
                    'CategoryPathsToRoot' =>
                        array(
                            0 =>
                                array(
                                    0 => 160,
                                    1 => 64,
                                ),
                        ),
                    'Regions'             => null,
                    'CategoryNames'       =>
                        array(
                            0 => 'Нарядная одежда для малышей до 2х лет',
                        ),
                    'Params'              =>
                        array(),
                    'Modification'        =>
                        array(),
                    'Size'                => null,
                    'Color'               => null,
                    'Algorithm'           => 'p',
                    'BuyUrl'              => null,
                    'Vendor'              => 'Minia',
                    'Description'         => 'Состав: хлопок ...',
                    'TypePrefix'          => null,
                    'Model'               => null,
                    'Url'                 => 'https://example.com/product2.html',
                    'PictureUrl'          => 'https://example.com/Unknown2.jpeg',
                    'Name'                => 'Костюм нарядный на мальчика в клетку',
                ],
                1
            ]
        ];
    }

    /**
     * @dataProvider getResultProvider
     */
    public function testItem($data, $n)
    {
        $item = new Item($this->getSuccessData()[$n]);

        foreach($data as $property => $value) {
            $method = 'get' . $property;
            $this->assertEquals($item->{$method}(), $value);
        }
    }
} 