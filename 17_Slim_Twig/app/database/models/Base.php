<?php

namespace app\database\models;

use app\traits\Read;
use app\traits\Create;
use app\traits\Delete;
use app\traits\Update;
use app\traits\Paginate;
use app\traits\Connection;

abstract class Base
{
    use Read, Create, Update, Delete, Paginate, Connection;

}