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
$route['default_controller'] = 'shop/index';
$route['login/index']='login/index';
$route['login/signup']='login/signup';
$route['login/forgot']='login/forgot';
$route['login/contact']='login/contact';
$route['login/about']='login/about';
$route['login/logout']='login/logout';
$route['login/resetpassword']='login/resetpassword';
$route['login/admin']='login/admin';
$route['login/(:any)']='login/index';
$route['login/pictures/(:any)']= 'login/pictures/$s';

$route['shop/search'] ='shop/search';
$route['user/search'] ='user/search';
$route['client/search'] ='client/search';
$route['cart/search'] ='cart/search';

$route['stock/registration'] ='stock/registration';
$route['stock/validation'] ='stock/validation';
$route['stock/confirmation'] ='stock/confirmation';
$route['stock/view'] ='stock/view';

$route['shop/index'] ='shop/index';
$route['shop/cart'] ='shop/cart';
$route['shop/view'] ='shop/view';
$route['shop/delete/(:num)'] = 'shop/delete/$1';
$route['shop/addcart']='shop/addcart';
$route['shop/checkout'] ='shop/checkout';
// $route['login/(.+)'] = 'auth/login/$1';
$route['shop/details/(:num)'] = 'shop/details/$1';

$route['product/add'] = 'product/add';
$route['product/delete/(:num)'] = 'product/delete/$1';
$route['product/addmultiple'] = 'product/addmultiple';
$route['product/view'] = 'product/view';
$route['client/view'] = 'client/view';


$route['user/view'] = 'user/view';
$route['user/update/(:num)'] = 'user/update/$1';
$route['user/delete/(:num)'] = 'user/delete/$1';
$route['client/delete/(:num)'] = 'client/delete/$1';
$route['client/update/(:num)'] = 'client/update/$1';
$route['shop/update/(:num)'] = 'shop/update/$1';
$route['product/update/(:num)'] = 'product/update/$1';

$route['category/view'] = 'category/view';
$route['category/add'] = 'category/add';
$route['category/search'] = 'category/search';
$route['category/update/(:num)'] = 'category/update/$1';
$route['category/delete/(:num)'] = 'category/delete/$1';

$route['admin/index'] = 'admin/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
