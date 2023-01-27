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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Login::index');
$routes->get('/mahasiswa', 'Mahasiswa::index', ['filter' => 'adminFilter']) ;
$routes->get('/prodi', 'Prodi::index', ['filter' => 'adminFilter']) ;
$routes->get('/kelas', 'Kelas::index', ['filter' => 'adminFilter']) ;


$routes->get('/mahasiswa/create', 'Mahasiswa::create', ['filter' => 'adminFilter']);
$routes->get('/mahasiswa/save', 'Mahasiswa::save', ['filter' => 'adminFilter']);
$routes->get('/mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1', ['filter' => 'adminFilter']);
$routes->delete('/mahasiswa/(:num)', 'Mahasiswa::delete/$1', ['filter' => 'adminFilter']);
$routes->get('/mahasiswa/(:num)', 'Mahasiswa::detail/$1', ['filter' => 'adminFilter']);

$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');


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