<?php

/**
 * Used for load the products data source and to get the details for the products
 */
class Product extends LoadData
{
    public static $productsArray;

    /**
     * Creates the products array and it put it into the $productArray property of the object
     *
     * @param ReadData $source Will have the object withe the database select result set or with the JSON result set
     * @param array $products Will have the source for the products to be transformed into an array
     */
    public function __construct($source, array $products)
    {
        parent::__construct($source);

        self::$productsArray = $this->loadDataArray($products);
    }

    /**
     * Gets the product details for a specific product id, used when we need the details of the product when we are
     * processing orders
     *
     * @param INT $productId The id of the product
     *
     * @return array with the details of the product
     */
    public static function getProductDetails(int $productId): array
    {
        $products = self::$productsArray[0];

        foreach ($products as $product) {
            if ($product['id'] == $productId) {
                return $product;
            }
        }

        return [];
    }
}