<?php

use CodeIgniter\Router\RouteCollection;
$routes->get('/', 'AuthController::loginPage');
$routes->get('/login', 'AuthController::loginPage');
$routes->get('/register', 'AuthController::registerPage');
$routes->post('/register', 'AuthController::register');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index'); // Tambahkan ini!
$routes->get('/topup', 'TopupController::index');
$routes->post('/topup/proses', 'TopupController::prosesTopup');
$routes->post('/topup/process', 'TopupController::process');
$routes->get('/transaction', 'TransactionController::index');
$routes->post('/topup', 'TopupController::store');
$routes->get('/topup', function() {
   return view('topup');
});
$routes->get('/transaction', 'TransactionController::index');
$routes->get('/akun', 'Akun::index');
$routes->post('/akun/update', 'Akun::update'); // Untuk proses update akun nanti
















