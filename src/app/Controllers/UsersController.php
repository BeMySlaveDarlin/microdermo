<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\Users;
use Phalcon\Http\ResponseInterface;
use Phalcon\Mvc\Controller;

class UsersController extends Controller
{
    public function list(): ResponseInterface
    {
        $users = Users::find([
            'columns' => [
                'id',
                'first_name',
                'last_name',
                'email',
            ],
            'limit' => 5
        ]);

        return $this->response->setJsonContent([
            'success' => true,
            'data' => $users->toArray(),
            'message' => 'This is users list',
        ]);
    }
    public function view(int $id = null): ResponseInterface
    {
        $user = Users::findFirst($id);

        return $this->response->setJsonContent([
            'success' => true,
            'data' => $user->toArray([
                'id',
                'first_name',
                'last_name',
                'email',
            ]),
            'message' => 'This is users list',
        ]);
    }
}
