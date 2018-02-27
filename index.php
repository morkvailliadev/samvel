<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

include_once ROOT . '/components/Db.php';

$db = Db::getConnection();


/* Main logic */

$mainResult = $db->query('SELECT id, varh, varf, varl, Dateb, dates, datea, datek, datev, Dateg, int1, int2, vark, vard, int3 
                                      FROM odered_act_kpp ORDER BY id DESC');


while ($r = $mainResult->fetch()) {

    //Call 1 method

    //Call 2 method
    mainAlgorithmForCurrentRow($r, $db);

    //Call 3 method

}

/* End logic*/






/* Functions Sections */

function leftAlgorithmForCurrentRow($r, $db)
{

}

function mainAlgorithmForCurrentRow($r, $db)
{

    if ($r['int1'] == 2) {

        $sql = 'INSERT INTO date1date2 '
            . '(varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka, ins_date'
            . 'VALUES '
            . '(:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
                :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, "1", :ins_date)';

        $result = $db->prepare($sql);

        $result->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['Dateb'], ':int1_in' => $r['int1'],
            ':dates_in' => $r['dates'], ':datea_in' => $r['datea'], ':datev_in' => $r['datev'], ':datek_in' => $r['datek'], ':dateg_in' => $r['Dateg'],
            ':int2_in' => $r['int2'], ':int3_in' => $r['int3'], ':vard_in' => $r['vard'], ':vark_in' => $r['vark'], ':int1_out' => $r['int1'],
            ':dates_out' => $r['dates'], ':datea_out' => $r['datea'], ':datev_out' => $r['datev'], ':datek_out' => $r['datek'], ':dateg_out' => $r['Dateg'],
            ':int2_out' => $r['int2'], ':int3_out' => $r['int3'], ':vard_out' => $r['vard'], ':vark_out' => $r['vark'], ':ins_date' => $r['dates']));
    } elseif ($r['int1'] == 1) {

        $sql = 'SELECT * FROM date1date2 WHERE varh = :varh AND int1_out = NULL';

        $result = $db->prepare($sql);

        $result->bindParam(':varh', $r['varh'], PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $id = $result->fetch();

        // В таблице date1date2 есть строка в которой varh=p_varh и int1_out is null
        if ($id) {

            $sql = 'INSERT INTO date1date2 '
                . '(varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka, ins_date'
                . 'VALUES '
                . '(:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
                :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, "1", :ins_date)';

            $result = $db->prepare($sql);

            $result->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['Dateb'], ':int1_in' => $r['int1'],
                ':dates_in' => $r['dates'], ':datea_in' => $r['datea'], ':datev_in' => $r['datev'], ':datek_in' => $r['datek'], ':dateg_in' => $r['Dateg'],
                ':int2_in' => $r['int2'], ':int3_in' => $r['int3'], ':vard_in' => $r['vard'], ':vark_in' => $r['vark'], ':int1_out' => $r['int1'],
                ':dates_out' => $r['dates'], ':datea_out' => $r['datea'], ':datev_out' => $r['datev'], ':datek_out' => $r['datek'], ':dateg_out' => $r['Dateg'],
                ':int2_out' => $r['int2'], ':int3_out' => $r['int3'], ':vard_out' => $r['vard'], ':vark_out' => $r['vark'], ':ins_date' => $r['dates']));
        } else {
            $sql = 'INSERT INTO date1date2 '
                . '(varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka, ins_date'
                . 'VALUES '
                . '(:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
                :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, "0", :ins_date)';

            $result = $db->prepare($sql);

            $result->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['Dateb'], ':int1_in' => $r['int1'],
                ':dates_in' => $r['dates'], ':datea_in' => $r['datea'], ':datev_in' => $r['datev'], ':datek_in' => $r['datek'], ':dateg_in' => $r['Dateg'],
                ':int2_in' => $r['int2'], ':int3_in' => $r['int3'], ':vard_in' => $r['vard'], ':vark_in' => $r['vark'], ':int1_out' => $r['int1'],
                ':dates_out' => $r['dates'], ':datea_out' => $r['datea'], ':datev_out' => $r['datev'], ':datek_out' => $r['datek'], ':dateg_out' => $r['Dateg'],
                ':int2_out' => $r['int2'], ':int3_out' => $r['int3'], ':vard_out' => $r['vard'], ':vark_out' => $r['vark'], ':ins_date' => $r['dates']));
        }
    }
}

/* End functions */