<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Books::index', ['as' => 'books.home']);
$routes->get('/books', 'Books::all', ['as' => 'books.all']);
$routes->get('/books/popular', 'Books::popular', ['as' => 'books.popular']);
$routes->get('/book/(:segment)', 'Books::show/$1', ['as' => 'books.show']);
$routes->get('/dashboard', 'Books::dashboard', ['as' => 'books.dashboard']);
$routes->get('/dashboard/create', 'Books::create', ['as' => 'books.create']);
$routes->get('/book/edit/(:segment)', 'Books::edit/$1', ['as' => 'books.edit']);
$routes->get('/books/search', 'Books::search', ['as' => 'books.search']);
$routes->get('/books/filter', 'Books::filter', ['as' => 'books.filter']);

$routes->post('/book/edit/(:segment)', 'Books::update/$1', ['as' => 'books.update']);
$routes->post('/books', 'Books::store', ['as' => 'books.store']);
$routes->post('/book/destory/(:segment)', 'Books::destroy/$1', ['as' => 'books.destroy']);




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
