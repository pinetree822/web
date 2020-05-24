<?php
// https://m.blog.naver.com/PostView.nhn?blogId=aim4u&logNo=220634836504&proxyReferer=https:%2F%2Fwww.google.com%2F
//
// error_reporting(error_repoting() & ~E_NOTICE)
//
// _ROOT : 물리적인 서버 위치 저장 CONST
define('_ROOT', $_SERVER['DOCUMENT_ROOT'].'/web/php_mvc_test_1');
define('_WEBPROTOCOL', 'http://');
define('_WEBROOT', 'localhost/web/php_mvc_test_1');
define('_WEBURL', _WEBPROTOCOL.'localhost/web/php_mvc_test_1');
// echo '_ROOT = '._ROOT.'<br>';
// echo '\$_SERVER[\'SCRIPT_FILENAME\'] = '.$_SERVER['SCRIPT_FILENAME'].'<br>';


// MariaDB or MysqlDB 환경설정
define('_DBTYPE','mysql');
define('_HOST','localhost');
define('_DBNAME','test');
define('_DBUSER','root');
define('_DBPASSWORD','');
define('_CHARSET','utf8');

// PDO Query 실행시 - 서버시간이 다른거로 변경이 되는 경우가 많음
// 한국시간으로 맞춘다.
date_default_timezone_set('Asia/Seoul');


?>