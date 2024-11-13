<?php
namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes = Services::routes();

// Define custom endpoints here

// User Controller routes
$routes->get('users', 'UserController::index'); // returns a list of all users
$routes->delete('deleteUser/(:num)', 'UserController::delete/$1');
$routes->post('login', 'UserController::userLogin', ['filter' => 'cors']);