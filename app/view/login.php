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
    <link rel="stylesheet" href="/assets/css/login.min.css">
    <link rel="stylesheet" href="/assets/css/login-responsive.min.css">
    <link rel="stylesheet" href="/assets/css/theme.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
</head>
<body class="pace-top bg-white">
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<div id="page-container" class="fade">
    <div class="login login-with-news-feed">
        <div class="news-feed">
            <div class="news-image">
                <img src="/assets/img/khu-bg.jpg" data-id="login-cover-image">
            </div>
            <div class="news-caption">
                <h4 class="caption-title"><i class="fa fa-diamond text-success"></i> KHU수강에 오신 것을 환영합니다</h4>
                <p>
                    본 서비스는 개설 강의 목록과 강의평을 일일이 찾아보는 것에 불편함을 느껴 개발되었습니다.
                </p>
            </div>
        </div>
        <div class="right-content">
            <div class="login-header">
                <div class="brand">
                    <img src="/assets/img/logo.png" style="float:left;margin-right:10px;margin-top:5px;"> KHU수강
                    <small>경희대학교 학부생 수강신청 도우미</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <div class="login-content">
                <form class="margin-bottom-0" method="POST" action="/login">
                    <div class="form-group m-b-15">
                        <input type="text" name="id" class="form-control input-lg" maxlength="10" placeholder="아이디" autofocus required>
                    </div>
                    <div class="form-group m-b-15">
                        <input type="password" name="pw" class="form-control input-lg" maxlength="20" placeholder="비밀번호" required>
                    </div>
                    <div class="checkbox m-b-30">
                        <label>
                            <input type="checkbox" name="ok" value="ok" required> 종합정보시스템의 수강내역목록 접근에 동의합니다.
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">로그인</button>
                    </div>
                    <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                        종합정보시스템 계정으로 로그인이 가능합니다.
                    </div>
                    <hr>
                    <p class="text-center">
                        경희대학교 학부생 수강신청 도우미
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script src="assets/js/login.min.js"></script>
<script>$(document).ready(function(){App.init();});
</script>
</body>
</html>