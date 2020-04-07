<?php

declare(strict_types = 1);

namespace App\Controllers;

use Phalcon\Http\ResponseInterface;
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function index(): ResponseInterface
    {
        return $this->response->setJsonContent([
            'success' => true,
            'data' => [
                __CLASS__,
                'index'
            ],
            'message' => 'This is index action of index controller',
        ]);
    }
}
