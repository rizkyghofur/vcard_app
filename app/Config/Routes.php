<?php namespace Config;

use Config\Auth as AuthConfig;

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
$routes->setAutoRoute(true);

/**
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
*/

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Additional in-file definitions

$routes->group('admin', [], function($routes) {
    $routes->get('/', 'Home::index', ['as' => 'home']);

    $routes->group('', ['namespace' => 'App\Controllers'], static function ($routes) {
        // Load the reserved routes from Auth.php
        $config         = config(AuthConfig::class);
        $reservedRoutes = $config->reservedRoutes;

        // Login/out
        $routes->get($reservedRoutes['login'], 'AuthController::login', ['as' => $reservedRoutes['login']]);
        $routes->post($reservedRoutes['login'], 'AuthController::attemptLogin');
        $routes->get($reservedRoutes['logout'], 'AuthController::logout', ['as' => $reservedRoutes['logout']]);

        // Registration
        $routes->get($reservedRoutes['register'], 'AuthController::register', ['as' => $reservedRoutes['register']]);
        $routes->post($reservedRoutes['register'], 'AuthController::attemptRegister');

        // Activation
        $routes->get($reservedRoutes['activate-account'], 'AuthController::activateAccount', ['as' => $reservedRoutes['activate-account']]);
        $routes->get($reservedRoutes['resend-activate-account'], 'AuthController::resendActivateAccount', ['as' => $reservedRoutes['resend-activate-account']]);

        // Forgot/Resets
        $routes->get($reservedRoutes['forgot'], 'AuthController::forgotPassword', ['as' => $reservedRoutes['forgot']]);
        $routes->post($reservedRoutes['forgot'], 'AuthController::attemptForgot');
        $routes->get($reservedRoutes['reset-password'], 'AuthController::resetPassword', ['as' => $reservedRoutes['reset-password']]);
        $routes->post($reservedRoutes['reset-password'], 'AuthController::attemptReset');
    });

    $routes->group('contacts', ['namespace' => 'App\Controllers\Admin', 'filter' => ['role:admin']], static function ($routes) {
        $routes->get('', 'Contacts::index', ['as' => 'contactList']);
        $routes->get('index', 'Contacts::index', ['as' => 'contactIndex']);
        $routes->get('list', 'Contacts::index', ['as' => 'contactList2']);
        $routes->get('add', 'Contacts::add', ['as' => 'newContact']);
        $routes->post('add', 'Contacts::add', ['as' => 'createContact']);
        $routes->get('edit/(:num)', 'Contacts::edit/$1', ['as' => 'editContact']);
        $routes->post('edit/(:num)', 'Contacts::edit/$1', ['as' => 'updateContact']);
        $routes->get('delete/(:num)', 'Contacts::delete/$1', ['as' => 'deleteContact']);
        $routes->post('allmenuitems', 'Contacts::allItemsSelect', ['as' => 'select2ItemsOfContacts']);
        $routes->post('menuitems', 'Contacts::menuItems', ['as' => 'menuItemsOfContacts']);
    });

});

$routes->match(['GET', 'POST'], 'user-profile', 'UserProfileController::index', ['as' => 'user-profile']);

/**
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