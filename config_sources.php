<?php
/*
 * This file is for the configure the data source (JSON) for products, customers and orders
 */

/*
 * Load data from local folders
 */
//$productsSource =
//    [
//        'data/products.json'
//    ];
//
//$customersSource =
//    [
//        'data/customers.json'
//    ];
//
//$ordersSource =
//    [
//        'example-orders/order1.json',
//        'example-orders/order2.json',
//        'example-orders/order3.json',
//        'example-orders/order4.json',
//        'example-orders/order5.json'
//    ];


/*
 * Load data from GIT
 */
$productsSource =
    [
        'https://raw.githubusercontent.com/teamleadercrm/coding-test/master/data/products.json'
    ];

$customersSource =
    [
        'https://raw.githubusercontent.com/teamleadercrm/coding-test/master/data/customers.json'
    ];

$ordersSource =
    [
        'https://raw.githubusercontent.com/teamleadercrm/coding-test/master/example-orders/order1.json',
        'https://raw.githubusercontent.com/teamleadercrm/coding-test/master/example-orders/order2.json',
        'https://raw.githubusercontent.com/teamleadercrm/coding-test/master/example-orders/order3.json'
    ];