<?php
/**
 * This is the service that outputs the JSON with the orders with the discounts applied
 */

include_once 'config_sources.php';
include_once 'config_discounts.php';

include_once 'Interfaces/ReadData.php';
include_once 'Interfaces/Discounts.php';

include_once 'Classes/DatabaseReadData.php';
include_once 'Classes/ApiReadData.php';
include_once 'Classes/LoadData.php';

include_once 'Classes/Product.php';
include_once 'Classes/Customer.php';
include_once 'Classes/Order.php';

include_once 'Classes/DiscountToApplyOverXDiscountPercentY.php';
include_once 'Classes/DiscountToApplyCategoryXBuyYFreeZ.php';
include_once 'Classes/DiscountToApplyAtLeastXCategoryYCheapestProductPercentZ.php';
include_once 'Classes/ApplyDiscounts.php';

global $productsSource;
global $customersSource;
global $ordersSource;

$apiReadData = new ApiReadData();
$product = new Product($apiReadData, $productsSource);
$customer = new Customer($apiReadData, $customersSource);
$order = new Order($apiReadData, $ordersSource);

echo json_encode($order->ordersArray);