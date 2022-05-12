<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('MVC', 'MVC');
define('APP', ROOT . DS . MVC . DS . 'app' . DS);
define('controller', ROOT . DS  . 'app' . DS . 'controllers' . DS);
define('MODELS', ROOT . DS  . 'app' . DS . 'models' . DS);
define('VIEWS', ROOT  . DS . 'app' . DS . 'views' . DS);
define('CORE', APP . DS . 'core' . DS);

// require CORE . "app.php";
require "../vendor/autoload.php";

$app = new app\core\App();

