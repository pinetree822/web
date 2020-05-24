<?php
/////////////////////////////////////////////////////////////
// type1
// require_once 'AutoloadHello.php';
// require_once 'AutoloadHelloTask01.php';


// $sayAutoloadHello = new AutoloadHello();
// $sayAutoloadHello->say();
// echo "<br>";
// // AutoloadHello - PHP!

// $autoloadHelloTask01 = new AutoloadHelloTask01;
// $autoloadHelloTask01->todoTask();
// // todo Task!

/////////////////////////////////////////////////////////////
// type2
// spl_autoload_register();


// $sayAutoloadHello = new AutoloadHello();
// $sayAutoloadHello->say();
// echo "<br><br>";
// // AutoloadHello - PHP!

// $autoloadHelloTask01 = new AutoloadHelloTask01;
// $autoloadHelloTask01->todoTask();
// // todo Task!

/////////////////////////////////////////////////////////////
// type3
// spl_autoload_register('my_autoloader');
// function my_autoloader($class){
// 	echo 'class:'.$class;
// 	require_once $class.".php";
// 	echo "<br>";
// }


// $sayAutoloadHello = new AutoloadHello;
// $sayAutoloadHello->say();
// echo "<br><br>";
// // class:AutoloadHello
// // AutoloadHello - PHP!

// $autoloadHelloTask01 = new AutoloadHelloTask01;
// $autoloadHelloTask01->todoTask();
// // class:AutoloadHelloTask01
// // todo Task!

/////////////////////////////////////////////////////////////
// type4 - autoload에 클로저(closure:익명함수) 사용
// spl_autoload_register(function ($class){
// 	echo 'class:'.$class;
// 	require_once $class.".php";
// 	echo "<br>";
// });


// $sayAutoloadHello = new AutoloadHello;
// $sayAutoloadHello->say();
// echo "<br><br>";
// // class:AutoloadHello
// // AutoloadHello - PHP!

// $helloTask01 = new AutoloadHelloTask01;
// $helloTask01->todoTask();
// // class:AutoloadHelloTask01
// // class:AutoloadHelloTask01 todo Task!


/////////////////////////////////////////////////////////////
// type5 - autoload의 일부를 vender/AutoloadHelloInclude.php 파일로 분리
// AutoloadHelloInclude.php
require_once 'vender/AutoloadHelloInclude.php';


$sayAutoloadHello = new AutoloadHello;
$sayAutoloadHello->say();
echo "<br><br>";
// class:AutoloadHello
// AutoloadHello - PHP!

$helloTask01 = new AutoloadHelloTask01;
$helloTask01->todoTask();
// class:AutoloadHelloTask01
// class:AutoloadHelloTask01 todo Task!



?>