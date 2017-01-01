<?php
if (is_post()) {
    switch ($_POST['type']) {
        case 'term':
            if ($_POST['term'] == "") {
                alert('학기를 제대로 선택해주세요.');
            }
            $_SESSION['term'] = $_POST['term'];
            unset($_SESSION['jungong']);
            unset($_SESSION['lecture']);
            unset($_SESSION['combination']);
            unset($_SESSION['op1']);
            unset($_SESSION['op2']);
            unset($_SESSION['timetable']);
            unset($_SESSION['timetable_max']);
            unset($_SESSION['timetable_now']);
            header('Location: /#jungong');
            exit;
            break;
        case 'jungong':
            if ($_POST['jungong'] == "") {
                alert('전공을 제대로 선택해주세요.');
            }
            $_SESSION['jungong'] = $_POST['jungong'];
            unset($_SESSION['lecture']);
            unset($_SESSION['combination']);
            unset($_SESSION['op1']);
            unset($_SESSION['op2']);
            unset($_SESSION['timetable']);
            unset($_SESSION['timetable_max']);
            unset($_SESSION['timetable_now']);
            header('Location: /#lecture');
            exit;
            break;
        case 'lecture':
            if ($_POST['lecture'] == "") {
                alert('강의를 제대로 선택해주세요.');
            }
            $_SESSION['lecture'] = $_POST['lecture'];
            unset($_SESSION['combination']);
            unset($_SESSION['op1']);
            unset($_SESSION['op2']);
            unset($_SESSION['timetable']);
            unset($_SESSION['timetable_max']);
            unset($_SESSION['timetable_now']);
            header('Location: /#combination');
            exit;
            break;
        case 'combination':
            if ($_POST['combination'] == "") {
                alert('강의를 제대로 선택해주세요.');
            }
            $_SESSION['combination'] = $_POST['combination'];
            $_SESSION['op1'] = $_POST['op1'];
            $_SESSION['op2'] = $_POST['op2'];
            unset($_SESSION['timetable']);
            unset($_SESSION['timetable_max']);
            unset($_SESSION['timetable_now']);
            header('Location: /make');
            exit;
            break;
        case 'save':
            $db->update('member',[
                'save' => json_encode($_SESSION)
            ],[
                'idx' => $_SESSION['member_idx']
            ]);
            header('Location: /#result');
            break;
        case 'contact':
            if ($_POST['name'] == "") {
                alert('이름을 제대로 입력해주세요.');
            }
            if ($_POST['email'] == "") {
                alert('이메일을 제대로 입력해주세요.');
            }
            if ($_POST['msg'] == "") {
                alert('내용을 제대로 입력해주세요.');
            }
            $db->insert('contact',[
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'msg' => $_POST['msg'],
                'regdate' => $now
            ]);
            alert('문의사항이 성공적으로 등록되었습니다.');
            break;
        default:

    }
}
include_once '../app/view/main.php';