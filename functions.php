<?php
/* Functions Sections */

function leftAlgorithmForCurrentRow($r, $db)
{
    // If check p_varh in varvar1
    $stmt = $db->prepare('SELECT * FROM varvar1 WHERE varh = :varh');

    $stmt->bindParam(':varh', $r['varh'], PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $rows = $stmt->fetch();
    unset($stmt);

    // If check
    if ($rows) {

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

        $stmt = $db->prepare($sql);
        $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1' => $r['int1'],
            ':dates' => $r['dates'], ':datea' => $r['datea'], ':datev' => $r['datev'], ':datek' => $r['datek'], ':dateg' => $r['dateg'],
            ':int2' => $r['int2'], ':int3' => $r['int3'], ':vard' => $r['vard'], ':vark' => $r['vark'], ':varhCount' => ++$rows['varhCount']));

        echo "Algorithm 1 - row updated <br>";


    } else {
        $sql = 'INSERT INTO varvar1 (varh, varf, varl, dateb, `int1`, dates, datea, datev, datek, dateg, `int2`, `int3`, vard, vark, varhCount)
                VALUES (:varh, :varf, :varl, :dateb, :int1, :dates, :datea, :datev, :datek, :dateg, :int2, :int3, :vard, :vark, 0)';

        $stmt = $db->prepare($sql);

        $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1' => $r['int1'],
            ':dates' => $r['dates'], ':datea' => $r['datea'], ':datev' => $r['datev'], ':datek' => $r['datek'], ':dateg' => $r['dateg'],
            ':int2' => $r['int2'], ':int3' => $r['int3'], ':vard' => $r['vard'], ':vark' => $r['vark']));

        echo "Algorithm 1 - row added <br>";
    }
}

function mainAlgorithmForCurrentRow($r, $db)
{
    if ($r['int1'] == 2) {

        // insert data in date1date2 column oshibka = 1
        $sql = 'INSERT INTO date1date2 
            (varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka)
            VALUES
            (:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
            :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, 1)';

        $stmt = $db->prepare($sql);

        $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1_in' => $r['int1'],
            ':dates_in' => $r['dates'], ':datea_in' => $r['datea'], ':datev_in' => $r['datev'], ':datek_in' => $r['datek'], ':dateg_in' => $r['dateg'],
            ':int2_in' => $r['int2'], ':int3_in' => $r['int3'], ':vard_in' => $r['vard'], ':vark_in' => $r['vark'], ':int1_out' => $r['int1'],
            ':dates_out' => $r['dates'], ':datea_out' => $r['datea'], ':datev_out' => $r['datev'], ':datek_out' => $r['datek'], ':dateg_out' => $r['dateg'],
            ':int2_out' => $r['int2'], ':int3_out' => $r['int3'], ':vard_out' => $r['vard'], ':vark_out' => $r['vark'], ':ins_date' => $r['dates']));

    } elseif ($r['int1'] == 1) {

        $sql = 'SELECT * FROM date1date2 WHERE varh = :varh AND int1_out = NULL';

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':varh', $r['varh'], PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $rows = $stmt->fetch();
        unset($stmt);

        // В таблице date1date2 есть строка в которой varh=p_varh и int1_out is null -> oshibka = 1
        if ($rows) {

            $sql = 'INSERT INTO date1date2 (varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
                                datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka, ins_date) 
                    VALUES (:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
                            :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, "1", :ins_date)';

            $stmt = $db->prepare($sql);

            $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1_in' => $r['int1'],
                ':dates_in' => $r['dates'], ':datea_in' => $r['datea'], ':datev_in' => $r['datev'], ':datek_in' => $r['datek'], ':dateg_in' => $r['dateg'],
                ':int2_in' => $r['int2'], ':int3_in' => $r['int3'], ':vard_in' => $r['vard'], ':vark_in' => $r['vark'], ':int1_out' => $r['int1'],
                ':dates_out' => $r['dates'], ':datea_out' => $r['datea'], ':datev_out' => $r['datev'], ':datek_out' => $r['datek'], ':dateg_out' => $r['dateg'],
                ':int2_out' => $r['int2'], ':int3_out' => $r['int3'], ':vard_out' => $r['vard'], ':vark_out' => $r['vark'], ':ins_date' => $r['dates']));
        } else {

            //иначе просто копируем в data1date2
            $sql = 'INSERT INTO date1date2 (varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
                                            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka, ins_date) 
                    VALUES (:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
                            :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, "0", :ins_date)';

            $stmt = $db->prepare($sql);

            $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1_in' => $r['int1'],
                ':dates_in' => $r['dates'], ':datea_in' => $r['datea'], ':datev_in' => $r['datev'], ':datek_in' => $r['datek'], ':dateg_in' => $r['dateg'],
                ':int2_in' => $r['int2'], ':int3_in' => $r['int3'], ':vard_in' => $r['vard'], ':vark_in' => $r['vark'], ':int1_out' => $r['int1'],
                ':dates_out' => $r['dates'], ':datea_out' => $r['datea'], ':datev_out' => $r['datev'], ':datek_out' => $r['datek'], ':dateg_out' => $r['dateg'],
                ':int2_out' => $r['int2'], ':int3_out' => $r['int3'], ':vard_out' => $r['vard'], ':vark_out' => $r['vark'], ':ins_date' => $r['dates']));
        }
    } else {  // int1 == 0
        $sql = 'SELECT * FROM date1date2 WHERE varh = :varh';

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':varh', $r['varh'], PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $rows = $stmt->fetch();
        unset($stmt);

        if($rows){
            if($rows['int1_out'] != NULL){
                //update строку с varh в таблице date1date2 и  ordere_act_kpp
            } else {
                // insert date1date2, oshibka = 1
            }

        } else {
            // insert date1date2, oshibka = 0
        }
    }
}


function rightAlgorithmForCurrentRow($r, $db)
{
    $stmt = $db->prepare('SELECT * FROM varhvard WHERE varh = :varh and vard = :vard');
    $stmt->bindParam(':varh', $r['varh'], PDO::PARAM_STR);
    $stmt->bindParam(':vard', $r['vard'], PDO::PARAM_STR);

    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    unset ($stmt);

    if (isset($rows['int3']) && $rows['int3'] != $r['int3']) {

        $stmt = $db->prepare('INSERT INTO varhvard (vard, `int2`, `int3`) VALUES (:vard, :int2, :int3)');

        $stmt->execute(array(':vard' => $r['vard'], ':int2' => $r['int2'], ':int3' => $r['int3']));

        echo 'Algorithm 3 - row added <br>';
    } else {
        echo 'Algorithm 3 - the condition is not discharged <br>';
    }
}