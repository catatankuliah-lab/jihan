<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('kepalagudang', function ($routes) {
    $routes->get('/', 'KepalaGudangController::dashboard');
    $routes->get('user/admin', 'KepalaGudangController::userAdmin');
    $routes->get('user/admin/add', 'KepalaGudangController::userAdminAdd');
    $routes->get('user/admin/detail/(:num)', 'KepalaGudangController::userAdminDetail/$1');
    $routes->get('user/kasir', 'KepalaGudangController::userKasir');
    $routes->get('user/kasir/add', 'KepalaGudangController::userKasirAdd');
    $routes->get('user/kasir/detail/(:num)', 'KepalaGudangController::userKasirDetail/$1');
    $routes->get('supplier', 'KepalaGudangController::supplier');
    $routes->get('supplier/add', 'KepalaGudangController::supplierAdd');
    $routes->get('supplier/detail/(:num)', 'KepalaGudangController::supplierDetail/$1');
    $routes->get('barang', 'KepalaGudangController::barang');
    $routes->get('barang/detail/(:num)', 'KepalaGudangController::barangDetail/$1');
});


$routes->group('api', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    $routes->post('register', 'AuthController::register');
    $routes->post('login', 'AuthController::login');
    $routes->get('users', 'UserController::index');
    $routes->get('users/(:num)', 'UserController::show/$1');
    $routes->post('users', 'UserController::create');
    $routes->put('users/(:num)', 'UserController::update/$1');
    $routes->get('users/admingudang', 'UserController::indexadmingudang');
    $routes->get('users/kasir', 'UserController::indexkasir');
    $routes->delete('users/(:num)', 'UserController::delete/$1');
    $routes->get('supplier', 'SupplierController::index');
    $routes->get('supplier/(:num)', 'SupplierController::show/$1');
    $routes->post('supplier', 'SupplierController::create');
    $routes->put('supplier/(:num)', 'SupplierController::update/$1');
    $routes->delete('supplier/(:num)', 'SupplierController::delete/$1');
    $routes->get('barang', 'BarangController::index');
    $routes->get('barang/(:num)', 'BarangController::show/$1');
    $routes->post('barang', 'BarangController::create');
    $routes->put('barang/(:num)', 'BarangController::update/$1');
    $routes->delete('barang/(:num)', 'BarangController::delete/$1');
});