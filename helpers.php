<?php
/**
 * Illuminate/Routing
 *
 * @source https://github.com/illuminate/routing
 * @contributor Muhammed Gufran
 * @contributor Matt Stauffer
 * @contributor https://github.com/jwalton512
 * @contributor https://github.com/dead23angel
 */

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;
// Create a service container
$container = new Container;
// Create a request from server variables, and bind it to the container; optional
$request = Request::capture();
$container->instance('Illuminate\Http\Request', $request);
// Using Illuminate/Events/Dispatcher here (not required); any implementation of
// Illuminate/Contracts/Event/Dispatcher is acceptable
$events = new Dispatcher($container);
// Create the router instance
$router = new Router($events, $container);

class Route
{
	public static $router;

    public static function __callStatic($name, $arguments) 
    {
    	return call_user_func_array(array(self::$router, $name), $arguments);
    }
}
Route::$router =& $router;



// Create the redirect instance
$redirect = new Redirector(new UrlGenerator($router->getRoutes(), $request));
class Redirect
{
	public static $redirect;

    public static function __callStatic($name, $arguments) 
    {
    	return call_user_func_array(array(self::$redirect, $name), $arguments);
    }
}
Redirect::$redirect =& $redirect;
// use redirect
// return $redirect->home();
// return $redirect->back();
// return $redirect->to('/');
// Dispatch the request through the router

// Load the routes
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/routes.php';
$response = $router->dispatch($request);
// Send the response back to the browser
$response->send();
