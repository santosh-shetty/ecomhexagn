<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// ============Start Admin Routes============
// $routes->get('/dashboard', 'Admin::dashboard');
// if (! $user->inGroup('superadmin', 'admin')) {
//     //
// }
$routes->get('admin/dashboard', 'Admin::dashboard', ['filter' => 'adminAuth']);

$routes->get('admin/logout', 'Admin::adminLogout');
// $routes->post('generate-description/(:any)', 'Admin::generateProductDescription/$1');
$routes->post('generate-description', 'Admin::generateProductDescription');



// $routes->group('admin', ['filter' => 'auth:adminAuth'], function ($routes) {

// });

$routes->get('admin/login', 'Admin::login');
$routes->post('admin/adminAuth', 'Admin::adminAuth');
$routes->get('admin/register', 'Admin::register');
$routes->post('admin/register_check', 'Admin::register_check');
// $routes->get('/dashboard', 'Admin::dashboard', ['filter' => 'adminAuth', 'filterGroup' => 'adminAuth']);

// Products routes
$routes->get('/admin/product/all_products', 'Admin::all_products');
$routes->post('/admin/product/check_add_product', 'Admin::check_add_product'); // verify before add product
$routes->post('/admin/product/check_edit_product', 'Admin::check_edit_product'); // verify before edit/ update Category
$routes->get('/admin/product/add_product', 'Admin::add_product');
$routes->get('/admin/product/delete_product/(:num)', 'Admin::delete_product/$1');
$routes->get('/admin/product/view_product/(:num)', 'Admin::view_product/$1');
$routes->get('/admin/product/edit_product/(:num)', 'Admin::edit_product/$1');
// Open Ai Routes
$routes->get('openai', 'OpenAIController::index');
$routes->post('openai/generateImages', 'OpenAIController::generateImages');

// Categories Routes
$routes->get('/admin/category/all_categories', 'Admin::all_categories');
$routes->get('/admin/category/add_category', 'Admin::add_category');
$routes->post('/admin/category/check_add_category', 'Admin::check_add_category'); // verify before add Category
$routes->get('/admin/category/view_category/(:num)', 'Admin::view_category/$1');
$routes->get('/admin/category/edit_category/(:num)', 'Admin::edit_category/$1');
$routes->post('/admin/category/check_edit_category', 'Admin::check_edit_category'); // verify before edit/ update Category
$routes->get('/admin/category/delete_category/(:num)', 'Admin::delete_category/$1');
//Brand Routes
$routes->get('/admin/brands/all_brands', 'Admin::all_brands');
$routes->get('/admin/brands/add_brands', 'Admin::add_brands');
$routes->post('/admin/brands/check_add_brands', 'Admin::check_add_brands');
$routes->get('/admin/brands/view_brands/(:num)', 'Admin::view_brands/$1');
$routes->get('/admin/brands/edit_brands/(:num)', 'Admin::edit_brands/$1');
$routes->post('/admin/brands/check_edit_brands', 'Admin::check_edit_brands');
$routes->get('/admin/brands/delete_brands/(:num)', 'Admin::delete_brands/$1');

//Order Routes
$routes->get('/admin/orders/all_orders', 'Admin::all_orders');

// ============End Admin Routes============

// ============Start FrontEnd Routes============

// Customer Login
$routes->group('customer/auth', ['namespace' => '\App\Controllers\Customers'], function ($routes) {
    // $routes->get('customer/auth/login', 'Auth::login');
    // $routes->post('login', 'Auth::attemptLogin');
    // $routes->get('logout', 'Auth::logout');
});

$routes->get('customer/register', 'Customer::register');
$routes->post('customer/register_check', 'Customer::register_check');
$routes->get('customer/login', 'Customer::login');
$routes->post('customer/login', 'Customer::customerAuth');
$routes->get('customer/logout', 'Customer::logout');
$routes->get('/test', 'Customer::test', ['filter' => 'customerAuth']);
$routes->get('customer/google-login', 'Customer::google_login');


$routes->get('/', 'Home::home');
$routes->get('/product/single_product/(:num)', 'Home::single_product/$1');
$routes->get('/allproducts', 'Home::allProducts');
// Filter Products
$routes->post('/products/filterByAllProducts', 'ProductFilter::filterByAllProducts');
$routes->post('/products/filterByCategory', 'ProductFilter::filterByCategory');
$routes->post('/products/filterByBrands', 'ProductFilter::filterByBrands');
$routes->post('/products/filterProducts', 'ProductFilter::filterProducts');
// carts 
$routes->get('/cart', 'CartsController::cart');
$routes->post('/cart/add/(:num)', 'CartsController::add/$1');
$routes->get('/cart/remove/(:num)', 'CartsController::remove/$1');
$routes->post('/cart/update/(:num)', 'CartsController::update/$1');
$routes->get('/checkout', 'CartsController::checkout');
// Payment
$routes->post('/initiatePayment', 'PaymentController::initiatePayment');
$routes->get('/createPayment', 'PaymentController::createPayment');
$routes->get('/payment/executePayment', 'PaymentController::executePayment');
$routes->get('/payment/success', 'PaymentController::executePayment');
$routes->get('/payment/cancel', 'PaymentController::cancelPayment');

// $routes->post('/initiatePayment', 'RazorpayController::initiatePayment');
// $routes->post('razorpay/initiate-payment', 'RazorpayController::initiateRazorpayPayment');


// ============End FrontEnd Routes============

service('auth')->routes($routes);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}