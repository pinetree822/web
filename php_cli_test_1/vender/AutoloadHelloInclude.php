<?php
/////////////////////////////////////////////////////////////
// type4 - autoload의 일부를 vender/AutoloadHelloInclude.php 파일로 분리
// ../AutoloadHelloIndex.php에 insert
spl_autoload_register(function ($class){
	echo 'class:'.$class;
	require_once $class.".php";
	echo "<br>";
});
?>