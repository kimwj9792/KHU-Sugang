<?php
include_once '/home/sugang.khunet.net/app/config.php';
include_once '/home/sugang.khunet.net/app/bootstrap/001.medoo.php';
include_once '/home/sugang.khunet.net/app/bootstrap/002.database.php';
$year = "2017"; // Edit Here
$term = "10"; // Edit Here
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://163.180.96.142/html/js/top/top_".$year.$term."_kor.js");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36"
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = iconv("euc-kr", "utf-8", curl_exec($ch));
curl_close($ch);
$temp1 = explode('"H","', $result);
for ($j=1; $j<count($temp1)-2; $j++) {
    $temp2 = explode('"', $temp1[$j]);
    $jungong = $temp2[4];
    $jungong_code = $temp2[2];
    $campus_code = substr($jungong_code, 0, 3);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://163.180.96.142/servlets/timetable?attribute=timetable_kor&lecture_cd=&lang=kor&search_div=T");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36",
        "Content-Type: application/x-www-form-urlencoded"
    ));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "p_year=".$year."&p_term=".$term."&p_daehak=".$campus_code."&p_major=".$jungong_code."&p_subjt=&p_day=%25&p_time=%25&p_teach=&p_lang=%25&p_code=");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result2 = iconv("euc-kr", "utf-8", curl_exec($ch));
    curl_close($ch);
    $temp3 = explode("<td>", $result2);
    for ($i=0; $i<(count($temp3)-1)/11; $i++) {
        $temp4 = explode('</td>', $temp3[$i*11+1]);
        $haksu = $temp4[0];
        $haksu_s = explode('-', $haksu);
        $haksu_1 = preg_replace("/[^A-Za-z]*/s", "", $haksu_s[0]);
        $haksu_t = str_replace($haksu_1, "", $haksu_s[0]);
        $haksu_2 = substr($haksu_t, 0, 1);
        $haksu_3 = substr($haksu_t, 1, strlen($haksu_t)-1);
        $haksu_4 = $haksu_s[1];
        $temp4 = explode('</td>', $temp3[$i*11+2]);
        $lecture = $temp4[0];
        $temp4 = explode('</td>', $temp3[$i*11+5]);
        $professor = $temp4[0];
        $temp4 = explode('</td>', $temp3[$i*11+6]);
        $hakjum = trim($temp4[0]);
        $temp4 = explode('</td>', $temp3[$i*11+7]);
        $timetable = $temp4[0];
        $temp4 = explode('</td>', $temp3[$i*11+8]);
        $type = $temp4[0];
        $temp4 = explode('</td>', $temp3[$i*11+9]);
        $language = trim($temp4[0]);
        $temp4 = explode('</td>', $temp3[$i*11+10]);
        $special = trim($temp4[0]);
        $temp4 = explode('syllabusResult(', $temp3[$i*11+11]);
        $temp5 = explode("'", $temp4[1]);
        $professor_code = $temp5[5];
        $lecture_code = $temp5[9];
        $is_already = $db->count('sugang',[
            'AND' => [
                'year' => $year,
                'term' => $term,
                'haksu_1' => $haksu_1,
                'haksu_2' => $haksu_2,
                'haksu_3' => $haksu_3,
                'haksu_4' => $haksu_4,
                'jungong_code' => $jungong_code,
                'lecture_code' => $lecture_code
            ]
        ]);
        if ($is_already == 0) {
            $db->insert('sugang',[
                'year' => $year,
                'term' => $term,
                'haksu_1' => $haksu_1,
                'haksu_2' => $haksu_2,
                'haksu_3' => $haksu_3,
                'haksu_4' => $haksu_4,
                'jungong' => $jungong,
                'jungong_code' => $jungong_code,
                'lecture' => $lecture,
                'lecture_code' => $lecture_code,
                'professor' => $professor,
                'professor_code' => $professor_code,
                'hakjum' => $hakjum,
                'type' => $type,
                'timetable' => $timetable,
                'language' => $language,
                'special' => $special
            ]);
        } else {
            $db->update('sugang',[
                'year' => $year,
                'term' => $term,
                'haksu_1' => $haksu_1,
                'haksu_2' => $haksu_2,
                'haksu_3' => $haksu_3,
                'haksu_4' => $haksu_4,
                'jungong' => $jungong,
                'jungong_code' => $jungong_code,
                'lecture' => $lecture,
                'lecture_code' => $lecture_code,
                'professor' => $professor,
                'professor_code' => $professor_code,
                'hakjum' => $hakjum,
                'type' => $type,
                'timetable' => $timetable,
                'language' => $language,
                'special' => $special
            ],[
                'AND' => [
                    'year' => $year,
                    'term' => $term,
                    'haksu_1' => $haksu_1,
                    'haksu_2' => $haksu_2,
                    'haksu_3' => $haksu_3,
                    'haksu_4' => $haksu_4,
                    'jungong_code' => $jungong_code,
                    'lecture_code' => $lecture_code
                ]
            ]);
        }
    }
}