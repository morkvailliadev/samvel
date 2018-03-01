<?php
//ini_set('display_errors', 0);
//error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once ROOT . '/components/Db.php';
require_once ROOT . '/functions.php';
require_once ROOT . '/config/db_params.php';

$db = Db::getConnection();


/* Main logic */

_mainLog("BLOCK PROCESSING START");

//last_pk_table
//$mainResult = $db->query('SELEСT * FROM ' . ORDERED_ACT_KPP . ' WHERE pk_table > ' . $last_pk_table . ' LIMIT '. PARTITION_SIZE);
//$mainResult = $db->query('SELECT * FROM ' . ORDERED_ACT_KPP . ' LIMIT 1000');


while ($r = $mainResult->fetch(PDO::FETCH_ASSOC)) {

    _log(' ID ' . $r['pk_table'], ' ========== START ROW ==========');

    //Call 1 method
    leftAlgorithmForCurrentRow($r, $db);

    //Call 2 method
    mainAlgorithmForCurrentRow($r, $db);

    //Call 3 method
    rightAlgorithmForCurrentRow($r, $db);

    _log(' ID ' . $r['pk_table'], ' ========== END ROW ==========');
    _logTime($r['pk_table'] . ' ('. ORDERED_ACT_KPP .'.pk_table) ' . ' done ' . date("H:i:s") . "\n");

}

_mainLog("BLOCK PROCESSING STOP");

echo "script was executed successfully";

/* End logic*/
