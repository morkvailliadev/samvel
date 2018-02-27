<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

include_once ROOT . '/components/Db.php';
include_once ROOT . '/functions.php';

$db = Db::getConnection();


/* Main logic */

$mainResult = $db->query("SELECT Pk_ordered_act_kpp, varh, varf, varl, Dateb, dates, datea, datek, datev, `int1`, `int2`, vark, vard, `int3` 
                                      FROM ordered_act_kpp");

//For first algorithm

while ($r = $mainResult->fetch()) {

    //Call 1 method
    leftAlgorithmForCurrentRow($r, $db);

    //Call 2 method
    //mainAlgorithmForCurrentRow($r, $db);

    //Call 3 method
    rightAlgorithmForCurrentRow($r, $db);
}

/* End logic*/
