<?php

use app\classes\Bind;
use app\models\Connection;

require "vendor/autoload.php";
require "app/functions/helpers.php";

Bind::bind('connection', Connection::connect());