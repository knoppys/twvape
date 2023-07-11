<?php

namespace Vape\Core;

//Controllers Available
use Vape\Controllers\Home;
use Vape\Controllers\Characters;
use Vape\Controllers\Locations;
use Vape\Controllers\Episodes;

/**
 * Handle the routing of all client requests. 
 * Takes domain.com/controller/action/meta and routes to the correct class and method.
 */
class Router
{

    protected $controller = 'home';
    protected $action = 'index';
    protected $params = [];

    /**
     * Prepare the Controller, Action and Meta values and call the correct class and method.
     */
    public function __construct()
    {

        //Prepare the controller and action from the URL
        $this->prepareURL();

        //Call the correct controller. 
        if (file_exists(CONTROLLER . $this->controller . '.php')) {
            $class = '\\Vape\\Controllers\\' . ucfirst($this->controller);
            $this->controller = new $class();
            if (method_exists($this->controller, $this->action)) {
                call_user_func_array([$this->controller, $this->action], $this->params);
            }
        }

    }

    /**
     * Parse the URL into its different pieces.
     *
     * @return void
     */
    protected function prepareURL()
    {

        $request = $_SERVER['REQUEST_URI'];

        //If the request is / then its the home page and no more action is required
        if ($request !== '/') {

            $request = trim($_SERVER['REQUEST_URI'], '/');
            $url = explode('/', $request);

            //THe Controller
            $this->controller = $url[0];

            //The action
            if (isset($url[1]) && $url !== '') {
                $this->action = $url[1];
            }

            //The meta
            unset($url[0], $url[1]);
            $this->params = array_values($url);


        }

    }


}

?>