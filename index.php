<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__.'/vendor/autoload.php';
use K1785\UserSettingRequest\App;

$app = new App();
$app->run($_SERVER);