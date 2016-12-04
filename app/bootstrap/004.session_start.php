<?php

// 세션 설정
ini_set('session.use_trans_sid', 0);
ini_set('url_rewriter.tags', '');
ini_set('session.cache_expire', 60);
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
ini_set('session.name', 'KHU');

// 세션 시작
new Session($db);