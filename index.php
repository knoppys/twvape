<?php 

//Composer Autoload
require 'vendor/autoload.php';

//Some heoper functions for the template
require 'app/core/functions.php';

use Vape\Core\Router;

//Define some key constants to make things OS portable
define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('VIEW', ROOT . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('MODEL', ROOT . 'app' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR);
define('CORE', ROOT . 'app' . DIRECTORY_SEPARATOR . 'Core' . DIRECTORY_SEPARATOR);
define('CONTROLLER', ROOT . 'app' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR);
define('CSSDIR', $_SERVER['HTTP_HOST'] . '/public/css/');
define('JSDIR', $_SERVER['HTTP_HOST']  . '/public/js/');
ini_set('error_log', APP . 'Core/error.log');

//Call the router to handle all requests
new Router();