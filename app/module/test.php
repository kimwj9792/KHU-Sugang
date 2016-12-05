<?php

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