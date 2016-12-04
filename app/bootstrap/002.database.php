<?php

// 데이터베이스
$db = new medoo([
    'database_type' => 'mysql',
    'server' => $config['db_address'],
    'username' => $config['db_user'],
    'password' => $config['db_password'],
    'database_name' => $config['db_name'],
    'charset' => 'utf8',
    'port' => $config['db_port'],
    'prefix' => $config['db_prefix']
]);