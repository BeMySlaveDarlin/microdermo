<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use App\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Http\Response;

define('APP_TYPE', 'API');
define('APP_ENV', getenv('ENV_TYPE'));
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', dirname(__DIR__) . DS);
define('APP_PATH', BASE_PATH . 'app' . DS);
define('CNF_PATH', BASE_PATH . 'config' . DS);
define('VENDOR_PATH', BASE_PATH . 'vendor' . DS);

include VENDOR_PATH . 'autoload.php';

try {
    $di = new FactoryDefault();
    include CNF_PATH . '/services.php';

    $app = new Application($di);
    $app->setRoutes();
    $app->handle($_SERVER['REQUEST_URI']);
} catch (\Throwable $throwable) {
    $response = $di->getShared('response') ?? new Response();
    $response->setStatusCode(500, 'Exception');
    $response->setJsonContent([
        'success' => false,
        'data' => [
            'uri' => $_SERVER['REQUEST_URI'],
        ],
        'message' => $throwable->getMessage(),
    ]);
    $response->send();
}
