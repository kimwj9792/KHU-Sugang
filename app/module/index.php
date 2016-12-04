<?php

if ($is_login == false) {
    $fail_cnt = $db->count('login_fail',[
        'AND' => [
            'ipaddr' => $_SERVER['REMOTE_ADDR'],
            'regdate[>=]' => date('Y-m-d H:i:s', strtotime('-15 minutes'))
        ]
    ]);
    if ($fail_cnt >= 3) {
        include_once '../app/view/login_ban.php';
        exit;
    }
    if (is_post()) {
        if (!is_numeric($_POST['id']) || strlen($_POST['id']) != 10 || $_POST['pw'] == '') {
            alert('아이디 혹은 비밀번호를 제대로 입력해주세요.');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://khuis.khu.ac.kr/java/servlet/khu.cosy.login.loginCheckAction");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36",
            "Content-Type: application/x-www-form-urlencoded"
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "user_id=".$_POST['id']."&password=".$_POST['pw']."&RequestData=");
        curl_setopt($ch, CURLOPT_COOKIEJAR, realpath("../app/storage/cookie/")."/".$_POST['id'].".txt");
        curl_setopt($ch, CURLOPT_COOKIEFILE, realpath("../app/storage/cookie/")."/".$_POST['id'].".txt");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        if (strpos($result, '<title>') !== false) {
            $_SESSION['member_idx'] = $_POST['id'];
            header('Location: /');
        } else {
            $db->insert('login_fail',[
                'ipaddr' => $_SERVER['REMOTE_ADDR'],
                'regdate' => $now
            ]);
            alert('로그인에 실패하였습니다. 종합정보시스템을 확인해주세요.');
        }
        exit;
    }
    include_once '../app/view/login.php';
    exit;
}

/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://khuis.khu.ac.kr/java/servlet/controllerCosy?action=17&WID=hsipa2006&Pkg=JSP&URL=JSP.servlet/controllerHssj[(QUES)]action=671[(AMP)]gubun=ret");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36",
    "Content-Type: application/x-www-form-urlencoded"
));
curl_setopt($ch, CURLOPT_COOKIEJAR, realpath("../app/storage/cookie/")."/".$_SESSION['member_idx'].".txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, realpath("../app/storage/cookie/")."/".$_SESSION['member_idx'].".txt");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch);
curl_setopt($ch, CURLOPT_URL, "https://khuis.khu.ac.kr/java/servlet/controllerHssj?action=671&gubun=ret");
$result = iconv("euc-kr", "utf-8", curl_exec($ch));
curl_close($ch);

$temp1 = explode('성명 : ', $result);
$temp2 = explode("\n", $temp1[1]);
$name = $temp2[0];
$temp1 = explode('<td class="td2" align="center" rowspan="3">', $result);
$jungong_cnt = (count($temp1)-1)/4;
for ($i=0; $i<$jungong_cnt; $i++) {
    $temp2 = explode('</td>', $temp1[$i*4+2]);
    $jungong_code = $temp2[0];
    $temp2 = explode('<td class="td2" align="center" colspan="2">', $temp1[$i*4+2]);
    $temp3 = explode('</td>', $temp2[1]);
    $jungong_name = $temp3[0];
    $temp2 = explode('</td>', $temp1[$i*4+3]);
    $jungong_year = $temp2[0];
    $temp2 = explode('</td>', $temp1[$i*4+4]);
    $jungong_etc = $temp2[0];
    $temp2 = explode('<td class="td2" align="center">', $temp1[$i*4+4]);
    $temp3 = explode('</td>', $temp2[2]);
    $jungong_track1 = ($temp3[0]!='-')?$temp3[0]:'';
    $temp3 = explode('</td>', $temp2[4]);
    $jungong_track2 = ($temp3[0]!='-')?$temp3[0]:'';
}
*/

include_once '../app/view/initialize.php';