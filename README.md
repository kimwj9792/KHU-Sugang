# KHU-Sugang
경희대학교 학부생 수강신청 도우미
## KHU수강이 무엇인가요?
개설 강의 목록과 강의평을 기반으로 조건에 맞는 최적의 시간표를 자동으로 구성해 주는 서비스입니다.<br>
경희대학교 컴퓨터공학과 2016년 2학기 **기초공학설계** 수업의 일환으로 개발되었습니다.
## 사용방법
#### 요구사항
* PHP 7.0 이상
* MySQL 혹은 MariaDB (InnoDB 지원)
#### 데이터베이스 초기설정
```
CREATE TABLE IF NOT EXISTS `contact` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `regdate` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `login_fail` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddr` varchar(15) NOT NULL,
  `regdate` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `member` (
  `idx` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `save` text NOT NULL,
  `lastlogin` datetime NOT NULL,
  `regdate` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `session` (
  `id` varchar(32) NOT NULL,
  `access` int(10) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `sugang` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `term` int(2) NOT NULL,
  `jungong` text NOT NULL,
  `jungong_code` text NOT NULL,
  `haksu_1` text NOT NULL,
  `haksu_2` int(1) NOT NULL,
  `haksu_3` text NOT NULL,
  `haksu_4` text NOT NULL,
  `lecture` text NOT NULL,
  `lecture_code` text NOT NULL,
  `professor` text NOT NULL,
  `professor_code` text NOT NULL,
  `hakjum` float(2,1) NOT NULL,
  `timetable` text NOT NULL,
  `type` text NOT NULL,
  `language` text NOT NULL,
  `special` text NOT NULL,
  `score` float(5,2) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
```
#### 서버 설정
###### 공통
Document Root는 **public_html** 폴더를 가르켜야 합니다.<br>
**app** 폴더로의 접근은 불가능해야 합니다.
###### Apache
Apache의 경우 public_html 폴더에 .htaccess 를 아래와 같이 생성해 주세요.
```
RewriteEngine On
RewriteBase /
RewriteRule ^index.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
```
###### Nginx
Nginx의 경우 설정을 아래와 같이 변경해 주세요.
```
location / {
    index  index.php;
    try_files $uri $uri/ /index.php?$args;
}
```
#### 권한 설정
**app/storage/cookie** 를 707로 설정
#### 데이터베이스 연결
**app/config.php** 를 서버 설정에 맞추어 변경
```
$config['db_address'] = ''; // DB서버주소 (예: localhost)
$config['db_user'] = ''; // DB유저
$config['db_password'] = ''; // DB비밀번호
$config['db_name'] = ''; // DB명
$config['db_port'] = '3306'; // 포트
$config['db_prefix'] = ''; // 접두사 (Default: 공백)
```
#### 강의 업데이트
**app/script/sugang.php** 에서 include_once 부분은 서버의 절대경로에 맞게 수정<br>
$year과 $term은 가져올 년도와 학기에 맞추어 수정
```
include_once '/home/sugang.khunet.net/app/config.php';
include_once '/home/sugang.khunet.net/app/bootstrap/001.medoo.php';
include_once '/home/sugang.khunet.net/app/bootstrap/002.database.php';
$year = "2017"; // 가져올 년도
$term = "10"; // 가져올 학기 (10: 1학기, 20: 2학기, 15: 여름학기, 20: 겨울학기)
```
#### 강의평가 업데이트
**app/script/evaluation.php** 에서 include_once 부분은 서버의 절대경로에 맞게 수정<br>
```
include_once '/home/sugang.khunet.net/app/config.php';
include_once '/home/sugang.khunet.net/app/bootstrap/001.medoo.php';
include_once '/home/sugang.khunet.net/app/bootstrap/002.database.php';
```
## 라이센스
본 서비스에 사용된 오픈소스의 라이센스는 아래와 같습니다.
* Bootstrap 3.3.7 (MIT)
* Font-Awesome 4.7.0 (SIL OFL 1.1/MIT)
* Animate.css (MIT)
* pace (MIT)
* jQuery 1.9.1 (MIT)
* HTML5 Shiv 3.7.3 (MIT/GPL2)
* Respond.js 1.4.2 (MIT)
* scrollMonitor 1.2.0 (MIT)
## 문의
서버 사정에 따라 기존의 **sugang.khunet.net** 으로의 접속이 불가능할 수 있습니다.<br>
필요에 따라 자유롭게 수정, 사용, 배포하셔도 됩니다.<br>
문의사항은 이메일로 보내주시기 바랍니다.