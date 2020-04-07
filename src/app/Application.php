<?php

declare(strict_types = 1);

namespace App;

use App\Controllers\IndexController;
use App\Controllers\UsersController;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\Collection;

class Application extends Micro
{
    public function setRoutes(): void
    {
        $this->notFound(function ()
        {
            $this
                ->response
                ->setStatusCode(404, 'Not Found')
                ->setJsonContent([
                    'success' => false,
                    'data' => null,
                    'message' => 'Nothing to see here. Move along....',
                ])
                ->send();
        });

        $index = new Collection();
        $index->setHandler(IndexController::class, true);
        $index->get('/', 'index');
        $this->mount($index);

        $users = new Collection();
        $users->setHandler(UsersController::class, true);
        $users->get('/users', 'list');
        $users->get('/users/{id}', 'view');
        $this->mount($users);
    }

}
