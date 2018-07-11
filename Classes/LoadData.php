<?php

/**
 * This abstract class is used by the Product, Order and Customer classes and helps them by providing the data source
 * type, the result set comes from a database table or from a JSON file and transforming this result set into an array
 */
abstract class LoadData
{
    private $source;

    /**
     * Set the data source, the result from select from the database or a JSON file
     *
     * @param ReadData $source Will have the object withe the database select result set or with the JSON result set
     *
     */
    protected function __construct(ReadData $source)
    {
        $this->source = $source;
    }

    /**
     * Loads the data array from the source
     *
     * @param array $dataArray Will have the array with the source
     *
     * @return array with the result set from the database select or JSON
     */
    protected function loadDataArray(array $dataArray): array
    {
        return $this->source->readSources($dataArray);
    }
}