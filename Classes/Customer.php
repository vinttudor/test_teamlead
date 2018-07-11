<?php

/**
 * Used for load the customer data source
 */
class Customer extends LoadData
{
    public $customersArray;

    /**
     * Creates the customers array and it put it into the $customersArray property of the object
     *
     * @param ReadData $source Will have the object withe the database select result set or with the JSON result set
     * @param array $customers Will have the source for the customers to be transformed into an array
     */
    public function __construct($source, array $customers)
    {
        parent::__construct($source);

        $this->customersArray = $this->loadDataArray($customers);
    }
}