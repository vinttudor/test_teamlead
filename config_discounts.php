<?php
/*
 * The array bellow contains the discounts (classes in my case, for each discount) with his own parameters that we want
 * to apply. Adding new elements in this array it will permit to the system to apply other discounts.
 */

$discount_to_apply_with_params =
    [
        [
            'discount_name' => 'OverXDiscountPercentY',
            'params' =>
                [
                    'x' => 1000,
                    'y' => 10
                ]
        ],
        [
            'discount_name' => 'CategoryXBuyYFreeZ',
            'params' =>
                [
                    'x' => 2,
                    'y' => 5,
                    'z' => 6
                ]
        ],
        [
            'discount_name' => 'AtLeastXCategoryYCheapestProductPercentZ',
            'params' =>
                [
                    'x' => 2,
                    'y' => 1,
                    'z' => 20
                ]
        ]
    ];