<?php

/**
 * Discount class for: For every product of category X, when you buy Y, you get a Z for free.
 */
class DiscountToApplyCategoryXBuyYFreeZ implements Discounts
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
        foreach ($order['items'] as &$product) {
            $productDetails = Product::getProductDetails((int)$product['product-id']);
            $howManyFreeMultiplicator = floor($product['quantity'] / $discountParams['y']);
            if ($productDetails['category'] == $discountParams['x'] && $howManyFreeMultiplicator > 0) {
                $product['quantity'] = $product['quantity'] * $howManyFreeMultiplicator * $discountParams['z'];
            }
        }

        return $order;
    }
}