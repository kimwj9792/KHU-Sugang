<?php
include_once '../app/config.php';
$strRequestUriParse = ltrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$URL = explode('/', $strRequestUriParse);
foreach (glob('../app/bootstrap/*.php') as $filename) {
    include_once $filename;
}
switch ($URL[0]) {
    case '':
        include_once '../app/module/index.php';
        break;
    default:
        if (file_exists('../app/module/' . $URL[0] . '.php') && ($URL[0] != 'index')) {
            include_once '../app/module/' . $URL[0] . '.php';
        } else {
            include_once '../app/view/_404.php';
        }
}