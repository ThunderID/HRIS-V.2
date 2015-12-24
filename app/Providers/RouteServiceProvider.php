<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

use View, Session;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //
        parent::boot($router);

        Session::put('whoami.id', 1);

        $organisations              = \App\Libraries\APIResponse::httppost(env('API_ORGS_G', 'localhost:9000/organisations'), ['authorizedemployee' => Session::get('whoami.id')]);
        
        $whoami                     = \App\Libraries\APIResponse::httppost(env('API_ME_G', 'localhost:9000/authorized/me'), ['id' => Session::get('whoami.id')]);

        View::share('organisations', $organisations);

        View::share('whoami', $whoami);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
