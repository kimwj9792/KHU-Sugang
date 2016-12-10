<!DOCTYPE html>
<!--[if IE 8]><html lang="ko" class="ie8"><![endif]-->
<!--[if !IE]><!--><html lang="ko"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>KHU수강</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="/assets/css/style-responsive.min.css">
    <link rel="stylesheet" href="/assets/css/theme.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
</head>
<body data-spy="scroll" data-target="#header-navbar" data-offset="51">
<div id="page-container" class="fade">
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand">
                    <img src="/assets/img/logo.png" style="float:left;margin-right:10px;margin-top:-5px;">
                    <span class="brand-text">
                        KHU수강
                    </span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home" data-click="scroll-to-target">홈</a></li>
                    <li><a href="#term" data-click="scroll-to-target">학기</a></li>
                    <li><a href="#jungong" data-click="scroll-to-target">전공</a></li>
                    <li><a href="#lecture" data-click="scroll-to-target">강좌</a></li>
                    <li><a href="#work" data-click="scroll-to-target">WORK</a></li>
                    <li><a href="#contact" data-click="scroll-to-target">문의</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="home" class="content has-bg home">
        <div class="content-bg">
            <img src="/assets/img/khu-bg.jpg">
        </div>
        <div class="container home-content">
            <h1>KHU수강에 오신 것을 환영합니다</h1>
            <h3>경희대학교 학부생 수강신청 도우미</h3>
            <p>
                본 서비스는 개설 강좌 목록과 강의평을 일일이 찾아보는 것에 불편함을 느껴 개발되었습니다.<br>
                원하는 조건에 맞는 최적의 시간표를 자동으로 구성해드립니다.<br>
                (Database based on 2016.12.10.)
            </p>
            <?php
            if ($is_login == false) {
                ?>
                <a href="/login" class="btn btn-theme">종정시 로그인</a>
                <?php
            } else {
                ?>
                <a href="/logout" class="btn btn-theme">로그아웃</a>
                <?php
            }
            ?>
        </div>
    </div>
    <div id="term" class="content" data-scrollview="true">
        <div class="container" data-animation="true" data-animation-type="fadeInDown">
            <h2 class="content-title">학기선택</h2>
            <p class="content-desc" style="margin-bottom:30px;">
                수강신청하려는 학기를 선택해주세요.
            </p>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form class="form-horizontal" method="POST" action="/">
                        <div class="form-group" style="text-align:center;">
                            <div class="col-md-12" style="text-align:center;">
                                <select class="form-control" name="term">
                                    <option value="">== 선택 ==</option>
                                    <?php
                                    $data = $db->query("SELECT `year`,`term` FROM `sugang` GROUP BY `year`, `term`")->fetchAll();
                                    for ($i=0; $i<count($data); $i++) {
                                        $year = $data[$i]['year'];
                                        $term = $data[$i]['term'];
                                        switch ($term) {
                                            case '10':
                                                $term_s = "1";
                                                break;
                                            case '15':
                                                $term_s = "여름";
                                                break;
                                            case '20':
                                                $term_s = "2";
                                                break;
                                            case '25':
                                                $term_s = "겨울";
                                                break;
                                        }
                                        ?>
                                        <option value="<?=$year.$term?>" <?=($_SESSION['term']==$year.$term)?'selected':''?>><?=$year?>년 <?=$term_s?>학기</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="term">
                        <div class="form-group">
                            <div class="col-md-12" style="text-align:center;">
                                <button type="submit" class="btn btn-theme btn-block">학기선택</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="content bg-black-darker has-bg" data-scrollview="true">
        <div class="content-bg">
            <img src="/assets/img/quote-bg.jpg">
        </div>
        <div class="container" data-animation="true" data-animation-type="fadeInLeft">
            <div class="row">
                <div class="col-md-12 quote">
                    <i class="fa fa-quote-left"></i>
                    성공적인 수강신청을 응원합니다!
                    <i class="fa fa-quote-right"></i>
                    <small>KHU수강 개발자 일동, 2016.12.05.</small>
                </div>
            </div>
        </div>
    </div>
    <div id="jungong" class="content" data-scrollview="true">
        <div class="container">
            <h2 class="content-title">전공선택</h2>
            <p class="content-desc" style="margin-bottom:30px;">
                본인에게 해당하는 미수강한 전공 및 학부를 모두 선택해주세요.<br>
                PC에서는 Ctrl 혹은 ⌘키로 다중 선택이 가능합니다.
            </p>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form class="form-horizontal" method="POST" action="/">
                        <div class="form-group" style="text-align:center;">
                            <div class="col-md-12" style="text-align:center;">
                                <select class="form-control" name="jungong[]" size="15" multiple <?=(!isset($_SESSION['term']))?' disabled':''?>>
                                    <?php
                                    if (!isset($_SESSION['term'])) {
                                        ?><option value="">학기를 먼저 선택해주세요.</option><?php
                                    } else {
                                        $data = $db->query("SELECT `jungong` , `jungong_code` FROM `sugang` WHERE `year` = '".substr($_SESSION['term'], 0, 4)."' AND `term` = '".substr($_SESSION['term'], 4, 2)."' GROUP BY `jungong_code` ORDER BY `sugang`.`jungong_code` ASC")->fetchAll();
                                        for ($i=0; $i<count($data); $i++) {
                                            ?>
                                            <option value="<?=$data[$i]['jungong_code']?>" <?=(in_array($data[$i]['jungong_code'], $_SESSION['jungong']))?'selected':''?>><?=(substr($data[$i]['jungong_code'], 0, 3)=='121')?'[서울]':'[국제]'?> <?=$data[$i]['jungong']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="jungong">
                        <div class="form-group">
                            <div class="col-md-12" style="text-align:center;">
                                <button type="submit" class="btn btn-theme btn-block" <?=(!isset($_SESSION['term']))?' disabled':''?>>전공선택</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="content bg-black-darker has-bg" data-scrollview="true">
        <div class="content-bg">
            <img src="/assets/img/quote-bg.jpg">
        </div>
        <div class="container" data-animation="true" data-animation-type="fadeInLeft">
            <div class="row">
                <div class="col-md-12 quote">
                    <i class="fa fa-quote-left"></i>
                    꿀강의는 신청할 수도 있고 못할 수도 있습니다.
                    <i class="fa fa-quote-right"></i>
                    <small>KHU수강 개발자 일동, 2016.12.10.</small>
                </div>
            </div>
        </div>
    </div>
    <div id="lecture" class="content" data-scrollview="true">
        <div class="container">
            <h2 class="content-title">강좌선택</h2>
            <p class="content-desc" style="margin-bottom:30px;">
                로그인을 하시면 이미 수강한 과목이 자동으로 필터링됩니다.<br>
                수강허용학점, 선수과목 등 학사 규정을 고려하여 선택해주시기 바랍니다.<br>
                <a href="http://sugang.khu.ac.kr/" target="_blank">[수강신청 홈페이지]</a>
            </p>
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" method="POST" action="/">
                        <div class="form-group" style="text-align:center;">
                            <div class="col-md-12" style="text-align:left;">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php
                                    for ($i=0; $i<count($_SESSION['jungong']); $i++) {
                                        $data = $db->query("SELECT `jungong`, `haksu_1`, `haksu_2`, `haksu_3`, `lecture` , `lecture_code` , `hakjum` , `type` , `special` FROM `sugang` WHERE `year` = '".substr($_SESSION['term'], 0, 4)."' AND `term` = '".substr($_SESSION['term'], 4, 2)."' AND `jungong_code` = '".addslashes($_SESSION['jungong'][$i])."' GROUP BY `lecture_code` ORDER BY `haksu_2` ASC")->fetchAll();
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="tab_h<?=$i?>">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#tab_c<?=$i?>" aria-expanded="true" aria-controls="tab_c<?=$i?>">
                                                        <?=$data[0]['jungong']?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="tab_c<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tab_h<?=$i?>">
                                                <div class="panel-body">
                                                    <ul class="list-group" style="margin-bottom:0;">
                                                        <?php
                                                        for ($j=0; $j<count($data); $j++) {
                                                            $haksu = $data[$j]['haksu_1'].$data[$j]['haksu_2'].$data[$j]['haksu_3'];
                                                            ?>
                                                            <li class="list-group-item <?=(strpos($_SESSION['member_sugang'], $haksu)!==false)?'active':''?>">
                                                                <label style="margin-bottom:0">
                                                                    <input type="checkbox" name="lecture[]" value="<?=$data[$j]['lecture_code']?>" style="vertical-align:bottom;padding:0;margin:0;margin-right:5px;position: relative;top: -2px;width:13px;height:13px;position:relative;overflow:hidden;" <?=(in_array($data[$j]['lecture_code'], $_SESSION['lecture']))?'checked':''?>><?=$data[$j]['lecture']?> (<?=$haksu?>)
                                                                    <span class="badge" style="margin-left:5px;"><?=$data[$j]['hakjum']?></span>
                                                                </label>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="lecture">
                        <div class="form-group">
                            <div class="col-md-12" style="text-align:center;">
                                <button type="submit" class="btn btn-theme btn-block" <?=(!isset($_SESSION['jungong']))?' disabled':''?>>강좌선택</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="content bg-black-darker has-bg" data-scrollview="true">
        <div class="content-bg">
            <img src="/assets/img/quote-bg.jpg">
        </div>
        <div class="container" data-animation="true" data-animation-type="fadeInLeft">
            <div class="row">
                <div class="col-md-12 quote">
                    <i class="fa fa-quote-left"></i>
                    내가 이러려고 수강신청했나 자괴감 들고 괴로워...
                    <i class="fa fa-quote-right"></i>
                    <small>익명, 2016.11.04.</small>
                </div>
            </div>
        </div>
    </div>
    <div id="work" class="content" data-scrollview="true">
        <div class="container" data-animation="true" data-animation-type="fadeInDown">
            <h2 class="content-title">Our Latest Work</h2>
        </div>
    </div>
    <div id="contact" class="content bg-silver-lighter" data-scrollview="true">
        <div class="container">
            <h2 class="content-title">문의하기</h2>
            <p class="content-desc">
                KHU수강과 관련하여 문의사항이 있을경우 아래의 양식을 작성해주세요.
            </p>
            <div class="row">
                <div class="col-md-6" data-animation="true" data-animation-type="fadeInLeft">
                    <h3>무엇을 도와드릴까요?</h3>
                    <p>
                        KHU수강과 관련하여 오류, 기능 제안, 궁금한 점, 하고 싶은 말이 있다면 양식을 작성해주세요!<br>
                        저희가 직접 확인하고 적어주신 이메일 주소로 답변해 드립니다.
                    </p>
                    <p>
                        <strong>개발 및 운영 - 컴퓨터공학과 16학번</strong><br>
                        서승완, 김선호, 김우재, 최정민
                    </p>
                </div>
                <div class="col-md-6 form-col" data-animation="true" data-animation-type="fadeInRight">
                    <form class="form-horizontal" method="POST" action="/">
                        <div class="form-group">
                            <label class="control-label col-md-3">이름 <span class="text-theme">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" maxlength="10" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">이메일 <span class="text-theme">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" maxlength="50" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">내용 <span class="text-theme">*</span></label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="10" name="msg" required></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="contact">
                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-9 text-left">
                                <button type="submit" class="btn btn-theme btn-block">문의하기</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="footer" class="footer">
        <div class="container">
            <div class="footer-brand">
                <img src="/assets/img/logo.png" style="display:block;margin:0 auto 10px;">
                KHU수강
            </div>
            <p>
                경희대학교 학부생 수강신청 도우미
            </p>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="//cdnjs.cloudflare.com/ajax/libs/scrollmonitor/1.2.0/scrollMonitor.js"></script>
<script src="/assets/js/apps.min.js"></script>
<script>$(document).ready(function(){App.init();});</script>
</body>
</html>