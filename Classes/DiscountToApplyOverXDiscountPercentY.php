<?php

/**
 * Discount class for: A customer who has already bought for over € X, gets a discount of Y % on the whole order.
 */
class DiscountToApplyOverXDiscountPercentY implements Discounts
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
        if ($order['total'] > $discountParams['x']) {
            $order['total'] = $order['total'] - ($order['total'] * $discountParams['y'] / 100);
        }

        return $order;
    }
}