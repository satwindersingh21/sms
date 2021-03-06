<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);



/*
 * Add admin prefix routing
 */
Router::prefix('Admin', function ($routes) {
    $routes->connect('/', ['controller'=>'Admins','action'=>'login']);
    $routes->connect('/dashboard', ['controller'=>'Admins','action'=>'dashboard']);
    $routes->fallbacks('InflectedRoute');
});

Router::scope('/', function (RouteBuilder $routes) {
    
    
    $routes->connect('/', ['controller' => 'Users', 'action' => 'home']);
    $routes->connect('/dashboard', ['controller' => 'Users', 'action' => 'dashboard']);
    $routes->connect('/activities', ['controller' => 'SentMessages', 'action' => 'index']);
    $routes->connect('/send-message', ['controller' => 'SentMessages', 'action' => 'add']);
    $routes->connect('/profile', ['controller' => 'Users', 'action' => 'profile']);
    $routes->connect('/send-message', ['controller' => 'SendMessages', 'action' => 'add']);
    $routes->connect('/my-activities', ['controller' => 'SendMessages', 'action' => 'index']);
    $routes->connect('/privacy-policy', ['controller' => 'Pages', 'action' => 'privacyPolicy']);
    $routes->connect('/terms-and-conditions', ['controller' => 'Pages', 'action' => 'termsAndConditions']);
    $routes->connect('/how-to-work', ['controller' => 'Pages', 'action' => 'howToWork']);
    $routes->connect('/about', ['controller' => 'Pages', 'action' => 'about']);
    $routes->connect('/contact', ['controller' => 'Pages', 'action' => 'contact']);
    $routes->connect('/plans', ['controller' => 'SubscriptionPackages', 'action' => 'plans']);
    $routes->connect('/about-us', ['controller' => 'Pages', 'action' => 'about_us']);
    $routes->connect('/paytm', ['controller' => 'Subscriptions', 'action' => 'paytm']);


    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});
