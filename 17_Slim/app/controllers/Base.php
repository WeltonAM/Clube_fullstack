<?php

namespace app\controllers;

use app\traits\Connection;
use app\traits\Read;
use Slim\Views\Twig;
use app\traits\Create;
use app\traits\Delete;
use app\traits\Update;
use app\traits\Paginate;
use app\traits\Template;

abstract class Base
{
    use Create, Read, Update, Delete, Paginate, Template, Connection;
}