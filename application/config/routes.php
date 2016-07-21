<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'landing';
$route['shop'] = 'shop/home';
$route['wetindey'] = 'backend/index';
$route['home/(:any)'] = 'shop/home/home/$1';
$route['products/details/(:any)'] = 'shop/home/product/$1';
$route['cart'] = 'shop/order/cart';
$route['order-complete'] = 'shop/order/complete';
$route['pay-online'] = 'shop/order/payment_gateway';
$route['empty-cart'] = 'shop/order/emptycart';
$route['cart-checkout'] = 'shop/order/checkout/';
$route['checkout/(:any)'] = 'shop/order/checkout/$1';
$route['registration'] = 'shop/home/registration';
$route['register'] = 'shop/home/register';
$route['category/(:any)'] = 'shop/home/category/$1';
$route['subcategory/(:any)'] = 'shop/home/subcategory/$1';
$route['search'] = 'shop/home/search';
$route['search-by-price/(:any)'] = 'shop/home/search_by_price/$1';
$route['paymentcomplete/(:any)'] = 'shop/order/paymentcomplete/$1';
$route['status/(:any)'] = 'shop/home/status/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
