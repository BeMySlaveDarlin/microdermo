<?php

use App\Controllers\IndexController;

$di->set('config', function ()
{
    return include CNF_PATH . 'config.php';
});

$di->setShared('db', function ()
{
    $config = $this->getConfig();

    $adapter = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname,
        'charset' => $config->database->charset,
    ];

    if ($config->database->adapter === 'Postgresql') {
        unset($params['charset']);
    }

    return new $adapter($params);
});
