<?php
	spl_autoload_register(function ($name){
		var_dump($name);
	});


	class Foo implements ITest {}




// 	string(5) "ITest"
// Fatal error: Uncaught Error: Interface 'ITest' not found in D:\_xampp\htdocs\web\php_cli_test_1\autoload_2.php:7 Stack trace: #0 {main} thrown in D:\_xampp\htdocs\web\php_cli_test_1\autoload_2.php on line 7
?>