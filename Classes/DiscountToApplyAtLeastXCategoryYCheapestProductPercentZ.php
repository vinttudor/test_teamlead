<?php

/**
 * Discount class for: If you buy X or more products of category Y, you get a Z discount on the cheapest product.
 */
class DiscountToApplyAtLeastXCategoryYCheapestProductPercentZ implements Discounts
{
    /**
     * Creates the discount
     *
     * @param array $order The array with the order
     * @param array $discountParams The array with the parameters that we need to apply for this specific discount
     *
     * @return array with the order after the discount is applied
     */
    public static function createDiscount(array $order, array $discountParams): array
    {
        $productsCategoryNumber = 0;
        $cheapestProductId = 0;
        $cheapestProductPrice = 9999999999;
        foreach ($order['items'] as &$product) {
            $productDetails = Product::getProductDetails((int)$product['product-id']);
            if ($productDetails['category'] == $discountParams['y']) {
                $productsCategoryNumber += $product['quantity'];
            }

            if ($product['unit-price'] < $cheapestProductPrice) {
                $cheapestProductId = $productDetails['id'];
                $cheapestProductPrice = $product['unit-price'];
            }
        }

        $discount = 0;
        if ($productsCategoryNumber >= $discountParams['x']) {
            foreach ($order['items'] as &$productElement) {
                if ($productElement['product-id'] == $cheapestProductId) {
                    $discount = $productElement['total'] * $discountParams['z'] / 100;
                    $productElement['total'] = $productElement['total'] - $discount;
                }
            }
        }
        $order['total'] = $order['total'] - $discount;

        return $order;

    }
}