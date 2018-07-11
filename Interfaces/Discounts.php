<?php

/*
 * This interface is implemented in the Discounts classes and force them to use createDiscount function with 2
 * parameters
 */

interface Discounts
{
    /**
     * @param array $order The order array
     * @param array $discountParams Contains the name of the discount (class) with the paameters that we need to apply
     *
     * @return array with the order with the discount applied
     */
    public static function createDiscount(array $order, array $discountParams): array;
}
