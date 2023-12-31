<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/penerbit', 'PenerbitController::index');
$routes->get('/penerbit/form', 'PenerbitController::form');
$routes->get('/penerbit/edit/(:num)', 'PenerbitController::edit/$1');
$routes->post('/penerbit/create', 'PenerbitController::create');
$routes->post('/penerbit/hapus', 'PenerbitController::hapus');
$routes->get('/penerbit/icon/(:num).png', 'PenerbitController::tampilicon/$1');

$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::ceklogin');
$routes->get('/logout', 'LoginController::logout');

$routes->get('anggota', 'AnggotaController::index');

$routes->get('peminjaman', 'PeminjamanController::index');
$routes->post('peminjaman', 'PeminjamanController::simpan');
$routes->get('peminjaman/form', 'PeminjamanController::form');
$routes->get('peminjaman/edit/(:num)', 'PeminjamanController::edit/$1');