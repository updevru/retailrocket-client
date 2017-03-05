<?php

namespace RetailRocketClient\Recommendation;


class Item {

    /**
     * @var array
     */
    protected $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getItemId()
    {
        return $this->data['ItemId'];
    }

    /**
     * @return float
     */
    public function getOldPrice()
    {
        return $this->data['OldPrice'];
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->data['Price'];
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->data['Weight'];
    }

    /**
     * @return array
     */
    public function getCategoryIds()
    {
        return $this->data['CategoryIds'];
    }

    /**
     * @return array
     */
    public function getCategoryPathsToRoot()
    {
        return $this->data['CategoryPathsToRoot'];
    }

    /**
     * @return array
     */
    public function getRegions()
    {
        return $this->data['Regions'];
    }

    /**
     * @return array
     */
    public function getCategoryNames()
    {
        return $this->data['CategoryNames'];
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->data['Params'];
    }

    /**
     * @return array
     */
    public function getModification()
    {
        return $this->data['Modification'];
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->data['Size'];
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->data['Color'];
    }

    /**
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->data['Algorithm'];
    }

    /**
     * @return string
     */
    public function getBuyUrl()
    {
        return $this->data['BuyUrl'];
    }

    /**
     * @return string
     */
    public function getVendor()
    {
        return $this->data['Vendor'];
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->data['Description'];
    }

    /**
     * @return string
     */
    public function getTypePrefix()
    {
        return $this->data['TypePrefix'];
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->data['Model'];
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->data['Url'];
    }

    /**
     * @return string
     */
    public function getPictureUrl()
    {
        return $this->data['PictureUrl'];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->data['Name'];
    }
}