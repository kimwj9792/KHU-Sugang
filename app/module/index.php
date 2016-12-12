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
            unset($_SESSION['combination']);
            unset($_SESSION['op1']);
            unset($_SESSION['op2']);
            header('Location: /#jungong');
            exit;
            break;
        case 'jungong':
            if ($_POST['jungong'] == "") {
                alert2('전공을 제대로 선택해주세요.', '/');
            }
            $_SESSION['jungong'] = $_POST['jungong'];
            unset($_SESSION['lecture']);
            unset($_SESSION['combination']);
            unset($_SESSION['op1']);
            unset($_SESSION['op2']);
            header('Location: /#lecture');
            exit;
            break;
        case 'lecture':
            if ($_POST['lecture'] == "") {
                alert2('강의를 제대로 선택해주세요.', '/');
            }
            $_SESSION['lecture'] = $_POST['lecture'];
            unset($_SESSION['combination']);
            unset($_SESSION['op1']);
            unset($_SESSION['op2']);
            header('Location: /#combination');
            exit;
            break;
        case 'combination':
            if ($_POST['combination'] == "") {
                alert2('강의를 제대로 선택해주세요.', '/');
            }
            $_SESSION['combination'] = $_POST['combination'];
            $_SESSION['op1'] = $_POST['op1'];
            $_SESSION['op2'] = $_POST['op2'];
            header('Location: /#result');
            exit;
            break;
        default:

    }
}
include_once '../app/view/main.php';