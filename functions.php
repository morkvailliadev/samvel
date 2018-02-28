<?php
/* Functions Sections */

function leftAlgorithmForCurrentRow($r, $db)
{
    // If check p_varh in varvar1
    $stmt = $db->prepare('SELECT * FROM ' . VARVAR1 . ' WHERE varh = :varh');

    $stmt->bindParam(':varh', $r['varh'], PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $rows = $stmt->fetch();
    unset($stmt);

    // If check
    if ($rows) {

        //Update data
        $sql = 'UPDATE ' . VARVAR1 .' 
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

        _log($rows, 'Algorithm 1 - row updated');


    } else {
        $sql = 'INSERT INTO ' . VARVAR1 . ' (varh, varf, varl, dateb, `int1`, dates, datea, datev, datek, dateg, `int2`, `int3`, vard, vark, varhCount)
                VALUES (:varh, :varf, :varl, :dateb, :int1, :dates, :datea, :datev, :datek, :dateg, :int2, :int3, :vard, :vark, 0)';

        $stmt = $db->prepare($sql);

        $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1' => $r['int1'],
            ':dates' => $r['dates'], ':datea' => $r['datea'], ':datev' => $r['datev'], ':datek' => $r['datek'], ':dateg' => $r['dateg'],
            ':int2' => $r['int2'], ':int3' => $r['int3'], ':vard' => $r['vard'], ':vark' => $r['vark']));

        _log($rows, 'Algorithm 1 - row added');
    }
}

function mainAlgorithmForCurrentRow($r, $db)
{
    if ($r['int1'] == 2) {

        // insert data in date1date2 column oshibka = 1 (DONE)
        $sql = 'INSERT INTO ' . DATE1DATE2 . ' 
            (varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka)
            VALUES
            (:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
            :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, 1)';

        $stmt = $db->prepare($sql);

        $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1_in' => $r['int1'],
            ':dates_in' => $r['dates'], ':datea_in' => $r['datea'], ':datev_in' => $r['datev'], ':datek_in' => $r['datek'], ':dateg_in' => $r['dateg'],
            ':int2_in' => $r['int2'], ':int3_in' => $r['int3'], ':vard_in' => $r['vard'], ':vark_in' => $r['vark'], ':int1_out' => null,
            ':dates_out' => null, ':datea_out' => null, ':datev_out' => null, ':datek_out' => null, ':dateg_out' => null,
            ':int2_out' => null, ':int3_out' => null, ':vard_out' => null, ':vark_out' => null));

    } elseif ($r['int1'] == 1) {

        //Check this block (DONE)

        $sql = 'SELECT * FROM ' . DATE1DATE2 . ' WHERE varh = :varh AND int1_out IS NULL';

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':varh', $r['varh'], PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $rows = $stmt->fetch();
        unset($stmt);

        // В таблице date1date2 есть строка в которой varh=p_varh и int1_out is null -> oshibka = 1 (DONE)
        if ($rows) {

            $sql = 'INSERT INTO ' . DATE1DATE2 . ' 
            (varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka)
            VALUES
            (:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
            :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, 1)';

            $stmt = $db->prepare($sql);

            $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1_in' => $r['int1'],
                ':dates_in' => $r['dates'], ':datea_in' => $r['datea'], ':datev_in' => $r['datev'], ':datek_in' => $r['datek'], ':dateg_in' => $r['dateg'],
                ':int2_in' => $r['int2'], ':int3_in' => $r['int3'], ':vard_in' => $r['vard'], ':vark_in' => $r['vark'], ':int1_out' => null,
                ':dates_out' => null, ':datea_out' => null, ':datev_out' => null, ':datek_out' => null, ':dateg_out' => null,
                ':int2_out' => null, ':int3_out' => null, ':vard_out' => null, ':vark_out' => null));
        } else {

            //иначе просто копируем в data1date2 (in пишу, out - null) (DONE)
            $sql = 'INSERT INTO ' . DATE1DATE2 . ' 
            (varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka)
            VALUES
            (:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
            :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, 0)';

            $stmt = $db->prepare($sql);

            $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1_in' => $r['int1'],
                ':dates_in' => $r['dates'], ':datea_in' => $r['datea'], ':datev_in' => $r['datev'], ':datek_in' => $r['datek'], ':dateg_in' => $r['dateg'],
                ':int2_in' => $r['int2'], ':int3_in' => $r['int3'], ':vard_in' => $r['vard'], ':vark_in' => $r['vark'], ':int1_out' => null,
                ':dates_out' => null, ':datea_out' => null, ':datev_out' => null, ':datek_out' => null, ':dateg_out' => null,
                ':int2_out' => null, ':int3_out' => null, ':vard_out' => null, ':vark_out' => null));
        }
    } else {  // int1 == 0

        //Check this block
        $sql = 'SELECT * FROM ' . DATE1DATE2 . ' WHERE varh = :varh';

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':varh', $r['varh'], PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $rows = $stmt->fetch();
        unset($stmt);

        if($rows){
            //Check this block (DONE)
            if ($rows['int1_in'] != NULL) {

                //update строку с varh в таблице date1date2 и  ordere_act_kpp
                $sql = 'UPDATE `' . DATE1DATE2 . '`
            SET 
                varh = :varh, 
                varf = :varf, 
                varl = :varl,
                dateb = :dateb,
                int1_in = :int1_in,
                dates_in = :dates_in,
                datea_in = :datea_in,
                datev_in = :datev_in,
                datek_in = :datek_in,
                dateg_in = :dateg_in,
                int2_in = :int2_in,
                int3_in = :int3_in,
                vard_in = :vard_in,
                vark_in = :vark_in,
                int1_out = :int1_out,
                dates_out = :dates_out,
                datea_out = :datea_out,
                datev_out = :datev_out,
                datek_out = :datek_out,
                dateg_out = :dateg_out,
                int2_out = :int2_out,
                int3_out = :int3_out,
                vard_out = :vard_out,
                vark_out = :vark_out,
                oshibka = 0
            WHERE `varh` = :varh';

                $stmt = $db->prepare($sql);
                $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1_in' => null,
                    ':dates_in' => $r['dates'], ':datea_in' => null, ':datev_in' => null, ':datek_in' => null, ':dateg_in' => null,
                    ':int2_in' => null, ':int3_in' => null, ':vard_in' => null, ':vark_in' => null, ':int1_out' => $r['int1'],
                    ':dates_out' => $r['dates'], ':datea_out' => $r['datea'], ':datev_out' => $r['datev'], ':datek_out' => $r['datek'], ':dateg_out' => $r['dateg'],
                    ':int2_out' => $r['int2'], ':int3_out' => $r['int3'], ':vard_out' => $r['vard'], ':vark_out' =>  $r['vark']));

            } else {

                // insert date1date2, oshibka = 1 out
                $sql = 'INSERT INTO ' . DATE1DATE2 . ' 
            (varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka)
            VALUES
            (:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
            :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, 1)';

                $stmt = $db->prepare($sql);

                $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1_in' => null,
                    ':dates_in' => $r['dates'], ':datea_in' => null, ':datev_in' => null, ':datek_in' => null, ':dateg_in' => null,
                    ':int2_in' => null, ':int3_in' => null, ':vard_in' => null, ':vark_in' => null, ':int1_out' => $r['int1'],
                    ':dates_out' => $r['dates'], ':datea_out' => $r['datea'], ':datev_out' => $r['datev'], ':datek_out' => $r['datek'], ':dateg_out' => $r['dateg'],
                    ':int2_out' => $r['int2'], ':int3_out' => $r['int3'], ':vard_out' => $r['vard'], ':vark_out' =>  $r['vark']));
            }

        } else {
            // insert date1date2, oshibka = 0 (DONE)
            $sql = 'INSERT INTO ' . DATE1DATE2 . ' 
            (varh, varf, varl, dateb, int1_in, dates_in, datea_in, datev_in, datek_in, dateg_in, int2_in, int3_in, vard_in, vark_in, int1_out, dates_out, 
            datea_out, datev_out, datek_out, dateg_out, int2_out, int3_out, vard_out, vark_out, oshibka)
            VALUES
            (:varh, :varf, :varl, :dateb, :int1_in, :dates_in, :datea_in, :datev_in, :datek_in, :dateg_in, :int2_in, :int3_in, :vard_in, :vark_in, :int1_out, :dates_out,
            :datea_out, :datev_out, :datek_out, :dateg_out, :int2_out, :int3_out, :vard_out, :vark_out, 0)';

            $stmt = $db->prepare($sql);

            $stmt->execute(array(':varh' => $r['varh'], ':varf' => $r['varf'], ':varl' => $r['varl'], ':dateb' => $r['dateb'], ':int1_in' => null,
                ':dates_in' => null, ':datea_in' => null, ':datev_in' => null, ':datek_in' => null, ':dateg_in' => null,
                ':int2_in' => null, ':int3_in' => null, ':vard_in' => null, ':vark_in' => null, ':int1_out' => $r['int1'],
                ':dates_out' => $r['dates'], ':datea_out' => $r['datea'], ':datev_out' => $r['datev'], ':datek_out' => $r['datek'], ':dateg_out' => $r['dateg'],
                ':int2_out' => $r['int2'], ':int3_out' => $r['int3'], ':vard_out' => $r['vard'], ':vark_out' => $r['vark']));
        }
    }
}


function rightAlgorithmForCurrentRow($r, $db)
{
    $stmt = $db->prepare('SELECT * FROM ' . VARHVARD . ' WHERE varh = :varh and vard = :vard');
    $stmt->bindParam(':varh', $r['varh'], PDO::PARAM_STR);
    $stmt->bindParam(':vard', $r['vard'], PDO::PARAM_STR);

    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    unset ($stmt);

    if (isset($rows['int3']) && $rows['int3'] != $r['int3']) {

        $stmt = $db->prepare('INSERT INTO ' . VARHVARD . ' (vard, `int2`, `int3`) VALUES (:vard, :int2, :int3)');

        $stmt->execute(array(':vard' => $r['vard'], ':int2' => $r['int2'], ':int3' => $r['int3']));

        return true;

    } else {
        return false;
    }
}

function _log($var, $string = null){
    if ($var) {
        $result = $var;
        if (is_array($var) || is_object($var)) {
            $result = print_r($var, 1);
        }
        $result .= $string ."\n";

        $log_file_name = $_SERVER['DOCUMENT_ROOT'] . "/log/log.txt";
        $now = date("Y-m-d H:i:s");
        file_put_contents($log_file_name, $now . " " . $result . "\r\n", FILE_APPEND);
        @error_log($now . $result, 3, $log_file_name);
        return true;
    }
    return false;
}