<?php
//ini_set('display_errors', 0);
//error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once ROOT . '/components/Db.php';
require_once ROOT . '/functions.php';
require_once ROOT . '/config/db_params.php';

$db = Db::getConnection();


/* Main logic */

_mainLog("Начало времени работы алгоритма");

$mainResult = $db->query('SELECT * FROM ' . ORDERED_ACT_KPP . ' LIMIT 1000');


while ($r = $mainResult->fetch(PDO::FETCH_ASSOC)) {

    _log(' ID ' . $r['pk_table'], ' ========== START ROW ==========');
    _logTime('Начальное время обработки ' . ORDERED_ACT_KPP .' ID ' . $r['pk_table'] . '---' . date("H:i:s") ."\n");

    //Call 1 method
    leftAlgorithmForCurrentRow($r, $db);

    //Call 2 method
    mainAlgorithmForCurrentRow($r, $db);

    //Call 3 method
    rightAlgorithmForCurrentRow($r, $db);

    _log(' ID ' . $r['pk_table'], ' ========== END ROW ==========');
    _logTime('Конец времени обработки ' . ORDERED_ACT_KPP .' ID ' . $r['pk_table'] . '---' . date("H:i:s") . "\n");

}

_mainLog("Конец времени работы алгоритма");

echo "script was executed successfully";

/* End logic*/
