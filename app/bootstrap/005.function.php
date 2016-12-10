<?php

// alert 후 종료
function alert($msg)
{
    ?><meta charset="utf-8"><script type="text/javascript">alert("<?=$msg?>");history.go(-1);</script><?php
    exit;
}

// alert 후 페이지 이동
function alert2($msg, $redirect)
{
    ?><meta charset="utf-8"><script type="text/javascript">alert("<?=$msg?>");location.replace("<?=$redirect?>");</script><?php
    exit;
}

// 페이지 이동
function location_replace($redirect)
{
    ?><meta charset="utf-8"><script type="text/javascript">location.replace("<?=$redirect?>");</script><?php
    exit;
}

// POST 여부 확인
function is_post()
{
    if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
        return true;
    } else {
        return false;
    }
}