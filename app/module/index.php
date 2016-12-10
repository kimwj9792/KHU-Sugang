<?php
if (is_post()) {
    switch ($_POST['type']) {
        case 'term':
            if ($_POST['term'] == "") {
                alert2('학기를 제대로 선택해주세요.', '/');
            }
            $_SESSION['term'] = $_POST['term'];
            unset($_SESSION['jungong']);
            unset($_SESSION['lecture']);
            header('Location: /');
            exit;
            break;
        case 'jungong':
            if ($_POST['jungong'] == "") {
                alert2('전공을 제대로 선택해주세요.', '/');
            }
            $_SESSION['jungong'] = $_POST['jungong'];
            unset($_SESSION['lecture']);
            header('Location: /');
            exit;
            break;
        case 'lecture':
            if ($_POST['lecture'] == "") {
                alert2('강좌를 제대로 선택해주세요.', '/');
            }
            $_SESSION['lecture'] = $_POST['lecture'];
            header('Location: /');
            exit;
            break;
        default:

    }
}
include_once '../app/view/main.php';