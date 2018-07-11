<?php

/**
 * Used for load the order data source
 */
class Order extends LoadData
{
    public $ordersArray;

    /**
     * Creates the orders array and it put it into the $orderArray property of the object
     *
     * @param ReadData $source Will have the object withe the database select result set or with the JSON result set
     * @param array $order Will have the source for the orders to be transformed into an array
     */
    public function __construct($source, array $orders)
    {
        parent::__construct($source);

        $this->ordersArray = $this->loadDataArray($orders);
    }
}