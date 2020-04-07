<?php

declare(strict_types = 1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Users extends Model
{
    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $username;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $password_salt;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $first_name;

    /**
     *
     * @var string
     */
    public $last_name;

    /**
     *
     * @var string
     */
    public $created;

    /**
     *
     * @var string
     */
    public $updated;
}
