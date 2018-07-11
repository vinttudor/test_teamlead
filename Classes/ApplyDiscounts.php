<?php

/**
 * Used to apply the discounts
 */
abstract class ApplyDiscounts
{
    /*
     * Cheeks all the classes that have the prefix "DiscountToApply" and the suffix present in the
     * array $discount_to_apply_with_params, basically it will create a match between the elements of the discounts
     * array and from the existing classes, the classes for the discounts, every class with his own parameters, we have
     * 3 elements in the returned array: the class name, the method name and the parameters (X, Y, Z)
     *
     * @return array with the methods from the discount classes that we need to run and with the parameters for them
     */
    private function getDiscountsList(): array
    {
        global $discount_to_apply_with_params;

        $discountsCalls = [];
        $classes = get_declared_classes();
        foreach ($discount_to_apply_with_params as $discount) {
            $searchedClass = 'DiscountToApply' . $discount['discount_name'];
            if (in_array($searchedClass, $classes)) {
                $classMethods = get_class_methods($searchedClass);
                if (in_array('createDiscount', $classMethods)) {
                    $discountsCalls[] = [
                        'className' => $searchedClass,
                        'methodName' => 'createDiscount',
                        'params' => $discount['params']
                    ];
                }

            }
        }

        return $discountsCalls;
    }

    /**
     * Run all the discounts, basically will run all the methods from the classes created nn the $discountCalls array
     * with the parameters
     *
     * @param array $orderList The array with the order
     *
     * @return array with the order after the discount is applied
     */
    public static function runDiscounts(array $orderList): array
    {
        $discountsCalls = self::getDiscountsList();

        if (!empty($orderList)) {
            foreach ($orderList as &$orderElement) {
                if (!empty($discountsCalls)) {
                    foreach ($discountsCalls as $discountCall) {
                        $orderElement = call_user_func([$discountCall['className'], $discountCall['methodName']],
                            $orderElement, $discountCall['params']);
                    }
                }
            }
        }

        return $orderList;
    }
}