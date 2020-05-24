<?php
// namespaceD.php
// local namespace
// Combine "namespaceA.php" and "namespaceD.php" into "nameA" of namespace.
namespace nameA;

echo "require(\"namespaceC.php\");<br>";
require("namespaceC.php");
// require("namespaceC.php");
// nameC:funcA
// nameC:funcA1

// call $a = 100, $varC1 = 201,
// call $a1 = 101, $varC2 = 201
// ==========================================================================



// $varD1 = funcA($a);
// $varD2 = funcA1($a1);
// Fatal error: Uncaught Error: Call to undefined function nameA\funcA() in D:\_xampp\htdocs\web\php_cli_test_1\namespaceD.php:18 Stack trace: #0 {main} thrown in D:\_xampp\htdocs\web\php_cli_test_1\namespaceD.php on line 18



$varD1 = nameSubc\funcA($a);
$varD2 = nameSubc\funcA1($a1);
echo "<br>";
echo "call namespace:nameSubc, function:funcA \$a = ${a}, \$varD1 = ${varD1}<br>";
echo "call namespace:nnameSubc, function:funcA1 \$a1 = ${a1}, \$varD2 = ${varD2}<br><br>";
// nameC:funcA
// nameC:funcA1

// call namespace:nameSubc, function:funcA $a = 100, $varD1 = 201
// call namespace:nnameSubc, function:funcA1 $a1 = 102, $varD2 = 202





// use namespace as alias;
// use brainbell\template\db\views as dbviews;
use nameA\nameSubc as subC; // alias를 사용시 전체 네임스페이스명을 지정한다.

// $var = brainbell\template\db\views\aFunction();
// $var = dbviews\aFunction();
$varD3 = subC\funcA($a);
$varD4 = subC\funcA1($a1);
echo "<br>";
echo "call namespace:nameSubc, function:funcA \$a = ${a}, \$varD3 = ${varD3}<br>";
echo "call namespace:nnameSubc, function:funcA1 \$a1 = ${a1}, \$varD4 = ${varD4}<br><br>";
// nameC:funcA
// nameC:funcA1

// call namespace:nameSubc, function:funcA $a = 100, $varD3 = 201
// call namespace:nnameSubc, function:funcA1 $a1 = 103, $varD4 = 203






echo "require(\"namespaceA.php\");<br>";
require("namespaceA.php");
// require("namespaceA.php");
// nameA:funcA
// nameA:funcA1

// call namespace:nameA, function:funcA $a = 0, $varA = 1,
// call namespace:nameA, function:funcA1 $a1 = 1, $varA1 = 1
// ==========================================================================



// function funcA($a){
// 	echo "nameA:funcA<br>";
// 	return ++$a;
// }

// function funcA1(&$a1){
// 	echo "nameA:funcA1<br>";
// 	return ++$a1;
// }

// $varD1 = funcA($a);
// $varD2 = funcA1($a1);
// namespaceA.php 파일에서 namespace : nameA에서 존재한 funcA(), funcA1()를 재선언 할 수 없다.
// Fatal error: Cannot redeclare nameA\funcA() (previously declared in D:\_xampp\htdocs\web\php_cli_test_1\namespaceD.php:44) in D:\_xampp\htdocs\web\php_cli_test_1\namespaceA.php on line ldap_t61_to_8859(value)



?>