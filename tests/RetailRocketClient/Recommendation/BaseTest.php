<?php

namespace Test\RetailRocketClient\Recommendation;

class BaseTest extends \PHPUnit_Framework_TestCase {

    protected $responseSuccess = '[
  {
    "OldPrice": 3240,
    "Price": 2981,
    "Weight": 7,
    "ItemId": 1984,
    "CategoryIds": [
      143
    ],
    "CategoryPathsToRoot": [
      [
        143,
        67
      ]
    ],
    "Regions": null,
    "CategoryNames": [
      "Комплекты одежды для мальчиков"
    ],
    "Params": {

    },
    "Modification": [

    ],
    "Size": null,
    "Color": null,
    "Algorithm": "p",
    "BuyUrl": null,
    "Vendor": "Bebus",
    "Description": "Состав: джинсы ...",
    "TypePrefix": null,
    "Model": null,
    "Url": "https://example.com/product.html",
    "PictureUrl": "https://example.com/Unknown.jpeg",
    "Name": "Костюм для мальчиков серый bebus"
  },
  {
    "OldPrice": 2360,
    "Price": 1490,
    "Weight": 6,
    "ItemId": 1238,
    "CategoryIds": [
      160
    ],
    "CategoryPathsToRoot": [
      [
        160,
        64
      ]
    ],
    "Regions": null,
    "CategoryNames": [
      "Нарядная одежда для малышей до 2х лет"
    ],
    "Params": {

    },
    "Modification": [

    ],
    "Size": null,
    "Color": null,
    "Algorithm": "p",
    "BuyUrl": null,
    "Vendor": "Minia",
    "Description": "Состав: хлопок ...",
    "TypePrefix": null,
    "Model": null,
    "Url": "https://example.com/product2.html",
    "PictureUrl": "https://example.com/Unknown2.jpeg",
    "Name": "Костюм нарядный на мальчика в клетку"
  }
]';

    protected function getSuccessData()
    {
        return json_decode($this->responseSuccess, true);
    }

    public function testResponseDate()
    {
        $this->assertTrue(is_array($this->getSuccessData()));
    }
} 