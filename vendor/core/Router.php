<?php

/**
 * Class Router.
 * Sends requests to appropriate rout depending on parameters that
 * contained in URL.
 */
class Router
{
    /**
     * @array Table of all routes. By default contains only two routs.
     * User can add themself routes.
     */
    protected static $routes = [];

    /**
     * @array Current route that gets by current URL.
     */
    protected static $route = [];

    /**
     * Add route into the table of routes.
     *
     * @param string $regexp Regular expression
     * @param array  $route  route that correspond to URL
     *
     * @return void
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Temporary method that returns all the routes.
     *
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * Temporary method that returns the current route.
     *
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * Matches URL string to regular expression to get route including
     * controller and action. Etc., URL `posts/view` gets following route:
     * Controller - Posts, action - view.
     * Then fill property $route with getting route.
     *
     * @param mixed $url
     *
     * @return void
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if ($pattern == $url) {
                self::$route = $route;

                return true;
            }
        }

        return false;
    }
}
