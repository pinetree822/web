<?php
// namespaceB.php
// global namespace
// include("namespaceA.php");
//
echo "require(\"namespaceA.php\");<br>";
require("namespaceA.php");

echo "require(\"namespaceC.php\");<br>";
require("namespaceC.php");




function funcA($a){
	echo "nameB:funcA<br>";
	return ++$a;
}

function funcA1(&$a1){
	echo "nameB:funcA1<br>";
	return ++$a1;
}
echo "Inner(\"namespaceB.php\");<br><br>";
// Inner("namespaceB.php");




$varB1 = nameA\funcA($a);
$varB2 = nameA\funcA1($a1);
echo "<br>";
echo "call namespace:nameA, function:funcA \$a = ${a}, \$varB1 = ${varB1}<br>";
echo "call namespace:nameA, function:funcA1 \$a1 = ${a1}, \$varB2 = ${varB2}<br><br>";
// nameA:funcA
// nameA:funcA1

// call namespace:nameA, function:funcA $a = 100, $varB1 = 101
// call namespace:nameA, function:funcA1 $a1 = 102, $varB2 = 102



$varB3 = nameA\nameSubc\funcA($a);
$varB4 = nameA\nameSubc\funcA1($a1);
echo "<br>";
echo "call namespace:nameA\\nameSubc, function:funcA \$a = ${a}, \$varB3 = ${varB3}<br>";
echo "call namespace:nameA\\nameSubc, function:funcA1 \$a1 = ${a1}, \$varB4 = ${varB4}<br><br>";
// nameC:funcA
// nameC:funcA1

// call namespace:nameA\nameSubc, function:funcA $a = 100, $varB3 = 201
// call namespace:nameA\nameSubc, function:funcA1 $a1 = 103, $varB4 = 203



$varB5 = funcA($a);
$varB6 = funcA1($a1);
echo "<br>";
echo "call namespace:globals, function:funcA \$a = ${a}, \$varB5 = ${varB5}<br>";
echo "call namespace:globals, function:funcA1 \$a1 = ${a1}, \$varB6 = ${varB6}<br>";
echo "==========================================================================<br><br>";

 //Print information
 echo '<pre>';
// nameB:funcA
// nameB:funcA1

// call namespace:globals, function:funcA $a = 100, $varB5 = 101
// call namespace:globals, function:funcA1 $a1 = 104, $varB6 = 104

?>