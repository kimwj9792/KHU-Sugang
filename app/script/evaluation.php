<?php
include_once '/home/sugang.khunet.net/app/config.php';
include_once '/home/sugang.khunet.net/app/bootstrap/001.medoo.php';
include_once '/home/sugang.khunet.net/app/bootstrap/002.database.php';
while ($data = $db->query("SELECT `year`, `term`, `lecture_code`, `professor_code` FROM `sugang` WHERE `score` IS NULL LIMIT 0,100")->fetchAll()) {
    for ($j=0; $j<count($data); $j++) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://163.180.96.142/servlets/timetable?attribute=eval_kor&p_year=".$data[$j]['year']."&p_term=".$data[$j]['term']."&p_teach=".$data[$j]['professor_code']."&p_subjt_cd=".$data[$j]['lecture_code']."&lang=kor");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36"
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        if (strpos($result, '<font color="red">') !== false) {
            $temp = explode('<font color="red">', $result);
            $sum = 0;
            for ($k=1; $k<count($temp); $k++) {
                $temp2 = explode('</font>', $temp[$k]);
                $sum += $temp2[0];
            }
            $sum = round($sum/(count($temp)-1), 2);
            $db->update('sugang',[
                'score' => $sum
            ],[
                'AND' => [
                    'year' => $data[$j]['year'],
                    'term' => $data[$j]['term'],
                    'lecture_code' => $data[$j]['lecture_code'],
                    'professor_code' => $data[$j]['professor_code']
                ]
            ]);
        } else {
            $db->update('sugang',[
                'score' => '0.0'
            ],[
                'AND' => [
                    'year' => $data[$j]['year'],
                    'term' => $data[$j]['term'],
                    'lecture_code' => $data[$j]['lecture_code'],
                    'professor_code' => $data[$j]['professor_code']
                ]
            ]);
        }
    }
}