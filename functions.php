<?php
/* Functions Sections */

function leftAlgorithmForCurrentRow($r, $db)
{
    // If check p_varh in varvar1

    $sql = 'SELECT * FROM varvar1 WHERE varh = :varh';

    $result = $db->prepare($sql);

    $result->bindParam(':varh', $r['varh'], PDO::PARAM_STR);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();

    $id = $result->fetch();

    // If check
    if ($id) {

        //Update data
        $sql = 'UPDATE `varvar1`
            SET 
                varh = :varh, 
                varf = :varf, 
                varl = :varl,
                dateb = :dateb,
                `int1` = :int1,
                dates = :dates,
                datea = :datea,
                datev = :datev,
                datek = :datek,
                dateg = :dateg,
                `int2` = :int2,
                `int3` = :int3,
                vard = :vard,
                vark = :vark,
                varhCount = :varhCount
            WHERE `varh` = :varh';
        $result = $db->prepare($sql);
        $result->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['Dateb'], ':int1' => $r['int1'],
            ':dates' => $r['dates'], ':datea' => $r['datea'], ':datev' => $r['datev'], ':datek' => $r['datek'], ':dateg' => $r['Dateg'],
            ':int2' => $r['int2'], ':int3' => $r['int3'], ':vard' => $r['vard'], ':vark' => $r['vark'], ':varhCount' => ++$id['varhCount']));


        echo "Algorithm 1 - row updated";


    } else {
        $sql = 'INSERT INTO varvar1 '
            . "(varh, varf, varl, dateb, `int1`, dates, datea, datev, datek, dateg, `int2`, `int3`, vard, vark, varhCount)"
            . 'VALUES '
            . '(:varh, :varf, :varl, :dateb, :int1, :dates, :datea, :datev, :datek, :dateg, :int2, :int3, :vard, :vark, 0)';

        $result = $db->prepare($sql);

        $result->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['Dateb'], ':int1' => $r['int1'],
            ':dates' => $r['dates'], ':datea' => $r['datea'], ':datev' => $r['datev'], ':datek' => $r['datek'], ':dateg' => $r['Dateg'],
            ':int2' => $r['int2'], ':int3' => $r['int3'], ':vard' => $r['vard'], ':vark' => $r['vark']));

        echo "Algorithm 1 - row added";
    }

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

function rightAlgorithmForCurrentRow($r, $db)
{

}
/* End functions */