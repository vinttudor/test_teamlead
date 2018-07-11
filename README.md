# The problem:
https://github.com/teamleadercrm/coding-test/blob/master/1-discounts.md


# The solution:

This project was built under PHP 7.1

## test_example.php (testing file)
- the file for testing the ouput for the initial JSON order transformed in array and for the JSON order after the discounts are applied transformed in array

## discounts_sevice.php (the service)
- the file that basically output the the JSON order after the discounts are applied

## config_discounts.php 
- the config file for the discounts, what discounts we apply with parameters
- "discount_name" value represents the PHP class 
- "params" value is the array withe the parameters (X, Y, Z) that will be raplaced in the discount class, ex: CategoryXBuyYFreeZ(X, Y, Z)

## config_sources.php 
- in this moment the sources are loaded from GIT, but in the "data" and "example-orders" folders there are also the JSON sources, the code for that is commented for now
 
