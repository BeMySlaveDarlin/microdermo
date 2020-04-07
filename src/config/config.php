<?php

use Phalcon\Config;

defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: dirname(__DIR__) . DS);
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new Config([
    'environment' => [
        'type' => getenv('ENV_TYPE'),
    ],
    'application' => [
        'controllersDir' => APP_PATH . 'Controllers' . DS,
        'modelsDir' => APP_PATH . 'Models' . DS,
        'servicesDir' => APP_PATH . 'Services' . DS,
        'baseUri' => preg_replace(
            '/public([\/\\\\])index.php$/',
            '',
            $_SERVER['PHP_SELF']
        ),
        'cryptKey' => 'R7\U8BKGE94VjUsXtD8A\cC[KuNiUE[6!r_',
        'version' => '1.0.0',
    ],
    'database' => [
        'adapter'    => 'Mysql',
        'host'       => 'service_db_mysql',
        'username'   => getenv('MYSQL_USER'),
        'password'   => getenv('MYSQL_PASSWORD'),
        'dbname'     => getenv('MYSQL_DATABASE'),
        'charset'    => 'utf8',
    ],
]);
