<?php
/**
 * This file is for testing the output of the Orders after applying the discounts
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


echo '------------------------------';
echo '<br>Initial orders<br>';
echo '------------------------------';
print "<pre>";
print_r($order->ordersArray);
print "<pre>";


$order->ordersArray = ApplyDiscounts::runDiscounts($order->ordersArray);

echo '------------------------------';
echo '<br>Orders with discounts<br>';
echo '------------------------------';
print "<pre>";
print_r($order->ordersArray);
print "<pre>";


echo '------------------------------';
echo '<br>JSON Orders<br>';
echo '------------------------------';
print "<pre>";
print_r(json_encode($order->ordersArray));
print "<pre>";
