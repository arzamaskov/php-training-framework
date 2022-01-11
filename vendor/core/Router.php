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
    protected static array $routes = [];

    /**
     * @array Current route that gets by current URL.
     */
    protected static array $route = [];

    /**
     * Add route into the table of routes.
     *
     * @param string $regexp Regular expression
     * @param array  $route  route that correspond to URL
     */
    public static function add(string $regexp, array $route = []): void
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Temporary method that returns all the routes.
     */
    public static function getRoutes(): array
    {
        return self::$routes;
    }

    /**
     * Temporary method that returns the current route.
     */
    public static function getRoute(): array
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
     */
    private static function matchRoute(string $url): bool
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }

                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }

                self::$route = $route;

                return true;
            }
        }

        return false;
    }

    /**
     * Redirects URL to the right route.
     *
     * @param string $url Including URL
     */
    public static function dispatch(string $url): void
    {
        if (self::matchRoute($url)) {
            $controller = self::$route['controller'];

            if (class_exists($controller)) {
                echo "Class <b>$controller</b> was included";
            } else {
                echo "Controller <b>$controller</b> not found";
            }
            debug(self::$route);
        } else {
            http_response_code(404);
            include '404.html';
        }
    }
}
