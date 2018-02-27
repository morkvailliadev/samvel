<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

include_once ROOT . '/components/Db.php';
include_once ROOT . '/functions.php';

$db = Db::getConnection();


/* Main logic */

$mainResult = $db->query('SELECT id, varh, varf, varl, Dateb, dates, datea, datek, datev, Dateg, int1, int2, vark, vard, int3 
                                      FROM odered_act_kpp ORDER BY id DESC');

//For first algorithm
$varhCount = 1;

while ($r = $mainResult->fetch()) {

    //Call 1 method
    leftAlgorithmForCurrentRow($r, $db);

    //Call 2 method
    mainAlgorithmForCurrentRow($r, $db);

    //Call 3 method
    rightAlgorithmForCurrentRow($r, $db);
}

/* End logic*/
