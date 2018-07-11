<?php

/*
 * This interface is implemented in ApiReadData and DatabaseReadData and force them to use ReadSources function
 */

interface ReadData
{
    /**
     * @param array $sources Will have all the parameters from a "select" from a database table or from a JSON fie
     *
     * @return array with the the result set converted in an array
     */
    public function readSources(array $sources): array;
}
