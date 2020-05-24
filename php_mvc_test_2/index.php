<?php
// 참고한 주소
//https://freehoon.tistory.com/70?category=708152
// https://github.com/freehoon/workspace/tree/master/phpAutoloadSample3
//
// echo '_ROOT = ' . _ROOT . '<br>';
require_once 'application/libs/config.php';
require_once _ROOT.'/application/vender/autoload.php';

new \application\libs\application;


?>