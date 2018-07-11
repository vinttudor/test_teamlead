<?php

/**
 * Implements interface ReadData and it is used to transform an JSON into an array
 */
class ApiReadData implements ReadData
{
    /**
     * This function reads the JSON file, transform the result into an array with all his elements and sub-elements
     *
     * @param array $sources Will have all the parameters from a JSON file
     *
     * @return array with the the result set converted in an array
     */
    public function readSources(array $sources): array
    {
        $dataFromSource = [];
        if (!empty($sources)) {
            foreach ($sources as $key => $source) {
                $stringDataFromSource = file_get_contents($source);
                $dataFromSource[$key] = (array)json_decode($stringDataFromSource);

                array_walk($dataFromSource[$key], function (&$item) {
                    if (gettype($item) == 'array') {
                        array_walk($item, function (&$itemFromItem) {
                            if (gettype($itemFromItem) == 'object') {
                                $itemFromItem = (array)$itemFromItem;
                            }
                        });
                    } elseif (gettype($item) == 'object') {
                        $item = (array)$item;
                    }
                });
            }
        }

        return $dataFromSource;
    }
}