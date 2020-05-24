<?php
// namespaceA.php
// local namespace
namespace nameA;
$a = 0;
$a1 = 0;

function funcA($a){
	echo "nameA:funcA<br>";
	return ++$a;
}

function funcA1(&$a1){
	echo "nameA:funcA1<br>";
	return ++$a1;
}



$varA = funcA($a);
$varA1 = funcA1($a1);
echo "<br>";

echo "call namespace:nameA, function:funcA \$a = ${a}, \$varA = ${varA}, <br>";
echo "call namespace:nameA, function:funcA1 \$a1 = ${a1}, \$varA1 = ${varA1}<br>";
echo "==========================================================================<br><br>";
// require("namespaceA.php");
// nameA:funcA
// nameA:funcA1

// call namespace:nameA, function:funcA $a = 0, $varA = 1,
// call namespace:nameA, function:funcA1 $a1 = 1, $varA1 = 1
?>