<?php
// namespaceC.php
// local namespace
namespace nameA\nameSubc;
$a = 100;//
$a1 = 100;

function funcA($a){
	echo "nameC:funcA<br>";
	return (++$a + 100);
}

function funcA1(&$a1){
	echo "nameC:funcA1<br>";
	return (++$a1 + 100);
}


$varC1 = funcA($a);
$varC2 = funcA1($a1);
echo "<br>";

echo "call  \$a = ${a}, \$varC1 = ${varC1}, <br>";
echo "call  \$a1 = ${a1}, \$varC2 = ${varC2}<br>";
echo "==========================================================================<br><br>";

// require("namespaceC.php");
// nameC:funcA
// nameC:funcA1

// call $a = 100, $varC1 = 201,
// call $a1 = 101, $varC2 = 201
?>