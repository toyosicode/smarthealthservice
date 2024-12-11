<?php
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);
defined('LIB_PATH') ? NULL : define('LIB_PATH', dirname(__FILE__, 2) . DS . "smart_service_app_asset");

require_once(LIB_PATH . DS . "access_control.php");
require_once(LIB_PATH . DS . "config.php");
require_once(LIB_PATH . DS . "vendor" . DS . "autoload.php");

/**
 * Set the DB connection and boot eloquent ORM
 */
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => DB_SERVER,
    'database' => DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASS,
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
], "default");

$capsule->setAsGlobal();
$capsule->bootEloquent();

require_once(LIB_PATH . DS . "routes.php");