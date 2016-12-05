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
                    <li><a href="#service" data-click="scroll-to-target">SERVICES</a></li>
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
                원하는 조건에 맞는 최적의 시간표를 자동으로 구성해주며 수강 신청에 실패했을 경우 대안도 마련해드립니다.
            </p>
            <a href="/login" class="btn btn-theme">종정시 로그인</a>
        </div>
    </div>
    <div id="term" class="content" data-scrollview="true">
        <div class="container" data-animation="true" data-animation-type="fadeInDown">
            <h2 class="content-title">학기선택</h2>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form class="form-horizontal" method="POST" action="/">
                        <div class="form-group" style="text-align:center;">
                            <div class="col-md-12" style="text-align:center;">
                                <select class="form-control" name="term">
                                    <option value="">== 선택 ==</option>
                                    <option value="201610">2016년 1학기</option>
                                    <option value="201620">2016년 2학기</option>
                                    <option value="201615">2016년 여름학기</option>
                                    <option value="201625">2016년 겨울학기</option>
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
                다전공, 부전공을 포함하여 본인에게 해당하는 전공을 모두 선택해주세요.<br>
                PC에서는 Ctrl 혹은 ⌘키로 다중 선택이 가능합니다.
            </p>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form class="form-horizontal" method="POST" action="/">
                        <div class="form-group" style="text-align:center;">
                            <div class="col-md-12" style="text-align:center;">
                                <select class="form-control" name="jungong" size="10" multiple>
                                    <option value="1210208">법과대학 법학부 법학부</option>
                                    <option value="121030401">정경대학 경제학과 경제학</option>
                                    <option value="121031101">정경대학 무역학과 무역학</option>
                                    <option value="121032501">정경대학 정치외교학과 정치외교학</option>
                                    <option value="121032901">정경대학 행정학과 행정학</option>
                                    <option value="121034301">정경대학 사회학과 사회학</option>
                                    <option value="121034403">정경대학 언론정보학과 언론정보학</option>
                                    <option value="121034501">정경대학 국제통상·금융투자학과 국제통상·금융투자학</option>
                                    <option value="121060201">생활과학대학 식품영양학과 식품영양학</option>
                                    <option value="121060401">생활과학대학 의상학과 의상학</option>
                                    <option value="121060501">생활과학대학 아동가족학과 아동가족학</option>
                                    <option value="121060601">생활과학대학 주거환경학과 주거환경학</option>
                                    <option value="1210708">의과대학 의예과 의예과</option>
                                    <option value="121080401">한의과대학 한의학과 한의학전공</option>
                                    <option value="121080601">한의과대학 한의예과 한의예</option>
                                    <option value="121090501">치과대학 치의예과 치의예전공</option>
                                    <option value="121100601">약학대학 한약학과 한약학</option>
                                    <option value="121100701">약학대학 약과학과 약과학</option>
                                    <option value="121100801">약학대학 약학과(2+4년제) 약학전공</option>
                                    <option value="121110601">음악대학 기악과 기악</option>
                                    <option value="121110701">음악대학 성악과 성악</option>
                                    <option value="121111001">음악대학 작곡과 작곡</option>
                                    <option value="121130212">호텔관광대학 관광학부 문화관광콘텐츠학과</option>
                                    <option value="121130214">호텔관광대학 관광학부 관광학과</option>
                                    <option value="121131601">호텔관광대학 Hospitality경영학부 호텔경영학과</option>
                                    <option value="121131602">호텔관광대학 Hospitality경영학부 컨벤션경영학과</option>
                                    <option value="121131603">호텔관광대학 Hospitality경영학부 외식경영학과</option>
                                    <option value="121131604">호텔관광대학 Hospitality경영학부 조리·서비스경영학과</option>
                                    <option value="121131701">호텔관광대학 문화관광산업학과 문화관광산업학</option>
                                    <option value="121131801">호텔관광대학 조리산업학과 조리산업학</option>
                                    <option value="1214803">자율전공학과 자율전공학과 자율전공학과</option>
                                    <option value="121560101">문과대학 국어국문학과 국어국문학</option>
                                    <option value="121560201">문과대학 사학과 사학</option>
                                    <option value="121560301">문과대학 철학과 철학</option>
                                    <option value="121560403">문과대학 영어학부 통·번역학</option>
                                    <option value="121560404">문과대학 영어학부 영어학</option>
                                    <option value="121560405">문과대학 영어학부 영문학</option>
                                    <option value="121570103">경영대학 경영학부 의료경영학</option>
                                    <option value="121570401">경영대학 회계ㆍ세무학과 회계ㆍ세무학</option>
                                    <option value="121570501">경영대학 경영학과 경영학</option>
                                    <option value="121580201">이과대학 지리학과 지리학</option>
                                    <option value="121580401">이과대학 정보디스플레이학과 정보디스플레이학</option>
                                    <option value="121580601">이과대학 수학과 수학</option>
                                    <option value="121580701">이과대학 물리학과 물리학</option>
                                    <option value="121580801">이과대학 화학과 화학</option>
                                    <option value="121580901">이과대학 생물학과 생물학</option>
                                    <option value="121590301">간호과학대학 간호학과 간호학</option>
                                    <option value="121590401">간호과학대학 간호학과(야) 간호학전공</option>
                                    <option value="121600101">미술대학 미술학부 한국화</option>
                                    <option value="121600102">미술대학 미술학부 회화</option>
                                    <option value="121600103">미술대학 미술학부 조소</option>
                                    <option value="121620101">무용학부 무용학부 한국무용</option>
                                    <option value="121620102">무용학부 무용학부 현대무용</option>
                                    <option value="121620103">무용학부 무용학부 발레</option>
                                    <option value="2215128">외국어대학 프랑스어학과 프랑스어학과</option>
                                    <option value="2215129">외국어대학 스페인어학과 스페인어학과</option>
                                    <option value="221513001">외국어대학 러시아어학과 러시아어학</option>
                                    <option value="2215131">외국어대학 중국어학과 중국어학과</option>
                                    <option value="2215132">외국어대학 일본어학과 일본어학과</option>
                                    <option value="221513301">외국어대학 한국어학과 한국어학</option>
                                    <option value="2215134">외국어대학 글로벌커뮤니케이션학부 글로벌커뮤니케이션학부</option>
                                    <option value="221513401">외국어대학 글로벌커뮤니케이션학부 영미어문</option>
                                    <option value="221513402">외국어대학 글로벌커뮤니케이션학부 영미문화</option>
                                    <option value="2215401">공과대학 건축공학과 건축공학과</option>
                                    <option value="2215407">공과대학 기계공학과 기계공학과</option>
                                    <option value="2215414">공과대학 원자력공학과 원자력공학과</option>
                                    <option value="2215427">공과대학 사회기반시스템공학과 사회기반시스템공학과</option>
                                    <option value="2215428">공과대학 화학공학과 화학공학과</option>
                                    <option value="2215433">공과대학 건축학과 건축학과</option>
                                    <option value="2215434">공과대학 산업경영공학과 산업경영공학과</option>
                                    <option value="2215435">공과대학 정보전자신소재공학과 정보전자신소재공학과</option>
                                    <option value="2215436">공과대학 환경학및환경공학과 환경학및환경공학과</option>
                                    <option value="221670201">전자정보대학 전자정보학부 전자공학전공</option>
                                    <option value="221670701">전자정보대학 전자·전파공학과 전자·전파공학</option>
                                    <option value="221670801">전자정보대학 컴퓨터공학과 컴퓨터공학</option>
                                    <option value="221670901">전자정보대학 생체의공학과 생체의공학</option>
                                    <option value="221700301">생명과학대학 유전공학과 유전공학</option>
                                    <option value="221700601">생명과학대학 식물·환경신소재공학과 식물·환경신소재공학</option>
                                    <option value="221700701">생명과학대학 원예생명공학과 원예생명공학</option>
                                    <option value="221700801">생명과학대학 식품생명공학과 식품생명공학</option>
                                    <option value="221700901">생명과학대학 한방재료공학과 한방재료공학</option>
                                    <option value="221720101">국제·경영대학 국제경영학부 국제경영전공</option>
                                    <option value="221720102">국제·경영대학 국제경영학부 기업회계·세무전공</option>
                                    <option value="221730601">예술·디자인대학 도예학과 도예학</option>
                                    <option value="221731301">예술·디자인대학 Post Modern음악학과 Post Modern음악학</option>
                                    <option value="221731401">예술·디자인대학 연극영화학과 연극영화학</option>
                                    <option value="221731501">예술·디자인대학 산업디자인학과 산업디자인학</option>
                                    <option value="221731701">예술·디자인대학 환경조경디자인학과 환경조경디자인학</option>
                                    <option value="221731801">예술·디자인대학 의류디자인학과 의류디자인학</option>
                                    <option value="221731901">예술·디자인대학 디지털콘텐츠학과 디지털콘텐츠학</option>
                                    <option value="221732001">예술·디자인대학 시각디자인학과 시각디자인학</option>
                                    <option value="221740501">체육대학 태권도학과 태권도학</option>
                                    <option value="221741001">체육대학 체육학과 체육학</option>
                                    <option value="221741101">체육대학 스포츠의학과 스포츠의학</option>
                                    <option value="221741301">체육대학 스포츠지도학과 스포츠지도학</option>
                                    <option value="221741401">체육대학 골프산업학과 골프산업학</option>
                                    <option value="221760301">응용과학대학 응용수학과 응용수학</option>
                                    <option value="221760401">응용과학대학 응용물리학과 응용물리학</option>
                                    <option value="221760501">응용과학대학 응용화학과 응용화학</option>
                                    <option value="221760601">응용과학대학 우주과학과 우주과학</option>
                                    <option value="221770101">국제대학 국제학과 국제학</option>
                                    <option value="2217801">동서의과학과 동서의과학과 동서의과학과</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="text-align:center;">
                            <div class="col-md-12" style="text-align:center;">
                                <select class="form-control" name="campus">
                                    <option value="">== 주전공 캠퍼스 ==</option>
                                    <option value="1">서울</option>
                                    <option value="2">국제</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="jungong">
                        <div class="form-group">
                            <div class="col-md-12" style="text-align:center;">
                                <button type="submit" class="btn btn-theme btn-block">전공선택</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="quote" class="content bg-black-darker has-bg" data-scrollview="true">
        <!-- begin content-bg -->
        <div class="content-bg">
            <img src="assets/img/quote-bg.jpg" alt="Quote" />
        </div>
        <!-- end content-bg -->
        <!-- begin container -->
        <div class="container" data-animation="true" data-animation-type="fadeInLeft">
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12 quote">
                    <i class="fa fa-quote-left"></i> Passion leads to design, design leads to performance, <br />
                    performance leads to <span class="text-theme">success</span>!
                    <i class="fa fa-quote-right"></i>
                    <small>Sean Themes, Developer Teams in Malaysia</small>
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <div id="service" class="content" data-scrollview="true">
        <!-- begin container -->
        <div class="container">
            <h2 class="content-title">Our Services</h2>
            <p class="content-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
                sed bibendum turpis luctus eget
            </p>
            <!-- begin row -->
            <div class="row">
                <!-- begin col-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-cog"></i></div>
                        <div class="info">
                            <h4 class="title">Easy to Customize</h4>
                            <p class="desc">Duis in lorem placerat, iaculis nisi vitae, ultrices tortor. Vestibulum molestie ipsum nulla. Maecenas nec hendrerit eros, sit amet maximus leo.</p>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-paint-brush"></i></div>
                        <div class="info">
                            <h4 class="title">Clean & Careful Design</h4>
                            <p class="desc">Etiam nulla turpis, gravida et orci ac, viverra commodo ipsum. Donec nec mauris faucibus, congue nisi sit amet, lobortis arcu.</p>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-file"></i></div>
                        <div class="info">
                            <h4 class="title">Well Documented</h4>
                            <p class="desc">Ut vel laoreet tortor. Donec venenatis ex velit, eget bibendum purus accumsan cursus. Curabitur pulvinar iaculis diam.</p>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-code"></i></div>
                        <div class="info">
                            <h4 class="title">Re-usable Code</h4>
                            <p class="desc">Aenean et elementum dui. Aenean massa enim, suscipit ut molestie quis, pretium sed orci. Ut faucibus egestas mattis.</p>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-shopping-cart"></i></div>
                        <div class="info">
                            <h4 class="title">Online Shop</h4>
                            <p class="desc">Quisque gravida metus in sollicitudin feugiat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-heart"></i></div>
                        <div class="info">
                            <h4 class="title">Free Support</h4>
                            <p class="desc">Integer consectetur, massa id mattis tincidunt, sapien erat malesuada turpis, nec vehicula lacus felis nec libero. Fusce non lorem nisl.</p>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <div id="action-box" class="content has-bg" data-scrollview="true">
        <!-- begin content-bg -->
        <div class="content-bg">
            <img src="assets/img/quote-bg.jpg" alt="Action" />
        </div>
        <!-- end content-bg -->
        <!-- begin container -->
        <div class="container" data-animation="true" data-animation-type="fadeInRight">
            <!-- begin row -->
            <div class="row action-box">
                <!-- begin col-9 -->
                <div class="col-md-9 col-sm-9">
                    <div class="icon-large text-theme">
                        <i class="fa fa-binoculars"></i>
                    </div>
                    <h3>CHECK OUT OUR ADMIN THEME!</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus faucibus magna eu lacinia eleifend.
                    </p>
                </div>
                <!-- end col-9 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-3">
                    <a href="#" class="btn btn-outline btn-block">Live Preview</a>
                </div>
                <!-- end col-3 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <div id="work" class="content" data-scrollview="true">
        <!-- begin container -->
        <div class="container" data-animation="true" data-animation-type="fadeInDown">
            <h2 class="content-title">Our Latest Work</h2>
        </div>
        <!-- end container -->
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
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-3">이름 <span class="text-theme">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">이메일 <span class="text-theme">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">내용 <span class="text-theme">*</span></label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="10"></textarea>
                            </div>
                        </div>
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