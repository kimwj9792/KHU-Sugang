<?php

// 로그인 확인
$is_login = false;
if (isset($_SESSION['member_idx'])) {
    $is_login = true;
}