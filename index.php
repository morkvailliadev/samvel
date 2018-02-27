<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

include_once ROOT . '/components/Db.php';

$db = Db::getConnection();
print_r($db);
