<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

include_once ROOT . '/components/Db.php';

$db = Db::getConnection();




$mainResult = $db->query('SELECT id, varh, varf, varl, Dateb, dates, datea, datek, datev, Dateg, int1, int2, vark, vard, int3 
                                      FROM odered_act_kpp ORDER BY id DESC');

// Main loop ordered_act_kpp

while ($rowMain = $mainResult->fetch()) {

    // First algorithm

    if ($rowMain['int1'] == 2) {

        $firstSql = 'INSERT INTO date1date2 '
            . '(varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka, ins_date'
            . 'VALUES '
            . '(:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
                :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, "1", :ins_date)';

        $result = $db->prepare($sql);

        $result->execute(array(':varh' => $rowMain['varh'], ':varf' => $rowMain['varf'], ':varl' => $rowMain['varl'], ':dateb' => $rowMain['Dateb'], ':int1_in' => $rowMain['int1'],
            ':dates_in' => $rowMain['dates'], ':datea_in' => $rowMain['datea'],':datev_in' => $rowMain['datev'],':datek_in' => $rowMain['datek'],':dateg_in' => $rowMain['Dateg'],
            ':int2_in' => $rowMain['int2'],':int3_in' => $rowMain['int3'],':vard_in' => $rowMain['vard'],':vark_in' => $rowMain['vark'],':int1_out' => $rowMain['int1'],
            ':dates_out' => $rowMain['dates'],':datea_out' => $rowMain['datea'],':datev_out' => $rowMain['datev'],':datek_out' => $rowMain['datek'],':dateg_out' => $rowMain['Dateg'],
            ':int2_out' => $rowMain['int2'],':int3_out' => $rowMain['int3'],':vard_out' => $rowMain['vard'],':vark_out' => $rowMain['vark'],':ins_date' => $rowMain['dates']));
    }

    elseif ($rowMain['int1'] == 1) {

        $sqlInt1 = 'SELECT * FROM date1date2 WHERE varh = :varh AND int1_out = NULL';

        $result = $db->prepare($sqlInt1);

        $result->bindParam(':varh', $rowMain['varh'], PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $id = $result->fetch();

        if ($id) {

            $firstSql = 'INSERT INTO date1date2 '
                . '(varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka, ins_date'
                . 'VALUES '
                . '(:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
                :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, "1", :ins_date)';

              $result = $db->prepare($sql);

            $result->execute(array(':varh' => $rowMain['varh'], ':varf' => $rowMain['varf'], ':varl' => $rowMain['varl'], ':dateb' => $rowMain['Dateb'], ':int1_in' => $rowMain['int1'],
                ':dates_in' => $rowMain['dates'], ':datea_in' => $rowMain['datea'],':datev_in' => $rowMain['datev'],':datek_in' => $rowMain['datek'],':dateg_in' => $rowMain['Dateg'],
                ':int2_in' => $rowMain['int2'],':int3_in' => $rowMain['int3'],':vard_in' => $rowMain['vard'],':vark_in' => $rowMain['vark'],':int1_out' => $rowMain['int1'],
                ':dates_out' => $rowMain['dates'],':datea_out' => $rowMain['datea'],':datev_out' => $rowMain['datev'],':datek_out' => $rowMain['datek'],':dateg_out' => $rowMain['Dateg'],
                ':int2_out' => $rowMain['int2'],':int3_out' => $rowMain['int3'],':vard_out' => $rowMain['vard'],':vark_out' => $rowMain['vark'],':ins_date' => $rowMain['dates']));
        }
    }
}

print_r($db);
