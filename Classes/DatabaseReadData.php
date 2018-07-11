<?php

/**
 * Implements interface ReadData and it is used to transform the select result from a database table into an array
 */
class DatabaseReadData implements ReadData
{
    /**
     * TO DO: not implemented yet
     *
     * @param array $sources Will have all the parameters from a "select" from a database table
     *
     * @return array with the the result set converted in an array
     */
    public function readSources(array $sources): array
    {
        return [];
    }
}