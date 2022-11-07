<?php

namespace app\database\models;

use app\traits\Read;
use app\traits\Connection;

abstract class Base
{
    use Read, Connection;

}