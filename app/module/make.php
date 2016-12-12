<?php
/*
 * 시간표 생성 알고리즘 (2016-12-12)
 */
// 헤더
header('Content-Type: application/json');
// 함수
function table_gen(&$data, &$table, $table_default, $key) {
    if (count($table)==0) {
        for ($i=0; $i<count($data); $i++) {
            if ($data[$i]['lecture_code'] != $key) {
                continue;
            }
            $table[count($table)] = $table_default;
            $table[count($table)-1]['lecture'][count($table[count($table)-1]['lecture'])] = $data[$i]['idx'];
            $table[count($table)-1]['score'] += $data[$i]['score'];
            add_time($table[count($table)-1]['time'], $data[$i]['timetable']);
        }
    } else {
        $old_cnt = count($table);
        for ($i=0; $i<count($data); $i++) {
            if ($data[$i]['lecture_code'] != $key) {
                continue;
            }
            for ($j=0; $j<$old_cnt; $j++) {
                if (is_avail($table[$j]['time'], $data[$i]['timetable']) == true) {
                    $table[count($table)] = $table[$j];
                    $table[count($table)-1]['lecture'][count($table[count($table)-1]['lecture'])] = $data[$i]['idx'];
                    $table[count($table)-1]['score'] += $data[$i]['score'];
                    add_time($table[count($table)-1]['time'], $data[$i]['timetable']);
                }
            }
        }
        for ($i=0; $i<$old_cnt; $i++) {
            array_shift($table);
        }
        if (count($table) == 0) {
            exit("[]");
        }
    }
}
function add_time(&$table, $time) {
    $time = str_replace('<br>', ' ', $time);
    $temp = explode(':', $time);
    for ($i=0; $i<count($temp)-1; $i+=2) {
        $temp2 = explode(' ', $temp[$i]);
        $time_day = $temp2[count($temp2)-2];
        $time_start = $temp2[count($temp2)-1].":";
        $temp2 = explode('-', $temp[$i+1]);
        $time_start .= $temp2[0];
        $time_end = $temp2[1].":";
        $temp2 = explode(' ', $temp[$i+2]);
        $time_end .= $temp2[0];
        $table[$time_day][count($table[$time_day])] = $time_start."-".$time_end;
    }
}
function is_avail(&$table, $time) {
    $time = str_replace('<br>', ' ', $time);
    $temp = explode(':', $time);
    for ($i=0; $i<count($temp)-1; $i+=2) {
        $temp2 = explode(' ', $temp[$i]);
        $time_day = $temp2[count($temp2)-2];
        $time_start = $temp2[count($temp2)-1].":";
        $temp2 = explode('-', $temp[$i+1]);
        $time_start .= $temp2[0];
        $time_end = $temp2[1].":";
        $temp2 = explode(' ', $temp[$i+2]);
        $time_end .= $temp2[0];
        if ($time_start == "") {
            return true;
        }
        foreach ($table[$time_day] as $tmp) {
            $temp2 = explode('-', $tmp);
            if ((strtotime($temp2[0])<=strtotime($time_end))&&(strtotime($temp2[1])>=strtotime($time_start))) {
                return false;
            }
        }
    }
    return true;
}
function cmp($a, $b) {
    if ($a['score'] == $b['score']) {
        return 0;
    }
    return ($a['score'] > $b['score']) ? -1 : 1;
}
// 조합할 데이터 세트
$timetable_set = [];
$timetable_default = ['lecture'=>[],'time'=>['월'=>[],'화'=>[],'수'=>[],'목'=>[],'금'=>[],'토'=>[],''=>[]],'score'=>0];
$lecture_set = [];
$lecture_set_cnt = [];
$lecture_set_checksum = [];
// 유저가 담은 모든 과목을 가져오기
$data = $db->select('sugang',[
    'idx',
    'lecture_code',
    'timetable',
    'score'
],[
    'idx' => $_SESSION['combination'],
    'ORDER' => [
        'score' => 'DESC'
    ]
]);
// 수업,건물,시간,과목이 같은 강의 필터링
foreach ($data as $data_s) {
    $checksum = md5(preg_replace("/[B0-9-]+\)/", ")", $data_s['timetable']).$data_s['lecture_code']);
    if (!in_array($checksum, $lecture_set_checksum)) {
        $lecture_set_checksum[count($lecture_set_checksum)] = $checksum;
        $lecture_set[count($lecture_set)] = $data_s;
        if (isset($lecture_set_cnt[$data_s['lecture_code']])) {
            $lecture_set_cnt[$data_s['lecture_code']]++;
        } else {
            $lecture_set_cnt[$data_s['lecture_code']] = 1;
        }
    }
}
$data = null;
asort($lecture_set_cnt);
// 강의 별로 알고리즘 수행
foreach ($lecture_set_cnt as $lecture_code => $cnt) {
    table_gen($lecture_set, $timetable_set, $timetable_default, $lecture_code);
}
// 조건 검사
foreach ($timetable_set as $key => $val) {
    if ($_SESSION['op1'] == "3") {
        if (strpos(json_encode($val), '"09:00-') !== false) {
            unset($timetable_set[$key]);
        }
    } elseif ($_SESSION['op1'] == "2") {
        $timetable_set[$key]['score'] -= substr_count(json_encode($val), '"09:00-')*30;
    }
    if ($_SESSION['op2'] == "2") {
        if (count($timetable_set[$key]['time']['금']) != 0) {
            unset($timetable_set[$key]);
        }
    } elseif ($_SESSION['op2'] == "3") {
        if (count($timetable_set[$key]['time']['월']) != 0) {
            unset($timetable_set[$key]);
        }
    } elseif ($_SESSION['op2']>=4 && $_SESSION['op2']<=6) {
        $g_cnt = 0;
        if (count($timetable_set[$key]['time']['월']) == 0) {$g_cnt++;}
        if (count($timetable_set[$key]['time']['화']) == 0) {$g_cnt++;}
        if (count($timetable_set[$key]['time']['수']) == 0) {$g_cnt++;}
        if (count($timetable_set[$key]['time']['목']) == 0) {$g_cnt++;}
        if (count($timetable_set[$key]['time']['금']) == 0) {$g_cnt++;}
        if ($g_cnt != $_SESSION['op2']-2) {
            unset($timetable_set[$key]);
        }
    }
}
// 출력
usort($timetable_set, 'cmp');
echo json_encode($timetable_set);