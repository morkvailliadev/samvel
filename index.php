<?php
//ini_set('display_errors', 0);
//error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once ROOT . '/components/Db.php';
require_once ROOT . '/functions.php';
require_once ROOT . '/config/db_params.php';

$db = Db::getConnection();


/* Main logic */

$mainResult = $db->query("SELECT * FROM " . ORDERED_ACT_KPP . " LIMIT 10");

//For first algorithm

while ($r = $mainResult->fetch()) {

    //Call 1 method
    leftAlgorithmForCurrentRow($r, $db);

    //Call 2 method
    mainAlgorithmForCurrentRow($r, $db);

    //Call 3 method
    rightAlgorithmForCurrentRow($r, $db);
}

/* End logic*/
