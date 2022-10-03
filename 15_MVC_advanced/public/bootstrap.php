<?php

session_start();

require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use app\core\MyApp;
use app\core\AppExtract;

$myApp = new MyApp(new AppExtract);
$myApp->controller();
$myApp->view();