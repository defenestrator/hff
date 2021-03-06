<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapSparkRoutes($router);

        $this->mapWebRedirectRoutes($router);

        $this->mapWebRoutes($router);

        $this->mapApiRoutes($router);
    }

    /**
     * @param Router $router
     * @return void
     */
    protected function mapWebRedirectRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => ['web'],
        ], function ($router) {
            require base_path('routes/redirects.php');
        });
    }

    /**
     * @param Router $router
     * @return void
     */
    protected function mapSparkRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace
        ], function ($router) {
            require base_path('routes/spark.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => ['web'],
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapApiRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace,
            'middleware' => 'api',
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }


}
